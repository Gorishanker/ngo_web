<?php

use App\Http\Controllers\Admin\AdminErrorPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::controller(HomeController::class)->group(function () {
//     Route::get('/', 'index')->name('home');
//     Route::any('contact-us', 'submitContactForm')->name('submitContactForm');
//     Route::get('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
//     Route::get('/terms-and-conditions', 'termAndConditions')->name('termAndConditions');
// });

Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
});


Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm');
        Route::post('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/forget-password', 'forgetPassword')->name('forgetPassword');
        Route::post('/create-otp', 'createOtp')->name('createOtp');
        Route::get('/submit-otp', 'submitOtp')->name('submitOtp');
        Route::post('/otp-verify', 'otpVerify')->name('otpVerify');
        Route::get('/change_password', 'changePassword')->name('confirm_password');
        Route::post('/change-password', 'verifyPassword')->name('verifyPassword');
    });

    Route::controller(AdminErrorPageController::class)->group(function () {
        Route::get('/404', 'pageNotFound')->name('notfound');
        Route::get('/500', 'serverError')->name('server_error');
    });
    Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/test', 'test')->name('test');
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('dashboard-counts', 'dashboardCountsData')->name('dashboard-counts');
        });

        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('change-password', 'changePassword')->name('change_password');
            Route::get('edit-profile', 'editProfile')->name('edit_profile');
            Route::patch('change-password/{user}', 'updatePassword')->name('update.password');
            Route::patch('edit-profile/{user}', 'updateProfile')->name('update.edit_profile');
        });
        //Setting manager
        Route::controller(SettingController::class)->group(function () {
            Route::get('/settings/general', 'edit_general')->name('settings.edit_general');
            Route::post('/settings/general', 'update_general')->name('settings.update_general');
            Route::get('/settings/social-login', 'editSocialLogin')->name('settings.edit_social_login');
            Route::post('/settings/social-login', 'updateSocialLogin')->name('settings.update_social_login');
        });

        //Category Controller
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories/status/{id}/{status}', 'status')->name('category.status');
        });
        Route::resource('/categories', CategoryController::class);

        //page_contents Controller
        Route::controller(PageContentController::class)->group(function () {
            Route::get('/page_contents/status/{id}/{status}', 'status');
        });
        Route::resource('/page_contents', PageContentController::class);

        //faqs Controller
        Route::controller(FaqController::class)->group(function () {
            Route::get('/faqs/status/{id}/{status}', 'status');
        });
        Route::resource('/faqs', FaqController::class);


        //contact_us Controller
        Route::controller(ContactUsController::class)->group(function () {
            Route::get('/contact_us/status/{id}/{status}', 'status');
            Route::post('/contact_us/{contact_u}/replay', 'replay');
            Route::post('/contact_us/download', 'export')->name('contact_us.download');
        });
  
    });
});
