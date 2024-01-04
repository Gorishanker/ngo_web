<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\BlogCommentRequest;
use App\Http\Requests\Front\ContactUsRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\PageContent;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $home_view, $policy_view, $terms_view, $about_us_view, $service_view, $service_detail_view, $project_view, $project_detail_view, $blogs_view, $blog_detail_view, $team_detail_view;

    public function __construct()
    {
        //view files
        $this->home_view = 'front.home';
        $this->about_us_view = 'front.about_us';
        $this->service_view = 'front.service';
        $this->blogs_view = 'front.blogs';
        $this->blog_detail_view = 'front.blog_detail';
        $this->service_detail_view = 'front.service_detail';
        $this->project_detail_view = 'front.project_detail';
        $this->team_detail_view = 'front.team_detail';
        $this->project_view = 'front.projects';
        $this->terms_view = 'front.term_and_conditions';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)->select('title', 'content', 'image', 'slug')->take(6)->get();
        $categories = Category::where('is_active', 1)->select('category_name', 'id')->get();
        $blogs = Blog::where(['is_active' => 1, 'schedule_datetime' => null])->orWhere('schedule_datetime', '<=', now())->take(3)->orderBy('id', 'desc')->get();
        $campaigns  = Campaign::where('is_active', 1)->take(3)->get();
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->home_view, compact('banners', 'categories', 'services', 'campaigns','blogs'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqs()
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        $faqs = Faq::where('is_active', 1)->orderBy('id', 'desc')->get();
        return view('front.faq', compact('faqs'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects(Request $request,$category_id = null)
    {
        if (isset($category_id)) {
            if (request()->is('*services*'))
                $projects = Project::where(['is_active' =>  1, 'category_id' => $category_id])->select('title', 'image', 'slug')->get();
            else
                $projects = Project::where(['is_active' =>  1, 'category_id' => $category_id])->select('title', 'image', 'slug');
        } else {
            if (request()->is('*services*'))
                $projects = Project::where('is_active',  1)->select('title', 'image', 'slug')->get();
            else
                $projects = Project::where('is_active',  1)->select('title', 'image', 'slug');
        }
        if(isset($request->page)){
            $projects = $projects->paginate(6);
            if($projects->currentPage() == $projects->lastPage()){
                $disable_load_more_btn = true;
            }
        }else{
            $projects = $projects->take(6)->get();
        }
        if (isset($projects) && $projects->count() > 0) {
            $html = view('front.project', compact('projects'))->render();
            return response()->json([
                'status' => 1,
                'html' => $html,
                'disable_btn' => isset($disable_load_more_btn) ? true : null,
            ]);
        }
        return false;
    }

    /**
     * Display a privacy aboutUs page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        $blogs = Blog::where(['is_active' => 1, 'schedule_datetime' => null])->orWhere('schedule_datetime', '<=', now())->take(3)->orderBy('id', 'desc')->get();
        return view($this->about_us_view, compact('blogs'));
    }

    /**
     * Display a privacy services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        $services = Service::where('is_active', 1)->select('title', 'content', 'image', 'slug')->get();
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        $categories = Category::where('is_active', 1)->select('category_name', 'id')->get();
        return view($this->service_view, compact('services', 'categories'));
    }

     /**
     * Display a privacy services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function serviceView($slug)
    {
        $service_detail = Service::where(['is_active' => 1, 'slug' => $slug])->first();
        $services = Service::where('is_active', 1)->select('id','title','slug')->orderBy('id', 'desc')->take(6)->get();
        $meta_title =  isset($service_detail->title) ? $service_detail->title : 'GREEN FOREST Service Details';
        $logo = getSettingDataBySlug('logo');
        $meta_description = isset($service_detail->content) ? setStringLength(strip_tags($service_detail->content,150)) :$meta_title ;
        SEOTools::webPage($meta_title, $meta_description, $logo);
        if(!isset($service_detail))
        abort(404);
        return view($this->service_detail_view, compact('service_detail','services'));
    }

    /**
     * Display a privacy projects page.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectIndex()
    {
        $categories = Category::where('is_active', 1)->select('category_name', 'id')->get();
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->project_view, compact( 'categories'));
    }

     /**
     * Display a privacy project view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectView($slug)
    {
        $project_detail = Project::where(['is_active' => 1, 'slug' => $slug])->first();
        $meta_title =  isset($project_detail->title) ? $project_detail->title : 'GREEN FOREST Project Details';
        $logo = getSettingDataBySlug('logo');
        $meta_description = isset($project_detail->content) ? setStringLength(strip_tags($project_detail->content,150)) :$meta_title ;
        SEOTools::webPage($meta_title, $meta_description, $logo);
        if(!isset($project_detail))
        abort(404);
        return view($this->project_detail_view, compact('project_detail'));
    }

     /**
     * Display a privacy services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogs()
    {
        $blogs = Blog::where(['is_active' => 1, 'schedule_datetime' => null])->orWhere('schedule_datetime', '<=', now())->select('title','meta_description', 'image', 'slug','schedule_datetime','created_at')->paginate(9);
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->blogs_view, compact('blogs'));
    } 

     /**
     * Display a blog view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogView($slug)
    {
        $blog_detail = Blog::where(['is_active' => 1, 'slug' => $slug])->first();
        if(!isset($blog_detail))
        abort(404);
        $comments = BlogComment::where(['is_active'=> 1, 'blog_id' => $blog_detail->id])->paginate(10);
        $blogs = Blog::where('is_active', 1)->where('slug', '!=', $slug)->orderBy('total_comments', 'desc')->take(5)->get();
        $meta_title =  isset($blog_detail->meta_title) ? $blog_detail->meta_title : 'GREEN FOREST Blog Details';
        $logo = getSettingDataBySlug('logo');
        $image = getSettingDataBySlug('logo');
        $meta_description = isset($blog_detail->meta_description) ? $blog_detail->meta_description :$meta_title ;
        SEOTools::webPage($meta_title, $meta_description, $image, $logo);
        $blog_detail->update(['total_comments'=> $blog_detail->getActiveComments()->count()]);
        return view($this->blog_detail_view, compact('blog_detail','blogs','comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blogCommentStore(BlogCommentRequest $request)
    {
        $input = $request->validated();
        $comment = BlogComment::create($input);
        if (isset($comment)) {
            return response()->json([
                'status' => true,
                'message' => 'Your comment successfully saved.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating categories.',
            ], 422);
        }
    }

    /**
     * Display a privacy terms page.
     *
     * @return \Illuminate\Http\Response
     */
    public function termAndConditions()
    {
        $term_and_condition = PageContent::where(['key' => 'term_and_conditions', 'user_type' => 1, 'language' => 'en'])->first();
        return view($this->terms_view, compact('term_and_condition'));
    }

    public function contactUs()
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view('front.contact_us');
    }

    /**
     * Store a Contact us page info.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitContactUs(ContactUsRequest $request)
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

    public function gallery( )
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        $categories = Category::where('is_active', 1)->select('category_name', 'id')->get();
        return view('front.gallery', compact('categories'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showImages(Request $request,$category_id = null)
    {
        if (isset($category_id)) {
           $images = Gallery::where('category_id', $category_id)->paginate(9);
        } else {
            $images = Gallery::paginate(9);
        }
        if (isset($images) && $images->count() > 0) {
            $html = view('front.add_images', compact('images'))->render();
            return response()->json([
                'status' => 1,
                'html' => $html,
            ]);
        }
        return false;
    }

    /**
     * Display a privacy project view page.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamView($slug)
    {
        $team_detail = Team::where(['is_active' => 1, 'slug' => $slug])->first();
        $meta_title =  isset($team_detail->name) ? $team_detail->name : 'GREEN FOREST Team Details';
        $logo = getSettingDataBySlug('logo');
        $meta_description = isset($team_detail->description) ? setStringLength(strip_tags($team_detail->description,150)) :$meta_title ;
        SEOTools::webPage($meta_title, $meta_description, $logo, $team_detail->image);
        if(!isset($team_detail))
        abort(404);
        return view($this->team_detail_view, compact('team_detail'));
    }

}
