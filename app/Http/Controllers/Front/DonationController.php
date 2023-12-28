<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\DonationRequest;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\UtilityService;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    protected $index_view, $detail_view;

    public function __construct()
    {
        //view files
        $this->index_view = 'front.donate';
        $this->detail_view = 'front.impact_detail';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function donate(Request $request)
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->index_view);
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function donateNow(DonationRequest $request)
    {
        $input = $request->validated();
        $input['ip_address'] = $request->ip();
        $payment = Payment::create($input);
        $data = [
            'donation_amount' => $payment->donation_amount,
            'donate_id' => $payment->id,
            'pan_name' => $payment->name_on_pan,
            'email' => $payment->email,
            'mobile_no' => $payment->mobile,
            'address' => $payment->address_1,
        ];

        if (isset($payment)) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
            ], 422);
        }
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $input = [
            'payment_id' => $request->razorpay_payment_id,
            'donation_amount' => $request->amount,
            'payment_json' => $request->payment_json,
        ];
        $payment  = Payment::where(['ip_address' => $request->ip(), 'payment_status' => 0, 'donation_amount' => $request->amount])->orderBy('created_at', 'desc')->first();
        $payment = $payment->update($input);
        if (isset($payment)) {
            return response()->json([
                'status' => true,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
            ], 422);
        }
    }

    public function paymentVerify(Request $request)
    {

        $json = json_encode($request->all());
        $decoded_json = json_decode($json);
        if (isset($decoded_json) && $decoded_json->event == 'payment.authorized') {
            if (isset($decoded_json->payload->payment->entity->id) && isset($decoded_json->payload->payment->entity->amount)) {
                $amount = $decoded_json->payload->payment->entity->amount / 100;
                $payment = Payment::where(['ip_address' => $request->ip(), 'payment_id' => $decoded_json->payload->payment->entity->id, 'donation_amount' => $amount])->orderBy('created_at' , 'desc')->first();
                $payment = $payment->update(['payment_status' => 1, 'payment_json' => $json]);
                if(isset($payment->order_id)){
                    $order = Order::where('id', $payment->order_id)->first();
                    if(isset($order)){
                        $order->update(['payment_status'=> 1, 'payment_json' => $json, 'payment_date' => now()]);
                        $order_items = OrderItem::where('order_id', $order->id)->get();
                        if(isset($order_items) && $order_items->count() > 0){
                            foreach($order_items as $order_item){
                                if(isset($order_item->campagin_id)){
                                    $campaign = Campaign::where('id', $order_item->campagin_id)->first();
                                    $raise_amount = round($campaign->raise_amount + $amount);
                                    $campaign->update(['raise_amount' => $raise_amount]);
                                }
                            }
                        }

                    }
                }
            }
        }
        return UtilityService::is200Response(responseMsg('success'));
    }
}
