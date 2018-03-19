<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\SimpleContentRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PostController extends AppBaseController
{
    use FileUpload;

    /** @var  PostRepository */
    private $postRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    public function __construct(PostRepository $postRepo, CategoryRepository $categoryRepo, SimpleContentRepository $simpleContentRepo)
    {
        $this->postRepository = $postRepo;
        $this->categoryRepository = $categoryRepo;
        $this->simpleContentRepository = $simpleContentRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->postRepository->pushCriteria(new RequestCriteria($request));
        $posts = $this->postRepository->all();
        $simpleContent = $this->simpleContentRepository->findByField('type', 'title.posts')->first();

        return view('admin.posts.index')
            ->with('posts', $posts)
            ->with('simpleContent', $simpleContent);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->findByField('type', 'categories')->pluck('slug', 'id');

        return view('admin.posts.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $data['author_id'] = Auth::user()->id;

        $post = $this->postRepository->create($data);

        if(isset($translations['translations'])) {
            $post->fill($translations['translations']);
            $post->save();
        }

        Flash::success('Post saved successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $categories = $this->categoryRepository->findByField('type', 'categories')->pluck('slug', 'id');

        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('categories', $categories);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $data['author_id'] = Auth::user()->id;

        $post = $this->postRepository->update($data, $id);

        if(isset($translations['translations'])) {
            $post->fill($translations['translations']);
            $post->save();
        }

        Flash::success('Post updated successfully.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findWithoutFail($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('posts.index'));
        }

        $this->postRepository->delete($id);

        Flash::success('Post deleted successfully.');

        return redirect(route('posts.index'));
    }
}
