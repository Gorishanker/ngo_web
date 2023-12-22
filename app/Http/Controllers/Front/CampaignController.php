<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
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

    public function addOrUpdateCart(Request $request, Campaign $campaign)
    {
        $cartItem = $request->session()->get('campaign_'.$campaign->id);
        dd($request->ip());
        $cartItem = [
                "id" => $campaign->id,
                "qty" => $request->qty,
                'amount' => $campaign->price * $request->qty,
        ];
        $request->session()->put('campaign_'.$campaign->id, $cartItem);

        dump($cartItem);
        return response()->json([
            'status' => true,
        ], 200);
    }

}
