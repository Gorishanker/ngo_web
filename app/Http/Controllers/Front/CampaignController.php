<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CampaignService;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    protected $index_view;

    public function __construct()
    {
        //view files
        $this->index_view = 'front.campaigns';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function campaigns(Request $request)
    {
        $campaigns  = Campaign::where('is_active', 1)->paginate(20);
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->index_view, compact('campaigns'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $campaign_detail  = Campaign::where(['is_active' => 1, 'slug' => $slug])->first();
        $campaigns  = Campaign::where('is_active', 1)->orderBy('total_rating', 'desc')->take(4);
        $meta_title = $campaign_detail->title;
        $logo = getSettingDataBySlug('logo');
        $meta_description =  isset($campaign_detail->content) ? setStringLength(strip_tags($campaign_detail->content, 250)) : $meta_title;
        SEOTools::webPage($meta_title, $meta_description, $logo, $campaign_detail->image);
        return view('front.campaign_detail', compact('campaign_detail', 'campaigns'));
    }

    public function addOrUpdateCart(Request $request, Campaign $campaign)
    {
        if (isset($request->combo_id) || $request->combo_id > 0) {
            CampaignService::addOrUpdateCartWithCombo($request, $campaign);
        } else {
            CampaignService::addOrUpdateCart($request, $campaign);
        }
        return response()->json([
            'status' => true,
        ], 200);
    }
}
