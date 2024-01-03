<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\WebUtilityService;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $index_view, $donate_view;

    public function __construct()
    {
        //view files
        $this->index_view = 'front.cart';
        $this->donate_view = 'front.cart_donate';
    }

    /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $meta_title = getSettingDataBySlug('web_site_name');
        $logo = getSettingDataBySlug('logo');
        $meta_description = getSettingDataBySlug('about_company');
        SEOTools::webPage($meta_title, $meta_description, $logo);
        $order = Order::where(['ip_address'=> $request->ip(), 'status' => 0])->select('id')->first();
        if(isset($order)){
            $items = OrderItem::where('order_id', $order->id);
            $total_amount =  $items->sum('total_amount');
            $items =  $items->get();
        }else{
            $total_amount = 0;
            $items =null;
        }
        return view($this->index_view, compact('items','total_amount'));
    }

     /**
     * Display a landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request, OrderItem $order_item)
    {
        $order_item->update(['quantity' => $request->qty,'total_amount' => $request->qty*$order_item->price]);
        return response()->json([
            'status' => true,
        ], 200);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(OrderItem $order_item)
    {
        if(isset($order_item)){
            $order_items = OrderItem::where('order_id', $order_item->order_id)->get();
            $order = Order::find($order_item->order_id);
            if($order_items->count() <= 1){
                $order->delete(); 
                $result = $order_item->delete();
            }else{
                $result = $order_item->delete();
                $total_amount = OrderItem::where('order_id', $order_item->order_id)->sum('total_amount');
                $order->update(['total_price' =>  $total_amount]);
            }
            return WebUtilityService::swalWithTitleResponse($result, 'deleted', 'cart_item');
        }else{
            return false;
        }
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
        $order = Order::where(['ip_address' => $request->ip(), 'status' => 0])->select('id')->first();
        $order_id = $order->id;
        return view($this->donate_view, compact('order_id'));
    }

}
