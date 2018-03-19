<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends AppBaseController
{
    use FileUpload;

    /** @var  CategoryRepository */
    private $categoryRepository;

    private $contentType;

    public function __construct(CategoryRepository $categoryRepo, $contentType = null)
    {
        $this->categoryRepository = $categoryRepo;
        $this->contentType = $contentType;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->findByField('type', $this->contentType)->all();

        return view('admin.'.$this->contentType.'.index')
            ->with('categories', $categories)
            ->with('contentType', $this->contentType);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.'.$this->contentType.'.create')
            ->with('contentType', $this->contentType);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $category = $this->categoryRepository->create($data);

        if(isset($translations['translations'])) {
            $category->fill($translations['translations']);
            $category->save();
        }

        Flash::success('Category saved successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route($this->contentType.'.index'));
        }

        return view('admin.'.$this->contentType.'.edit')
            ->with('category', $category)
            ->with('contentType', $this->contentType);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route($this->contentType.'.index'));
        }

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $category = $this->categoryRepository->update($data, $id);

        if(isset($translations['translations'])) {
            $category->fill($translations['translations']);
            $category->save();
        }

        Flash::success('Category updated successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route($this->contentType.'.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route($this->contentType.'.index'));
    }
}
