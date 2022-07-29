<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\order_status;
use App\Models\orders;
use App\Models\products;
use App\Models\products_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OrderStatus;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }
    public function orderProduct(Request $request)
    {
        $product_info = products::where('id', $request->product_id)->first();
        $order = new orders();
        $order->product_id = $request->product_id;
        $order->user_id = $this->auth_id;
        $order->seller_id = $product_info->seller_id;
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->status = "Address not confirmed";
        $check = $order->save();
        if ($check) {
            // $qun  = $product_info->quantity-$request->quantity;
            // $product_info->update(['quantity'=>$qun]);
            $order_status = new order_status();
            $order_status->order_id = $order->id;
            $order_status->status = "Address not confirmed";
            $order_status->save();

            $message['successMsg'] = 'order  successfully added';
            $message['order_id'] = $order->id;
            return response()->json($message);
        }
    }
    public function Addaddress(Request $request)
    {
        $address = new address();
        $address->user_id = $this->auth_id;
        $address->name = $request->name;
        $address->type = $request->type;
        $address->house = $request->house;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->phone_number = $request->phone_number;
        $address->longitude = $request->longitude;
        $address->latitude = $request->latitude;
        $address->pincode = $request->pincode;
        $check = $address->save();
        if ($check) {
            $message['successMsg'] = 'address successfully added';
            $message['order_id'] = $request->order_id;
            $message['address_id'] = $address->id;
            return response()->json($message);
            //return response()->json(['successMsg' => 'address successfully added']);
        }
    }
    public function exsitingAddress()
    {
        $address = address::select('address.id as address_id', 'address.*')
            ->where('user_id', $this->auth_id)->get();
        $address->makeHidden(['id', 'created_at', 'updated_at']);
        return response()->json(['totalCount' => strval(count($address)), 'details' => $address]);
    }
    public function confirmAddress(Request $request)
    {
        $check = orders::where('id', $request->order_id)
            ->update(['address' => $request->address_id, 'status' => 'Payment not Done']);
        if ($check) {
            order_status::where('order_id', $request->order_id)
                ->update(['status' => 'Payment not Done']);

            $message['successMsg'] = 'address successfully added';
            $message['order_id'] = $request->order_id;
            return response()->json($message);
        }
    }
    public function confirmPayment(Request $request)
    {
        $check = orders::where('id', $request->order_id)
            ->update(['payment_method' => $request->payment_method, 'status' => 'Ordered']);
        if ($check) {
            order_status::where('order_id', $request->order_id)
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
        $orders =  orders::select(
            'orders.id as order_id',
            'orders.created_at as date',
            'orders.*',
            'orders.quantity as ordered_quantity',
            'users.name as seller_name',
            'products.*',
            DB::raw('(select round(price-((discount_percentage/100)*price),2) from products where products.id=orders.product_id) as discount_price'),
            'products_images.image',
        )
            ->leftjoin('users', 'users.id', '=', 'orders.seller_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->where('user_id', $this->auth_id)->paginate(10);
        $orders->makeHidden([
            'created_at', 'updated_at', 'id', 'description',
            'category', 'tags', 'user_id', 'quantity'
        ]);


        return $orders;
    }
    public function myOrderInfo($id)
    {
        $orders =  orders::select(
            'orders.id as order_id',
            'orders.*',
            'users.name as seller_name',
            'products.*',
            'products_images.image',
        )
            ->leftjoin('users', 'users.id', '=', 'orders.seller_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->leftjoin('products_images', 'products_images.id', '=', 'products.id')
            ->where('user_id', $this->auth_id)
            ->where('orders.id', $id)
            ->first(10);
        $orders->makeHidden([
            'created_at', 'updated_at', 'id', 'description',
            'category', 'tags', 'user_id'
        ]);
        return response()->json(['details' => $orders]);
        // $products  = products::where('id', $orders->product_id)->first();
        // $products_images  = products_images::where('product_id', $orders->product_id)->first();
        // $order_status = order_status::where('order_id', $id)->get();
        // $message['order_details'] = ['order_id' => $orders->id, 'order_status' => $order_status];
        // $message['product_details'] = ['product_info' => $products, 'products_images' => $products_images];
        // return response()->json(['details' => $message]);
    }
    public function orderStatus($id)
    {
        $order_status = order_status::select('order_id', 'status', 'message', 'created_at as date')->where('order_id', $id)->get();
        $order_status->makeHidden([
            'created_at', 'updated_at', 'id', 'order_id'
        ]);
        return response()->json(['details' => $order_status]);
    }


    public function orderStatusUpdateVendor(Request $request)
    {
        $order_status = order_status::where('order_id', $request->order_id)
            ->where('status', 'Shipped')
            ->first();
        $order = orders::where('id', $request->order_id)
            ->where('status', 'Shipped')
            ->first();
        if ($order_status && $request->status == 1) {
            $message = $order_status->message;
            $message = $message . "\n \n" . $request->message . "\n" . date('y-m-d h:i:s');
            $check = order_status::where('id', $order_status->id)->update(['message' => $message]);
        } else {
            $order_status =  new order_status();
            $order_status->order_id = $request->order_id;
            if ($request->status == 1) {
                $order_status->status = 'Shipped';
                $check2 = orders::where('id', $request->order_id)->update(['status' => "Shipped"]);
                $order_status->message = $request->message . "\n" . date('y-m-d h:i:s');
            } else {
                $check2 = orders::where('id', $request->order_id)->update(['status' => "Delivered"]);
                $order_status->status = 'Delivered';
                $order_status->message = 'your item Delivered' . "\n" . date('y-m-d h:i:s');
            }



            $check = $order_status->save();
        }

        if ($check) {
            return response()->json(['successMsg' => 'order status Updated']);
        }
    }



    public function orderCancelAPi($id)
    {

        $order_status = order_status::where('order_id', $id)->update(['status' => 'Cancelled']);
        $order = orders::where('id', $id)->update(['status' => 'Cancelled']);
        $order_de = orders::where('id', $id)->first();
        $quan =  (int)$order_de->quantity;
        $products = products::where('id', $order_de->product_id)->first();
        $quanP = (int)$products->quantity + $quan;
        products::where('id', $order_de->product_id)->update(['quantity' => $quanP]);
        if ($order_status && $order) {
            return response()->json(['successMsg' => 'order cancelled']);
        }
    }
    public function pendingingOrders()
    {
    }
}
