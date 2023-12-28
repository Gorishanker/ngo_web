<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\DonationRequest;
use App\Models\Donation;
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
        $payment  = Payment::where(['ip_address' => $request->ip(), 'payment_status' => 0, 'donation_amount' => $request->amount])->update($input);
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
        Log::info('GetWebHookPaymentInformation' . json_encode($request->all()));
        return UtilityService::is200Response(responseMsg('success'));
    }
}
