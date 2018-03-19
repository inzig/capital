<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSortableContentRequest;
use App\Http\Requests\Admin\UpdateSortableContentRequest;
use App\Repositories\Admin\SortableContentRepository;
use App\Repositories\Admin\SimpleContentRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SortableContentController extends AppBaseController
{
    use FileUpload;

    /** @var  SortableContentRepository */
    private $sortableContentRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    private $contentType;

    public function __construct(SortableContentRepository $sortableContentRepo, CategoryRepository $categoryRepo, SimpleContentRepository $simpleContentRepo, $contentType = null)
    {
        $this->sortableContentRepository = $sortableContentRepo;
        $this->categoryRepository = $categoryRepo;
        $this->simpleContentRepository = $simpleContentRepo;
        $this->contentType = $contentType;
    }

    /**
     * Display a listing of the SortableContent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sortableContentRepository->pushCriteria(new RequestCriteria($request));
        $sortableContents = $this->sortableContentRepository->findByField('type', $this->contentType)->all();
        $simpleContent = $this->simpleContentRepository->findByField('type', 'title.'.$this->contentType)->first();
        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        return view('admin.'.$this->contentType.'.index')
            ->with('sortableContents', $sortableContents)
            ->with('simpleContent', $simpleContent)
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Show the form for creating a new SortableContent.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        return view('admin.'.$this->contentType.'.create')
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Store a newly created SortableContent in storage.
     *
     * @param CreateSortableContentRequest $request
     *
     * @return Response
     */
    public function store(CreateSortableContentRequest $request)
    {
        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $sortableContent = $this->sortableContentRepository->create($data);

        if(isset($translations['translations'])) {
            $sortableContent->fill($translations['translations']);
            $sortableContent->save();
        }

        Flash::success('Content saved successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Show the form for editing the specified SortableContent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sortableContent = $this->sortableContentRepository->findWithoutFail($id);

        if (empty($sortableContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        return view('admin.'.$this->contentType.'.edit')
            ->with('sortableContent', $sortableContent)
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Update the specified SortableContent in storage.
     *
     * @param  int              $id
     * @param UpdateSortableContentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSortableContentRequest $request)
    {
        $sortableContent = $this->sortableContentRepository->findWithoutFail($id);

        if (empty($sortableContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $sortableContent = $this->sortableContentRepository->update($data, $id);

        if(isset($translations['translations'])) {
            $sortableContent->fill($translations['translations']);
            $sortableContent->save();
        }

        Flash::success('Content updated successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Remove the specified SortableContent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sortableContent = $this->sortableContentRepository->findWithoutFail($id);

        if (empty($sortableContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $this->sortableContentRepository->delete($id);

        Flash::success('Content deleted successfully.');

        return redirect(route($this->contentType.'.index'));
    }
}
