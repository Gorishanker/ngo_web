<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Requests\Admin\SettingSocialLoginRequest;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Services\FileService;
use App\Services\ManagerLanguageService;

class SettingController extends Controller
{
    protected $mls;
    public function __construct()
    {
        // $this->middleware('permission:asset-edit', ['only' => ['edit', 'update', 'status']]);
        $this->mls = new ManagerLanguageService('flash');
    }

    public function edit_general()
    {
        $site_mode = array(
            '1' => 'Live',
            '2' => 'Maintainance Mode'
        );
        $settings = Setting::where('setting_type', 1)->pluck('value', 'slug')->toArray();
        return view('admin.setting.general', compact('site_mode', 'settings'));
    }

    public function update_general(SettingRequest $request, Setting $setting)
    {
        $input = $request->except(['_token']);
        $settings = Setting::where('setting_type', 1)->pluck('value', 'slug')->toArray();

        foreach ($request->data as $key => $value) {
            // dd($request->data, $key);
            if ($key == 'site_maintenance_message') {
                $value = $this->processImage($request->data['site_maintenance_message'], '/storage/files/settings/');
            }
            if ($key == "logo" && !empty($request->file('data.logo'))) {

                //Start::Delete old logo.
                $logo_name = isset($settings['logo']) ? $settings['logo'] : null;
                if ($logo_name) {
                    $logo_url = '/files/settings/' . $logo_name;
                    FileService::remove_file_public_path($logo_url);
                }
                //End::Delete old logo.

                $logo = $request->file('data.logo');
                // dd($logo->getClientOriginalName());
                $name = '';
                $ext = $logo->getClientOriginalExtension() !== "" ? $logo->getClientOriginalExtension() : $logo->extension();
                // dd($ext);
                // $filename = $name . time() . '_' . uniqid() . '.' . $ext;
                // dd(config('services.app_details.app_name'), '-logo.', $logo->getClientOriginalExtension());
                // $filename    = config('services.app_details.app_name') . '-logo.' . $logo->getClientOriginalExtension();
                $filename    = $logo->getClientOriginalName();
                $destinationPath = public_path('/files/settings/');
                $logo->move($destinationPath, $filename);
                // dd($destinationPath);
                $value = $filename;
            }
            if ($key == "favicon" && !empty($request->file('data.favicon'))) {
                //Start::Get old favicon and delete it.
                $favicon_name = isset($settings['favicon']) ? $settings['favicon'] : null;
                if ($favicon_name) {
                    $favicon_url = '/files/settings/' . $favicon_name;
                    FileService::remove_file_public_path($favicon_url);
                }
                //End::Get old favicon and delete it.

                $favicon = $request->file('data.favicon');

                $name = '';
                $ext = $favicon->getClientOriginalExtension() !== "" ? $favicon->getClientOriginalExtension() : $favicon->extension();
                // $filename = $name . time() . '_' . uniqid() . '.' . $ext;

                // $filename    = config('services.app_details.app_name') . '-favicon.' . $favicon->getClientOriginalExtension();
                $filename = $favicon->getClientOriginalName();
                $destinationPath = public_path('/files/settings/');
                $favicon->move($destinationPath, $filename);
                $value = $filename;
            }
            if ($key == "qr_scanner" && !empty($request->file('data.qr_scanner'))) {
                //Start::Get old qr_scanner and delete it.
                $qr_scanner_name = isset($settings['qr_scanner']) ? $settings['qr_scanner'] : null;
                if ($qr_scanner_name) {
                    $qr_scanner_url = '/files/settings/' . $qr_scanner_name;
                    FileService::remove_file_public_path($qr_scanner_url);
                }
                //End::Get old qr_scanner and delete it.

                $qr_scanner = $request->file('data.qr_scanner');

                $name = '';
                $ext = $qr_scanner->getClientOriginalExtension() !== "" ? $qr_scanner->getClientOriginalExtension() : $qr_scanner->extension();
                // $filename = $name . time() . '_' . uniqid() . '.' . $ext;

                // $filename    = config('services.app_details.app_name') . '-qr_scanner.' . $qr_scanner->getClientOriginalExtension();
                $filename = $qr_scanner->getClientOriginalName();
                $destinationPath = public_path('/files/settings/');
                $qr_scanner->move($destinationPath, $filename);
                $value = $filename;
            }

            $setting->updateOrCreate(
                ['slug' =>  $key],
                ['value' => $value, 'title' => $key, 'field_type' => 'text', 'setting_type' => 1]
            );
        }
        createJsonFile(Setting::pluck('value', 'slug'));

        return redirect()->route('admin.settings.edit_general')->with('success', 'Setting updated successfully');
    }


    public function update(SettingRequest $request, Setting $setting)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        foreach ($request->data as $key => $value) {
            $setting = Setting::updateOrCreate(
                ['key' =>  $key],
                ['value' => $value]
            );
        }
        // App::setLocale($request->data['language']);
        // session()->put('locale', $request->data['language']);
        return redirect()->route('admin.settings.edit_general')->with('success', $this->mls->onlyNameLanguage('setting_updated'));
    }

    public function editSocialLogin()
    {
        $settings = Setting::where('setting_type', 3)->pluck('value', 'slug')->toArray();
        return view("admin.setting.social_login", compact('settings'));
    }

    public function updateSocialLogin(SettingSocialLoginRequest $request)

    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        foreach ($request->data as $key => $value) {
            $referral = Setting::updateOrCreate(
                ['slug' =>  $key],
                ['value' => $value, 'title' => $key, 'field_type' => 'link', 'setting_type' => 3]
            );
        }
        return redirect()->route('admin.settings.edit_social_login')->with('success', 'Settings updated successfully');
    }
}
