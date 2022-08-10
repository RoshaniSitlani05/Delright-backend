<?php

namespace App\Http\Controllers;

use App\Models\market_products;
use App\Models\market_orders;
use App\Models\market_carts;
use App\Models\market_order_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }
    public function ProductsByCare($id)
    {

        $producs = market_products::select(
            'market_products.*',
            DB::raw(" (SELECT COUNT(market_carts.id) from market_carts where product_id=market_products.id and user_id=$this->auth_id) as cart")
        )
            ->where('category', $id)
            ->where('status', 1)
            ->paginate(10);
        $producs->makeHidden([
            'created_at', 'updated_at',
            'discount_percentage', 'gst', 'hsn_code',
            'seller_id', 'tags',
            'description'
        ]);
        return $producs;
    }

    public function addToCart(Request $request)
    {
        $cart = new market_carts();
        $cart->user_id = $this->auth_id;
        $cart->product_id = $request->product_id;
        $result = market_carts::where('product_id', $request->product_id)
            ->where('user_id', $this->auth_id)->first();
        if ($result) {
            return response()->json(['errorMsg' => 'Product is already in cart']);
        } else {
            $check = $cart->save();
            if ($check) {
                return response()->json(['successMsg' => 'Product added to cart']);
            }
        }
    }
    public function myCart()
    {
        $products = market_carts::select(
            'market_products.*',
            DB::raw(" (SELECT COUNT(market_carts.id) from market_carts where product_id=market_products.id and user_id=$this->auth_id) as cart")
        )
            ->leftjoin('market_products', 'market_products.id', '=', 'market_carts.product_id')
            ->where('market_carts.user_id', $this->auth_id)
            ->get();
        $products->makeHidden([
            'created_at', 'updated_at',
            'discount_percentage', 'gst', 'hsn_code',
            'seller_id',
            'description'
        ]);
        return response()->json(['details' => $products]);
    }
    public function deleteFromCart($id)
    {
        $cart = market_carts::where('product_id', $id)
            ->where('user_id', $this->auth_id)->first();
        $check = $cart->delete();
        if ($check) {
            return response()->json(['successMsg' => 'Product removed to cart']);
        }
    }
    public function deleteFromCartUser()
    {
        $cart = market_carts::where('user_id', $this->auth_id)->get();
        foreach ($cart as $cart) {
            $check = $cart->id;
            $check->delete();
        }


        return response()->json(['successMsg' => 'Product removed to cart']);
    }





    // Rder product


    public function orderProduct(Request $request)
    {
        $product_info = market_products::where('id', $request->product_id)->first();
        
        $order = new market_orders();
        $order->product_id = $request->product_id;
        $order->user_id = $this->auth_id;
        $order->seller_id = $product_info->seller_id;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->status = "Address not confirmed";
        $check = $order->save();
        if ($check) {
            $order_status = new market_order_status();
            $order_status->order_id = $order->id;
            $order_status->status = "Payment not done";
            $order_status->save();

            $message['successMsg'] = 'order  successfully added';
            $message['order_id'] = $order->id;
            return response()->json($message);
        }
    }
    public function confirmPayment(Request $request)
    {
        $check = market_orders::where('id', $request->order_id)
            ->update(['payment_method' => $request->payment_method, 'status' => 'Ordered']);
        if ($check) {
            market_order_status::where('order_id', $request->order_id)
                ->update([
                    'status' => "Ordered " . date('y-m-d h:i:s'),
                    'message' => 'You Ordered this product in ' . date('y-m-d')
                ]);
            $message['successMsg'] = "Ordered " . date('y-m-d h:i:s');
            $message['order_id'] = $request->order_id;
            return response()->json($message);
        }
    }


    public function myOrders()
    {
        $orders =  market_orders::select(
            'market_orders.id as order_id',
            'market_orders.created_at as date',
            'market_orders.*',
            'market_orders.quantity as ordered_quantity',
            'market_products.*',
        )
            ->leftjoin('market_products', 'market_products.id', '=', 'market_orders.product_id')
            ->where('user_id', $this->auth_id)->paginate(10);
        $orders->makeHidden([
            'created_at', 'updated_at', 'id', 'description',
            'category', 'tags', 'user_id', 'quantity', 'discount_percentage',
            'gst', 'hsn_code',
            'seller_id',
        ]);


        return $orders;
    }
    public function orderCancelAPi($id)
    {

        $order_status = market_order_status::where('order_id', $id)->update(['status' => 'Cancelled']);

        $order = market_orders::where('id', $id)->update(['status' => 'Cancelled']);

        $order_de = market_orders::where('id', $id)->first();
        $quan =  (int)$order_de->quantity;
        $products = market_products::where('id', $order_de->product_id)->first();
        $quanP = (int)$products->quantity + $quan;
        market_products::where('id', $order_de->product_id)->update(['quantity' => $quanP]);

        if ($order_status || $order) {
            return response()->json(['successMsg' => 'order cancelled']);
        }
    }
}
