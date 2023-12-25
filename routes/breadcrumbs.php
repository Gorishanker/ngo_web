<?php

use App\Services\ManagerLanguageService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

$mls = new ManagerLanguageService('lang_breadcrumbs');
// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push('Dashboard', route('home.index'));
// });

// Breadcrumbs::for('subcategories', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('SubCategories', route('sub_categories.index'));
// });

/*------------- Admin Dashboard (Admin Home) -------------*/
// Home
Breadcrumbs::for('admin.dashboard', function ($trail) use ($mls) {
    $trail->push($mls->messageLanguage('only_name', 'dashboard', 2), route('admin.dashboard'));
});

Breadcrumbs::for("admin.profile", function ($trail) use ($mls) {
    $trail->parent("admin.dashboard");
    $trail->push($mls->messageLanguage('only_name', 'profile', 2), route("admin.profile"));
});
Breadcrumbs::for("admin.change-password", function ($trail) use ($mls) {
    $trail->parent("admin.dashboard");
    $trail->push($mls->messageLanguage('only_name', 'change_password', 2), route("admin.change_password"));
});
Breadcrumbs::for("admin.edit-profile", function ($trail) use ($mls) {
    $trail->parent("admin.dashboard");
    $trail->push($mls->messageLanguage('only_name', 'edit_profile', 2), route("admin.edit_profile"));
});


// general Settings
Breadcrumbs::for('admin.settings.edit_general', function ($trail) {
    $trail->parent("admin.dashboard");
    $trail->push('Settings - General', route("admin.settings.edit_general"));
});

// general Settings
Breadcrumbs::for('admin.settings.edit_social_login', function ($trail) {
    $trail->parent("admin.dashboard");
    $trail->push('Settings - General', route("admin.settings.edit_social_login"));
});

Breadcrumbs::macro('resource', function ($name, $title, $list = false) {
    // Home > $title
    Breadcrumbs::for("admin.$name.index", function ($trail) use ($name, $title) {
        $trail->parent("admin.dashboard");
        $trail->push($title, route("admin.$name.index"));
    });
    // Home > $title > Add New
    Breadcrumbs::for("admin.$name.create", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push("Add New $title", route("admin.$name.create"));
    });
    // Home > $title > Edit
    Breadcrumbs::for("admin.$name.edit", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push("Edit $title", url("admin/$name/{id}/edit"));
    });
    // Home > $title > Details
    Breadcrumbs::for("admin.$name.show", function ($trail) use ($name, $title) {
        $trail->parent("admin.$name.index");
        $trail->push(" Details", url("admin/$name/{id}"));
    });
    if ($list == true) {
        Breadcrumbs::for("admin.$name.list", function ($trail) use ($name, $title) {
            $trail->parent("admin.dashboard");
            $trail->push($title, route("admin.$name.list"));
        });
    }
});

// Sub breadcrumbs Resource
Breadcrumbs::macro('subresource', function ($main, $main_title, $sub = '', $sub_title = '', $request = '', $param_key = '', $tab = '') {
    // Home > $main_title
    Breadcrumbs::for("admin.$main.index", function ($trail) use ($main, $main_title) {
        $trail->parent("admin.dashboard");
        $trail->push($main_title, route("admin.$main.index"));
    });

    // Home > $main_title > Add New
    Breadcrumbs::for("admin.$main.create", function ($trail) use ($main) {
        $trail->parent("admin.$main.index");
        $trail->push("Add New", route("admin.$main.create"));
    });

    // Home > $main_title > Edit
    Breadcrumbs::for("admin.$main.edit", function ($trail) use ($main, $request) {
        $trail->parent("admin.$main.index");
        $trail->push("Edit", url("admin/$main/" . request()->{$request} . "/edit"));
    });

    // Home > $main_title > Details
    Breadcrumbs::for("admin.$main.show", function ($trail) use ($main) {
        $trail->parent("admin.$main.index");
        $trail->push("Details", url("admin/$main/{id}"));
    });

    // if(!empty($sub)){
    // Home > $main_title > blogs
    Breadcrumbs::for("admin.$sub.index", function ($trail) use ($main, $sub, $sub_title, $request, $param_key) {
        $trail->parent("admin.$main.index");
    });

    // Home > $main_title > $sub > Add New
    Breadcrumbs::for("admin.$sub.create", function ($trail) use ($sub) {
        $trail->parent("admin.$sub.index");
        $trail->push("Add New", route("admin.$sub.create"));
    });

    // Home > $main_title > $sub > Profile
    Breadcrumbs::for("admin.$sub.edit", function ($trail) use ($sub) {
        $trail->parent("admin.$sub.index");
        $trail->push("Edit", url("admin/$sub/{id}/edit"));
    });

    // Home > $main_title > $sub > Details
    Breadcrumbs::for("admin.$sub.show", function ($trail) use ($sub) {
        $trail->parent("admin.$sub.index");
        $trail->push("Details", url("admin/$sub/{id}"));
    });
    // }

});

/*------------- Admin Users ------------------------*/
Breadcrumbs::resource('users', $mls->messageLanguage('only_name', 'user', 2));


/*------------- Admin Categories ------------------------*/
Breadcrumbs::resource('categories', 'Categories');
/*------------- Admin Occasions ------------------------*/
Breadcrumbs::resource('occasions', 'Occasions');

/*------------- Admin impact-stories ------------------------*/
Breadcrumbs::resource('impact-stories', 'Impact Stories');

/*------------- Admin Sponsors ------------------------*/
Breadcrumbs::resource('sponsors', 'Sponsors');



Breadcrumbs::resource('page_contents', 'Page Content');
/*------------- Admin faqs ------------------------*/
Breadcrumbs::resource('faqs', "Faq's");
/*------------- Admin projects ------------------------*/
Breadcrumbs::resource('projects', "Projects");
/*------------- Admin blogs ------------------------*/
Breadcrumbs::resource('blogs', "Blogs");
/*------------- Admin services ------------------------*/
Breadcrumbs::resource('services', "Services");
/*------------- Admin campaigns ------------------------*/
Breadcrumbs::resource('campaigns', "Campaigns");
/*------------- Admin teams ------------------------*/
Breadcrumbs::resource('teams', "Teams");
/*------------- Admin events ------------------------*/
Breadcrumbs::resource('events', "Events");
/*------------- Admin news ------------------------*/
Breadcrumbs::resource('news', "News");
/*------------- Admin banners ------------------------*/
Breadcrumbs::resource('banners', "Banners");
/*------------- Admin tags ------------------------*/
Breadcrumbs::resource('tags', "tags");

// /*------------- Admin contact us ------------------------*/
Breadcrumbs::resource('contact_us', 'Contact us');
// /*------------- Admin gallery ------------------------*/
Breadcrumbs::resource('galleries', 'Gallery');
