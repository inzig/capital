<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateTeamRequest;
use App\Http\Requests\Admin\UpdateTeamRequest;
use App\Repositories\Admin\TeamRepository;
use App\Repositories\Admin\SimpleContentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TeamController extends AppBaseController
{
    use FileUpload;

    /** @var  TeamRepository */
    private $teamRepository;

    /** @var  SimpleContentRepository */
    private $simpleContentRepository;

    private $contentType;

    public function __construct(TeamRepository $teamRepo, SimpleContentRepository $simpleContentRepo, $contentType = null)
    {
        $this->teamRepository = $teamRepo;
        $this->simpleContentRepository = $simpleContentRepo;
        $this->contentType = $contentType;
    }

    /**
     * Display a listing of the Team.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->teamRepository->pushCriteria(new RequestCriteria($request));
        $teams = $this->teamRepository->findByField('type', $this->contentType)->all();
        $simpleContent = $this->simpleContentRepository->findByField('type', 'title.'.$this->contentType)->first();

        return view('admin.'.$this->contentType.'.index')
            ->with('teams', $teams)
            ->with('simpleContent', $simpleContent)
            ->with('contentType', $this->contentType);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.'.$this->contentType.'.create')
            ->with('contentType', $this->contentType);
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $team = $this->teamRepository->create($data);

        if(isset($translations['translations'])) {
            $team->fill($translations['translations']);
            $team->save();
        }

        Flash::success('Team saved successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route($this->contentType.'.index'));
        }

        return view('admin.'.$this->contentType.'.edit')
            ->with('team', $team)
            ->with('contentType', $this->contentType);
    }

    /**
     * Update the specified Team in storage.
     *
     * @param  int              $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route($this->contentType.'.index'));
        }

        $data = $request->except('translations');
        $translations = $request->only('translations');
        $translations = array_filter_recursive($translations);
        $files = $request->allFiles();

        $this->uploadFiles($files, $data, $translations);

        $team = $this->teamRepository->update($data, $id);

        if(isset($translations['translations'])) {
            $team->fill($translations['translations']);
            $team->save();
        }

        Flash::success('Team updated successfully.');

        return redirect(route($this->contentType.'.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            Flash::error('Team not found');

            return redirect(route($this->contentType.'.index'));
        }

        $this->teamRepository->delete($id);

        Flash::success('Team deleted successfully.');

        return redirect(route($this->contentType.'.index'));
    }
}
