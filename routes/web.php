<?php

use App\Http\Controllers\Admin\AdminErrorPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CampaignController as FrontCampaignController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/get-projects/{category_id?}', 'projects');
    Route::get('/get-images/{category_id?}', 'showImages');
    Route::get('/contact-us', 'contactUs')->name('front.contactUs');
    Route::post('/contact-us', 'submitContactUs')->name('front.submitContactUs');
    Route::get('/about-us', 'aboutUs')->name('front.aboutUs');
    Route::get('/projects', 'projectIndex')->name('front.projectIndex');
    Route::get('/blogs', 'blogs')->name('front.blogs');
    Route::get('/blog/{slug}', 'blogView')->name('front.blogView');
    Route::post('/blog/comment', 'blogCommentStore')->name('front.blogComment.store');
    Route::get('/project/{slug}', 'projectView')->name('front.projectView');
    Route::get('/services', 'services')->name('front.services');
    Route::get('/service/{slug}', 'serviceView')->name('front.serviceView');
    Route::get('/gallery', 'gallery')->name('front.gallery');
    Route::get('/terms-and-conditions', 'termAndConditions')->name('termAndConditions');
});

Route::controller(FrontCampaignController::class)->group(function () {
    Route::get('/campaigns', 'campaigns')->name('front.campaigns.index');
    Route::get('/campaign/{slug}', 'show')->name('front.campaign.show');
    Route::post('/campaigns/add-or-update-cart/{campaign}', 'addOrUpdateCart');
});

Route::get('/home', function () {
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

         //Occasion Controller
         Route::controller(OccasionController::class)->group(function () {
            Route::get('/occasions/status/{id}/{status}', 'status')->name('occasion.status');
        });
        Route::resource('/occasions', OccasionController::class);

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
        Route::resource('/contact_us', ContactUsController::class);

        //Banner routes
        Route::controller(BannerController::class)->group(function () {
            Route::get('/banners/status/{id}/{status}', 'status');
        });
        Route::resource('/banners', BannerController::class);
        //end::Banner routes

        //project routes
        Route::controller(ProjectController::class)->group(function () {
            Route::get('/projects/status/{id}/{status}', 'status');
        });
        Route::resource('/projects', ProjectController::class);
        //end::project routes

        //campaign routes
        Route::controller(CampaignController::class)->group(function () {
            Route::get('/campaigns/status/{id}/{status}', 'status');
        });
        Route::resource('/campaigns', CampaignController::class);
        //end::campaign routes

        //service routes
        Route::controller(ServiceController::class)->group(function () {
            Route::get('/services/status/{id}/{status}', 'status');
        });
        Route::resource('/services', ServiceController::class);
        //end::service routes

        //blog routes
        Route::controller(BlogController::class)->group(function () {
            Route::get('/blogs/status/{id}/{status}', 'status');
            Route::get('/blog/comment/status/{blog_comment}/{status}', 'commentStatus');
            Route::get('/blog/comments', 'comments')->name('blog.comments');
        });
        Route::resource('/blogs', BlogController::class);
        //end::blog routes

        //news routes
        Route::controller(NewsController::class)->group(function () {
            Route::get('/news/status/{id}/{status}', 'status');
        });
        Route::resource('/news', NewsController::class);
        //end::news routes

        //event routes
        Route::controller(EventController::class)->group(function () {
            Route::get('/events/status/{id}/{status}', 'status');
        });
        Route::resource('/events', EventController::class);
        //end::event routes

         //team routes
         Route::controller(TeamController::class)->group(function () {
            Route::get('/teams/status/{id}/{status}', 'status');
        });
        Route::resource('/teams', TeamController::class);
        //end::team routes

         //tag routes
         Route::controller(TagController::class)->group(function () {
            Route::get('/tags/status/{id}/{status}', 'status');
        });
        Route::resource('/tags', TagController::class);
        //end::tag routes

        Route::resource('/galleries', GalleryController::class)->only('index', 'store', 'destroy');

    });
});
