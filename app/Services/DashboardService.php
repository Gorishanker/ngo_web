<?php

namespace App\Services;

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
use App\Models\Question;
use App\Models\TarotCard;
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
        $data['total_users'] = User::count();
        $data['total_gurujis'] = Guruji::count();
        $data['total_contact_reqs'] = ContactUs::count();
        $data['total_payment_received'] = 0;
        $data['total_payment_pending'] = 0;
        $data['total_payment_failed'] = 0;
        $data['total_gems'] = Gem::count();
        $data['total_colors'] = Color::count();
        $data['total_tarot_cards'] = TarotCard::count();
        $data['total_faqs'] = Faq::count();
        $data['total_categories'] = Category::count();
        $data['total_milestones'] = Milestone::count();
        $data['total_milestone_category'] = MilestoneCategory::count();
        $data['total_milestone_sub_category'] = MilestoneSubCategory::count();
        $data['total_milestone_sub_sub_category'] = MilestoneSubSubCategory::count();
        $data['total_questions'] = Question::count();
        return $data;
    }
}
