<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\GiftTreeRequest;
use App\Http\Requests\Front\ReviewRequest;
use App\Models\Campaign;
use App\Models\CampaignCombo;
use App\Models\Occasion;
use App\Models\Order;
use App\Models\OrderGiftCampaign;
use App\Models\OrderItem;
use App\Models\Review;
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
        $reviews = Review::where(['campaign_id' => $campaign_detail->id, 'status' => 1])->paginate(5);
        $campaigns  = Campaign::where('is_active', 1)->orderBy('total_rating', 'desc')->take(4)->get();
        $meta_title = $campaign_detail->title;
        $logo = getSettingDataBySlug('logo');
        $meta_description =  isset($campaign_detail->benefit) ? setStringLength(strip_tags($campaign_detail->benefit, 250)) : $meta_title;
        SEOTools::webPage($meta_title, $meta_description, $logo, $campaign_detail->image);
        return view('front.campaign_detail', compact('campaign_detail', 'campaigns','reviews'));
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

    public function UpdateCartVariation(Request $request, CampaignCombo $combo, Campaign $campaign)
    {
        $order = Order::where(['ip_address' => $request->ip(), 'status' => 1])->first();
        if (isset($order)) {
            $order_item = OrderItem::where(['order_id' => $order->id, 'campagin_id' => $campaign->id])->first();
            $order_item->update(['combo_id' => $combo->id, 'price' => $combo->price, 'total_amount' => ($order_item->quantity * $combo->price)]);
            $total_amount = OrderItem::where(['order_id' => $order->id])->sum('total_amount');
            $order->update(['total_price' => $total_amount]);
        }
        $total = $combo->price;
        return response()->json([
            'status' => true,
            'total' => $total,
        ], 200);
    }

    public function giveTheOccasion(Request $request)
    {
        $order = Order::where(['status' => 0, 'ip_address' => $request->ip()])->orderBy('created_at', 'desc')->first();
        if (isset($order)) {
            $data_exist = OrderGiftCampaign::where(['order_id' => $order->id, 'campaign_id' => $request->occassion_campaign_id])->first();
            if (isset($request->custom_occasion)) {
                if (isset($data_exist)) {
                    $data = $data_exist->update(['occasion' => $request->custom_occasion]);
                } else {
                    $data = OrderGiftCampaign::create(['occasion' => $request->custom_occasion, 'campaign_id' => $request->occassion_campaign_id]);
                }
            } else {
                $occassion = Occasion::find($request->occasion);
                if (isset($occassion)) {
                    if (isset($data_exist)) {
                        $data = $data_exist->update(['occasion' => $occassion->name]);
                    } else {
                        $data = OrderGiftCampaign::create(['occasion' => $occassion->name, 'campaign_id' => $request->occassion_campaign_id]);
                    }
                }else{
                    if (isset($data_exist)) {
                        $data = $data_exist->update(['occasion' => $request->occasion]);
                    } else {
                        $data = OrderGiftCampaign::create(['occasion' => $request->occasion, 'campaign_id' => $request->occassion_campaign_id]);
                    }
                }
            }
        }
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Thank you for submit form.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'Error! while getting your query.',
            ], 422);
        }
    }

    public function submitGirtTree(GiftTreeRequest $request)
    {
        $input = $request->validated();
        $order = Order::where(['status' => 0, 'ip_address' => $request->ip()])->orderBy('created_at', 'desc')->first();
        if (isset($order)) {
            $input['campaign_id'] = $request->campaign_id;
            $input['order_id'] = $order->id;
            $data_exist = OrderGiftCampaign::where(['order_id' => $order->id, 'campaign_id' => $request->campaign_id])->first();
            if (isset($data_exist)) {
                $data = $data_exist->update($input);
            } else {
                $data = OrderGiftCampaign::create($input);
            }
        }
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Thank you for submit form.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'Error! while getting your query.',
            ], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function campaignReview(ReviewRequest $request)
    {
        $input = $request->validated();
        $comment = Review::create($input);
        if (isset($comment)) {
            return response()->json([
                'status' => true,
                'message' => 'Your review successfully saved.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating categories.',
            ], 422);
        }
    }
}
