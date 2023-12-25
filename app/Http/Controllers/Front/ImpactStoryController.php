<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ImpactStory;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ImpactStoryController extends Controller
{
    protected $index_view, $detail_view;

    public function __construct()
    {
        //view files
        $this->index_view = 'front.impact';
        $this->detail_view = 'front.impact_detail';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $impacts  = ImpactStory::where('is_active', 1)->paginate(20);
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->index_view, compact('impacts'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $impact  = ImpactStory::where(['is_active' => 1, 'slug' => $slug])->first();
        $meta_title = $impact->title;
        $logo = getSettingDataBySlug('logo');
        $meta_description =  isset($impact->content) ? setStringLength(strip_tags($impact->content, 250)) : $meta_title;
        SEOTools::webPage($meta_title, $meta_description, $logo, $impact->image);
        return view($this->detail_view, compact('impact'));
    }
}
