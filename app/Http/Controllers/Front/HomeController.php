<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Page;
use App\Models\PageContent;

class HomeController extends Controller
{
    protected $home_view, $policy_view, $terms_view;

    public function __construct()
    {
        //view files
        $this->home_view = 'front.home';
        $this->policy_view = 'front.privacy_policy';
        $this->terms_view = 'front.term_and_conditions';
    }
    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::where('is_active', 1)->get();
        return view($this->home_view, compact('faqs'));
    }
    
    /**
     * Display a privacy policy page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy()
    {
        $privacy_policy = PageContent::where(['key' => 'privacy-and-policy', 'user_type' => 1,'language' =>'en'])->first();
        return view($this->policy_view, compact('privacy_policy'));
    }

    /**
     * Display a privacy terms page.
     *
     * @return \Illuminate\Http\Response
     */
    public function termAndConditions()
    {
        $term_and_condition = PageContent::where(['key' => 'term_and_conditions', 'user_type' => 1,'language' =>'en'])->first();
        return view($this->terms_view, compact('term_and_condition'));
    }

    /**
     * Store a Contact us page info.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitContactForm(ContactUsRequest $request)
    {
        $input = $request->validated();
        $data = ContactUs::create($input);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Your query has received. Our team will contact you soon.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'Error! while getting your query.',
            ], 422);
        }
    }
}
