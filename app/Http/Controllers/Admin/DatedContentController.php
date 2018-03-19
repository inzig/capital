<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateDatedContentRequest;
use App\Http\Requests\Admin\UpdateDatedContentRequest;
use App\Repositories\Admin\DatedContentRepository;
use App\Repositories\Admin\SimpleContentRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DatedContentController extends AppBaseController
{
    use FileUpload;

    /** @var  DatedContentRepository */
    private $datedContentRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    private $contentType;

    public function __construct(DatedContentRepository $datedContentRepo, CategoryRepository $categoryRepo, SimpleContentRepository $simpleContentRepo, $contentType = null)
    {
        $this->datedContentRepository = $datedContentRepo;
        $this->categoryRepository = $categoryRepo;
        $this->simpleContentRepository = $simpleContentRepo;
        $this->contentType = $contentType;
    }

    /**
     * Display a listing of the DatedContent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->datedContentRepository->pushCriteria(new RequestCriteria($request));
        $datedContents = $this->datedContentRepository->findByField('type', $this->contentType)->all();
        $simpleContent = $this->simpleContentRepository->findByField('type', 'title.'.$this->contentType)->first();
        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        return view('admin.'.$this->contentType.'.index')
            ->with('datedContents', $datedContents)
            ->with('simpleContent', $simpleContent)
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Show the form for creating a new DatedContent.
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
     * Store a newly created DatedContent in storage.
     *
     * @param CreateDatedContentRequest $request
     *
     * @return Response
     */
    public function store(CreateDatedContentRequest $request)
    {
        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $datedContent = $this->datedContentRepository->create($data);

        if(isset($translations['translations'])) {
            $datedContent->fill($translations['translations']);
            $datedContent->save();
        }

        Flash::success('Content saved successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Show the form for editing the specified DatedContent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $datedContent = $this->datedContentRepository->findWithoutFail($id);

        if (empty($datedContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        return view('admin.'.$this->contentType.'.edit')
            ->with('datedContent', $datedContent)
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Update the specified DatedContent in storage.
     *
     * @param  int              $id
     * @param UpdateDatedContentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatedContentRequest $request)
    {
        $datedContent = $this->datedContentRepository->findWithoutFail($id);

        if (empty($datedContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $datedContent = $this->datedContentRepository->update($data, $id);

        if(isset($translations['translations'])) {
            $datedContent->fill($translations['translations']);
            $datedContent->save();
        }

        Flash::success('Content updated successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Remove the specified DatedContent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $datedContent = $this->datedContentRepository->findWithoutFail($id);

        if (empty($datedContent)) {
            Flash::error('Content not found');

            return redirect(route($this->contentType.'.index'));
        }

        $this->datedContentRepository->delete($id);

        Flash::success('Content deleted successfully.');

        return redirect(route($this->contentType.'.index'));
    }
}
