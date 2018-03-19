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

class SimpleContentController extends AppBaseController
{
    use FileUpload;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    /** @var  CategoryRepository */
    private $categoryRepository;

    private $contentType;
    private $stage;

    public function __construct(SimpleContentRepository $simpleContentRepo, CategoryRepository $categoryRepo, $contentType = null, $stage = null)
    {
        $this->simpleContentRepository = $simpleContentRepo;
        $this->categoryRepository = $categoryRepo;
        $this->contentType = $contentType;
        $this->stage = $stage;
    }

    /**
     * Display a listing of the SimpleContent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->simpleContentRepository->pushCriteria(new RequestCriteria($request));
        $simpleContent = $this->simpleContentRepository->findWhere(['type' => ['type', '=', $this->contentType], 'stage' => ['stage', '=', $this->stage]])->first();
        $categories = $this->categoryRepository->findByField('type', $this->contentType.'-categories')->pluck('slug', 'id');

        $view = 'admin.'.$this->contentType.'.index';
        if (!is_null($this->stage)) {
            $view = 'admin.'.$this->contentType.'.'.$this->stage.'.index';
        }

        return view($view)
            ->with('simpleContent', $simpleContent)
            ->with('categories', $categories)
            ->with('contentType', $this->contentType)
            ->with('stage', $this->stage);
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
        $simpleContent = $this->simpleContentRepository->findWhere(['type' => ['type', '=', $this->contentType], 'stage' => ['stage', '=', $this->stage]])->first();

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

        $routeParams = [];
        if (!is_null($this->stage)) {
            $routeParams['stage'] = $this->stage;
        }

        return redirect(route($this->contentType.'.index', $routeParams));
    }
}
