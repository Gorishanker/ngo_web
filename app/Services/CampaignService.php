<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\CampaignCombo;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CampaignService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Campaign
     */
    public static function create(array $data)
    {
        $data = Campaign::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Campaign
     */
    public static function insert(array $data)
    {
        $data = Campaign::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Campaign $campaign)
    {
        $data = $campaign->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function addOrUpdateCart(Request $request, Campaign $campaign)
    {
        $ip_address = $request->ip();
        $order = Order::where(['ip_address' => $ip_address, 'status' => 0])->first();
        if (isset($order)) {
            if ($request->qty <= 0) {
                OrderItem::where(['order_id' => $order->id, 'campagin_id' => $campaign->id])->delete();
                return false;
            } else {
                $order_item =  OrderItem::where(['order_id' => $order->id, 'campagin_id' => $campaign->id])->first();
                if (isset($order_item)) {
                    $order_item->update(['quantity' => $request->qty, 'price' => $campaign->price, 'total_amount' => ($campaign->price) * ($request->qty)]);
                } else {
                    $order_item = OrderItem::create([
                        'order_id' => $order->id, 'ip_address' => $ip_address, 'campagin_id' => $campaign->id, 'price' => $campaign->price,
                        'quantity' => $request->qty, 'total_amount' => ($campaign->price) * ($request->qty)
                    ]);
                }
                $total_amt =  OrderItem::where('order_id', $order->id)->sum('total_amount');
                $order->update(['total_price' =>  $total_amt]);
            }
        } else {
            if ($request->qty <= 0) {
                return false;
            } else {
                $order = Order::create(['ip_address' => $ip_address, 'total_price' => ($campaign->price) * ($request->qty)]);
                $order_item = OrderItem::create([
                    'order_id' => $order->id, 'ip_address' => $ip_address, 'campagin_id' => $campaign->id, 'price' => $campaign->price,
                    'quantity' => $request->qty, 'total_amount' => ($campaign->price) * ($request->qty)
                ]);
            }
        }
        return true;
    }

    /*** Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */

    public static function addOrUpdateCartWithCombo(Request $request, Campaign $campaign)
    {
        $ip_address = $request->ip();
        $campaign_combo = CampaignCombo::find($request->combo_id);
        if (isset($campaign_combo)) {
            $order = Order::where(['ip_address' => $ip_address, 'status' => 0])->first();
            if (isset($order)) {
                if ($request->qty <= 0) {
                    OrderItem::where(['order_id' => $order->id, 'campagin_id' => $campaign->id])->delete();
                    return false;
                } else {
                    $order_item =  OrderItem::where(['order_id' => $order->id, 'campagin_id' => $campaign->id])->first();
                    if (isset($order_item)) {
                        $order_item->update(['combo' => 1, 'combo_id' => $request->combo_id, 'quantity' => $request->qty, 'price' => $campaign_combo->price , 'total_amount' => ($campaign_combo->price) * ($request->qty)]);
                    } else {
                        $order_item = OrderItem::create([
                            'order_id' => $order->id, 'ip_address' => $ip_address, 'campagin_id' => $campaign->id,'combo' => 1, 'combo_id' => $request->combo_id,
                            'quantity' => $request->qty, 'price' => $campaign_combo->price , 'total_amount' => ($campaign_combo->price) * ($request->qty)
                        ]);
                    }
                    $total_amt =  OrderItem::where('order_id', $order->id)->sum('total_amount');
                    $order->update(['total_price' =>  $total_amt]);
                }
            } else {
                if ($request->qty <= 0) {
                    return false;
                } else {
                    $order = Order::create(['ip_address' => $ip_address, 'total_price' => ($campaign_combo->price) * ($request->qty)]);
                    $order_item = OrderItem::create([
                        'combo' => 1, 'combo_id' => $request->combo_id,'order_id' => $order->id, 'ip_address' => $ip_address, 'campagin_id' => $campaign->id, 'price' => $campaign_combo->price,
                        'quantity' => $request->qty, 'total_amount' => ($campaign_combo->price) * ($request->qty)
                    ]);
                }
            }
            return true;
        } else {
            self::addOrUpdateCart($request,$campaign);
            return true;
        }
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Campaign $campaign
     */
    public static function getById($id)
    {
        $data = Campaign::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Campaign
     */
    public static function updateById(array $data, $id)
    {
        $data = Campaign::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Campaign $campaign
     * @return bool
     */
    public static function delete(Campaign $campaign)
    {
        $data = $campaign->delete();
        return $data;
    }

    /**
     * Remove the specified id from storage.
     *
     * @param  $id
     * @return bool
     */
    public static function deleteById($id)
    {
        $result = false;
        $data = self::getById($id);
        if ($data) {
            $result = $data->delete();
        }
        return $result;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Campaign::query();
        return $data;
    }
}
