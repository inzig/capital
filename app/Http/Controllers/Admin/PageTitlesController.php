<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateSimpleContentRequest;
use App\Http\Requests\Admin\UpdateSimpleContentRequest;
use App\Repositories\Admin\SimpleContentRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PageTitlesController extends AppBaseController
{
    use FileUpload;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    private $contentType;

    public function __construct(SimpleContentRepository $simpleContentRepo, CategoryRepository $categoryRepo, $contentType = null)
    {
        $this->simpleContentRepository = $simpleContentRepo;
        $this->categoryRepository = $categoryRepo;
        $this->contentType = $contentType;
    }

    /**
     * Store a newly created SimpleContent in storage.
     *
     * @param CreateSimpleContentRequest $request
     *
     * @return Response
     */
    public function store(CreateSimpleContentRequest $request)
    {
        $contentType = $request->get('type', $this->contentType);
        $simpleContent = $this->simpleContentRepository->findByField('type', $contentType)->first();

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        if (is_null($simpleContent)) {
            $simpleContent = $this->simpleContentRepository->create($data);
        } else {
            $simpleContent = $this->simpleContentRepository->update($data, $simpleContent->id);
        }

        if(isset($translations['translations'])) {
            $simpleContent->fill($translations['translations']);
            $simpleContent->save();
        }

        Flash::success('Content saved successfully.');

        return redirect(route(str_replace('title.', '', $contentType).'.index'));
    }
}
