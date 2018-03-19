<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\SettingRepository;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.profile')
            ->with('user', $user);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $user->name = $request->get('name');
        $user->save();

        Flash::success('Profile updated successfully.');

        return redirect(route('profile'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'password' => 'required_with:new_password|string',
            'new_password' => 'min:6|max:18|confirmed',
        ]);

        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            Flash::success('Password updated successfully.');
        } else {
            Flash::error('Profile not saved.');
        }

        return redirect(route('profile'));
    }
}
