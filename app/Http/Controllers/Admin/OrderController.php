<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    protected $mls;
    protected $index_view, $detail_view;
    protected $index_route_name, $detail_route_name;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.orders.index';
        $this->detail_route_name = 'admin.orders.show';

        //view files
        $this->index_view = 'admin.order.index';
        $this->detail_view = 'admin.order.details';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $items =Order::query();
            return dataTables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return  view($this->detail_view, compact('order'));
    }
}
