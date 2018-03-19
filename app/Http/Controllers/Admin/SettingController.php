<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\SettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the SettingRepository.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->settingRepository->pushCriteria(new RequestCriteria($request));
        $settings = $this->settingRepository->all()->keyBy('field');

        return view('admin.settings.index')
            ->with('settings', $settings);
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        foreach ($request->except('_token') as $field => $value) {
            $setting = $this->settingRepository->firstOrNew(['field' => $field]);
            $setting->fill(['value' => $value]);
            $setting->save();
        }

        Flash::success('Settings saved successfully.');

        return redirect(route('settings.index'));
    }
}
