<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentHistoryController extends Controller
{
    protected $mls;
    protected $index_view, $detail_view;
    protected $index_route_name, $detail_route_name;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.payment_histories.index';
        $this->detail_route_name = 'admin.payment_histories.show';

        //view files
        $this->index_view = 'admin.payment_history.index';
        $this->detail_view = 'admin.payment_history.details';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $items =Payment::query();
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
    public function show(Payment $payment_history)
    {
        return  view($this->detail_view, compact('payment_history'));
    }
}
