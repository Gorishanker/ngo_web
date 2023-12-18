<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\AdminChangePasswordRequest;
use App\Http\Requests\Admin\EditProfileRequest;
use App\Models\Admin;
use App\Models\User;
use App\Services\FileService;
use App\Services\HelperService;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\ManagerLanguageService;
use App\Services\UserService;

class AdminProfileController extends Controller
{
    protected $mls, $admin_profile_view, $change_password_view, $edit_profile_view;

    public function __construct()
    {
        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
        //view files
        $this->edit_profile_view = 'admin.admin_profile.edit_profile';
        $this->admin_profile_view = 'admin.admin_profile.show';
        $this->change_password_view = 'admin.admin_profile.change_password';
    }

    /**
     * Update the language in User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateLanguage(User $user, $language)
    {
        // dd($user, $language);
        $result = $user->update(['lang' => $language]);
        session()->put('locale', $language);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->onlyNameLanguage('language_updated'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->onlyNameLanguage('language_not_updated'),
                'status_name' => 'error'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Auth user
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $page_title = $this->mls->onlyNameLanguage('profile');
        return view($this->admin_profile_view, compact('page_title'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        $data = Auth::user();
        $page_title = $this->mls->onlyNameLanguage('change_password');
        return view($this->change_password_view, compact('page_title', 'data'));
    }


    public function editProfile()
    {
        $data = Auth::user();
        $page_title = $this->mls->onlyNameLanguage('edit_profile');
        return view($this->edit_profile_view, compact('page_title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(AdminChangePasswordRequest $request, Admin $user)
    {

        $input = $request->except(['_token', '_method', 'proengsoft_jsvalidation']);
        $data = UserService::update_password($user, $request->password);

        return redirect()->back()->with('success', 'Password Updated Successfully');
    }

    public function updateProfile(EditProfileRequest $request, Admin $user)
    {
        $input = $request->except(['_token', 'id', '_method', 'proengsoft_jsvalidation','image']);
        $image = null;
        if (isset($request->image)) {
            $image = FileService::imageUploader($request, 'image', 'admin/image');
            $input['image'] = 'admin/image/'.$image;
        }
        $user->update($input);
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
