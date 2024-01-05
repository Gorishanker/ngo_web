<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Product
     */
    public static function create(array $data)
    {
        $data = Product::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Product
     */
    public static function insert(array $data)
    {
        $data = Product::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Product $product)
    {
        $data = $product->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Product $product
     */
    public static function getById($id)
    {
        $data = Product::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Product
     */
    public static function updateById(array $data, $id)
    {
        $data = Product::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Product $product
     * @return bool
     */
    public static function delete(Product $product)
    {
        $data = $product->delete();
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
        if($data){
            $result = $data->delete();
        }
        return $result;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Product::query();
        return $data;   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function addOrUpdateCart(Request $request, Product $product)
    {
        $ip_address = $request->ip();
        $order = Order::where(['ip_address' => $ip_address, 'status' => 0])->first();
        if (isset($order)) {
            if ($request->qty == 'undefined'||$request->qty <= 0) {
                $orderitemCount = OrderItem::where('order_id', $order->id)->count();
                if($orderitemCount <=1){
                    OrderItem::where(['order_id' => $order->id, 'product_id' => $product->id])->delete();
                    $order->delete();
                }else{
                    OrderItem::where(['order_id' => $order->id, 'product_id' => $product->id])->delete();
                }
                return false;
            } else {
                $order_item =  OrderItem::where(['order_id' => $order->id, 'product_id' => $product->id])->first();
                if (isset($order_item)) {
                    $order_item->update(['quantity' => $request->qty, 'price' => $product->amount, 'total_amount' => ($product->amount) * ($request->qty)]);
                } else {
                    $order_item = OrderItem::create([
                        'order_id' => $order->id, 'ip_address' => $ip_address, 'product_id' => $product->id, 'price' => $product->amount,
                        'quantity' => $request->qty, 'total_amount' => ($product->amount) * ($request->qty)
                    ]);
                }
                $total_amt =  OrderItem::where('order_id', $order->id)->sum('total_amount');
                $order->update(['total_price' =>  $total_amt]);
            }
        } else {
            if ($request->qty == 'undefined'||$request->qty <= 0) {
                return false;
            } else {
                $order = Order::create(['ip_address' => $ip_address, 'total_price' => ($product->amount) * ($request->qty)]);
                $order_item = OrderItem::create([
                    'order_id' => $order->id, 'ip_address' => $ip_address, 'product_id' => $product->id, 'price' => $product->amount,
                    'quantity' => $request->qty, 'total_amount' => ($product->amount) * ($request->qty)
                ]);
            }
        }
        return true;
    }


}