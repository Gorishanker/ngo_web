<?php

use App\Http\Controllers\Admin\AdminErrorPageController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CampaignController as FrontCampaignController;
use App\Http\Controllers\Front\ImpactStoryController as FrontImpactStoryController;
use App\Http\Controllers\Front\DonationController as FrontDonationController;
use App\Http\Controllers\Front\CartController as FrontCartController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
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

Route::controller(FrontDonationController::class)->group(function () {
    Route::any('/verify-payment/razorpay-webhook', 'paymentVerify');
});

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
    Route::get('/teams/{slug}', 'teamView')->name('front.teamView');
    Route::get('/services', 'services')->name('front.services');
    Route::get('/service/{slug}', 'serviceView')->name('front.serviceView');
    Route::get('/gallery', 'gallery')->name('front.gallery');
    Route::get('/faqs', 'faqs')->name('front.faqs');
    Route::get('/update-cart-counter', 'cartCounter');
    Route::get('/terms-and-conditions', 'termAndConditions')->name('termAndConditions');
});

Route::controller(FrontCampaignController::class)->group(function () {
    Route::get('/campaigns', 'campaigns')->name('front.campaigns.index');
    Route::get('/campaign/{slug}', 'show')->name('front.campaign.show');
    Route::post('/campaigns/add-or-update-cart/{campaign}', 'addOrUpdateCart');
    Route::get('/campaigns/update-campaign-variation/{combo}/{campaign}', 'UpdateCartVariation');
    Route::post('/add-or-update-gift-tree', 'submitGirtTree')->name('front.submitGirtTree');
    Route::post('/add-or-update-occasion-tree', 'giveTheOccasion')->name('front.giveTheOccasion');
    Route::post('/campaign/review', 'campaignReview')->name('front.campaignReview.store');
});

Route::controller(FrontImpactStoryController::class)->group(function () {
    Route::get('/impact-stories', 'index')->name('front.impactStory.index');
    Route::get('/impact-story/{slug}', 'show')->name('front.impactStory.show');
});

Route::controller(FrontProductController::class)->group(function () {
    Route::get('/products', 'index')->name('front.products.index');
    Route::get('/products/{slug}', 'show')->name('front.product.show');
    Route::post('/product/review', 'productReview')->name('front.productReview.store');
    Route::post('/product/add-or-update-cart/{product}', 'addOrUpdateCart');

});

Route::controller(FrontDonationController::class)->group(function () {
    Route::get('/donate', 'donate')->name('front.donate');
    Route::post('/donate-now-submit', 'donateNow')->name('front.donateNow');
    Route::post('/donate/payment', 'payment')->name('front.donationPayment');
});

Route::controller(FrontCartController::class)->group(function () {
    Route::get('/cart', 'index')->name('front.cart');
    Route::post('/cart/update-cart/{order_item}', 'updateCart');
    Route::delete('/cart/delete-item/{order_item}', 'deleteItem');
    Route::get('/cart/donate', 'donate')->name('front.cartCheckout');
});

Route::view('/terms-and-conditions', 'front.static_page');
Route::view('/privacy-policy', 'front.static_page');
Route::view('/cancellations-policy', 'front.static_page');
Route::view('/shipping-policy', 'front.static_page');
Route::view('/pricing-policy', 'front.static_page');


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
         //Sponsor Controller
         Route::controller(SponsorController::class)->group(function () {
            Route::get('/sponsors/status/{id}/{status}', 'status')->name('sponsor.status');
        });
        Route::resource('/sponsors', SponsorController::class);

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

        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('orders.index');
            Route::get('/orders/{order}', 'show')->name('orders.show');
        });

        Route::controller(PaymentHistoryController::class)->group(function () {
            Route::get('/payment_histories', 'index')->name('payment_histories.index');
            Route::get('/payment_histories/{payment_history}', 'show')->name('payment_histories.show');
        });

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

         //impact routes
         Route::controller(ImpactStoryController::class)->group(function () {
            Route::get('/impact-stories/status/{id}/{status}', 'status');
        });
        Route::resource('/impact-stories', ImpactStoryController::class);
        //end::impact routes

        //campaign routes 
        Route::controller(CampaignController::class)->group(function () {
            Route::get('/campaigns/status/{id}/{status}', 'status');
            Route::get('/campaigns/reviews', 'reviewList')->name('campaignReview.list');
            Route::get('/campaigns/review-verify-status/{review}/{status}', 'reviewStatus');
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

         //Products routes
         Route::controller(ProductController::class)->group(function () {
            Route::get('/products/status/{id}/{status}', 'status');
            Route::get('/products/reviews', 'reviewList')->name('productReview.list');
            Route::get('/products/review-verify-status/{review}/{status}', 'reviewStatus');
        });
        Route::resource('/products', ProductController::class);

         //testimonials routes
         Route::controller(TestimonialController::class)->group(function () {
            Route::get('/testimonials/status/{id}/{status}', 'status');
        });
        Route::resource('/testimonials', TestimonialController::class);
        //end::testimonials routes
    });
});
