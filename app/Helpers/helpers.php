<?php

use App\Models\Setting;
use App\Services\ManagerLanguageService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



function getWebAuthUser()
{
    return Auth::user();
}

function getAdminAuthUser()
{
    return auth()->guard('admin')->user();
}


function roleName($key)
{
    $role = [
        'admin' => 'Admin',
        'customer' => 'Customer',
    ];
    return $role[$key];
}

function statusArray()
{
    $data = [
        0 => 'Inactive',
        1 => 'Active',
    ];
    return $data;
}

function roleId($key)
{
    $role = [
        'admin' => 1,
        'customer' => 2,
    ];
    return $role[$key];
}


function diffForHumans($datetime)
{
    return Carbon::parse($datetime)->diffForHumans();
}

//return current date time
function getCurrentDateTime()
{
    return Carbon::now();
}

/**
 * @param Dynamic $type
 * @param $type 0, DATE_FORMAT="M d, Y",
 * @param $type 1, TIME_FORMAT="h:i A"
 * @param $type 2, DATETIME_FORMAT="d M Y, h:i A"
 * @param $type 'format', User-Defined Format
 */
function get_default_format($datetime, $type = 0, $format = null)
{
    if ($type == 'format' && isset($format)) {
        $format_date = Carbon::parse($datetime)->format($format);
    } else if ($type == 2) { //DateTime
        $format_date = Carbon::parse($datetime)->format(env('DATETIME_FORMAT'));
    } else if ($type == 1) {  // time Time
        $format_date = Carbon::parse($datetime)->format(env('TIME_FORMAT'));
    } else { // date Date
        $format_date = Carbon::parse($datetime)->format(env('DATE_FORMAT'));
    }
    return $format_date;
}

function createJsonFile($json_content)
{
    if (isset($json_content)) {
        if ($json_content->count()) {
            try {
                Storage::disk('local')->put('public\global_page_content\global_page_content.json', json_encode($json_content));
                return true;
            } catch (Exception $e) {
                Log::error('Json File Not created');
            }
        }
    }
    return true;
}




function generateUniqueReferralCode()
{
    $length = 7;
    $referral_code = 'B' . substr(str_shuffle('ABCDEFGHIJ0123456789KLMNOPQRST0123456789UVWXYZ0123456789'), 1, $length);

    $code_exists = UserService::getUserByReferralCode($referral_code);
    if (!$code_exists) {
        return $referral_code;
    }
    generateUniqueReferralCode();
}

function mlsObj($filename = 'messages')
{
    $mls = new ManagerLanguageService($filename);
    return $mls;
}

function transMsg($key, $name = null, $number = 1)
{
    if (isset($name)) {
        if (gettype($name) == 'array') {
            /**
             * here, key is an array. So the index related the data as:
             * @param  string  $key = $name[0]
             * @param  \Countable|int|array  $number = $name[1]
             * @param  array  $replace = $name[2]
             * @param  string|null  $locale = $name[3]
             */
            return __($key, ['name' => trans_choice($name[0], $name[1] = 1, $name[2] = [], $name[3] = [])]);
        }
        if (gettype($name) == 'string') {
            return __($key, ['name' => trans_choice($name, $number)]);
        }
        if (gettype($name) == 'integer') {
            return trans_choice($key, $name);
        }
    }
    return trans_choice($key, $number);
}

function responseMsg($key, $name = null, $number = 1, $filename = 'messages')
{
    if (isset($name)) {
        if (gettype($name) == 'string') {
            // return mlsObj($filename)->messageLanguage($key, $name, $number);
            return __($filename . '.' . $key, ['name' => trans_choice($filename . '.' . $name, $number)]);
        }
        if (gettype($name) == 'integer') {
            return trans_choice($filename . '.' . $key, $name);
        }
    }
    // return mlsObj($filename)->getTitleNames($key, $number);
    return trans_choice($filename . '.' . $key, $number);
}

function getSettingDataBySlug($slug)
{
    $data = Setting::where('slug', '=', $slug)->first();
    if ($data) {
        return $data->value;
    }
    return null;
}


function webLogoImg()
{
    $logo = getSettingDataBySlug('logo');
    $logo_name = ($logo != null) ? $logo : null;
    if ($logo_name) {
        $logo_img = asset('files/settings/' . $logo . '');
        $logo_img = $logo_img;
    } else {
        $logo_img = imageNotFoundUrl();
    }
    return $logo_img;
}

function webFaviconImg()
{
    $favicon = getSettingDataBySlug('favicon');
    $favicon_name = ($favicon != null) ? $favicon : null;
    if ($favicon_name) {
        $favicon_img = asset('files/settings/' . $favicon . '');
        $favicon_img = $favicon_img;
    } else {
        $favicon_img = url('/') . 'blank.png';
    }
    return $favicon_img;
}


function adminTitleName()
{
    $site_name = getSettingDataBySlug('site_name');
    return isset($site_name) ? $site_name : config('services.app_details.app_name');
}

function webTitleName()
{
    $web_site_name = getSettingDataBySlug('web_site_name');
    return isset($web_site_name) ? $web_site_name : 'Demo';
}



function defaultUserImageApiUrl()
{
    return  url('/') . '/virtue/images/default_user_image_api.png';
}

function blankImageUrl()
{
    return  url('/') . '/virtue/images/blank-image.png';
}

function webSiteTitleName()
{
    $site_name = getSettingDataBySlug('site_name');
    return isset($site_name) ? $site_name : config('services.env.app_name');
}

function loadingGif()
{
    return  url('/') . '/virtue/images/loading.gif';
}

function logoNotFoundUrl()
{
    return  url('/') . '/files/settings/Staaraee-logo.png';
}

function imageNotFoundUrl()
{
    return  url('/') . '/virtue/images/blank-image.png';
}

function frontImageNotFoundUrl()
{
    return  url('/') . '/virtue/images/blg2.png';
}

function ajaxButtonLoader()
{
    return  url('/') . '/virtue/images/ajax_btn_loader.gif';
}


function bannerImageNotFoundUrl()
{
    return  url('/') . '/virtue/images/home2.png';
}

function iconNotFoundUrl()
{
    return  url('/') . '/virtue/images/icon-not-found.png';
}

function blankUserUrl()
{
    return  url('/') . '/virtue/images/blank_user.png';
}

function faviconUrl()
{
    return  url('/') . '/virtue/images/favicon.ico';
}

function currencyIcon()
{
    if (env('CURRENCY_ICON')) {
        return env('CURRENCY_ICON');
    }
    return '₹';
}

function setStringLength($string_value, $length = 20) {
    if (!isset($string_value) || $string_value == null) {
        return "Na";
    } else {
        return (strlen($string_value) > $length) ? substr($string_value, 0, $length - strlen('...')) . '....' : $string_value;
    }
}