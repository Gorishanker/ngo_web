<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use App\Services\ProductService;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $index_view;

    public function __construct()
    {
        //view files
        $this->index_view = 'front.products';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->min_amt) && isset($request->max_amt)){
            $products  = Product::where('is_active', 1)->where('amount', '>=', $request->min_amt)->where('amount', '<=', $request->max_amt)->paginate(9);
            if($products->count() <= 0){
                $products  = Product::where('is_active', 1)->paginate(9);
            }
        }else{
            $products  = Product::where('is_active', 1)->paginate(9);
        }
        $latest_products  = Product::where('is_active', 1)->orderBy('id', 'desc')->get()->take(10);
        $max_amount  = Product::where('is_active', 1)->max('amount');
        $min_amount  = Product::where('is_active', 1)->min('amount');
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        return view($this->index_view, compact('products','max_amount', 'min_amount','latest_products'));
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product  = Product::where(['is_active' => 1, 'slug' => $slug])->first();
        $reviews = Review::where(['product_id' => $product->id, 'status' => 1])->paginate(5);
        $products  = Product::where('is_active', 1)->orderBy('total_rating', 'desc')->take(9)->get();
        $meta_title = $product->title;
        $logo = getSettingDataBySlug('logo');
        $meta_description =  isset($product->benefit) ? setStringLength(strip_tags($product->benefit, 250)) : $meta_title;
        SEOTools::webPage($meta_title, $meta_description, $logo, $product->image);
        return view('front.product_detail', compact('product', 'products','reviews'));
    }

    public function addOrUpdateCart(Request $request, Product $product)
    {
            ProductService::addOrUpdateCart($request, $product);
        return response()->json([
            'status' => true,
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productReview(ReviewRequest $request)
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
