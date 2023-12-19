<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Color;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Gem;
use App\Models\Guruji;
use App\Models\Milestone;
use App\Models\MilestoneCategory;
use App\Models\MilestoneSubCategory;
use App\Models\MilestoneSubSubCategory;
use App\Models\Project;
use App\Models\Question;
use App\Models\Service;
use App\Models\Tag;
use App\Models\TarotCard;
use App\Models\Team;
use App\Models\User;

class DashboardService
{
    /**
     * Update the specified resource in storage.
     *
     * @return $data
     */
    public static function adminDataCounts()
    {
        $data['total_services'] = Service::count();
        $data['total_teams'] = Team::count();
        $data['total_projects'] = Project::count();
        $data['total_campaigns'] = Campaign::count();
        $data['total_blogs'] = Blog::count();
        $data['total_categories'] = Category::count();
        $data['total_tags'] = Tag::count();
        $data['total_banners'] = Banner::count();
        $data['total_faqs'] = Faq::count();
        $data['total_contact_us'] = ContactUs::count();
        return $data;
    }
}
