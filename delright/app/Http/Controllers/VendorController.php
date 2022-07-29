<?php

namespace App\Http\Controllers;

use App\Models\order_status;
use App\Models\orders;
use App\Models\User;
use App\Models\vendor_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }


    public function vendorDetails($id)
    {
        $vendorDetails = vendor_details::where('category', $id)->get();
        $vendorDetails->makeHidden(['created_at', 'updated_at']);
        return response()->json(['totalCount' => strval(count($vendorDetails)), 'details' => $vendorDetails]);
    }


    public function addDetails(Request $request)
    {
        $vendor = new vendor_details;
        $vendor->id = auth('api')->user()->id;
        $vendor->shop_name = $request->shop_name;
        $vendor->phone_number = $request->phone_number;
        $vendor->personal_id = $request->personal_id;
        $vendor->shop_address = $request->shop_address;
        $vendor->type = $request->type;
        $vendor->category = $request->category;
        $vendor->longitude = $request->longitude;
        $vendor->latitude = $request->latitude;

        $vendor->street = $request->street;
        $vendor->locality = $request->locality;
        $vendor->district = $request->district;
        $vendor->postalCode = $request->postalCode;
        $vendor->state = $request->state;
        $vendor->country = $request->country;
        $vendor->ISOCountryCode = $request->ISOCountryCode;
        if ($request->has('image')) {
            $image = $request->image->store('public/vendor_profile');
            $vendor->image = $image;
        }

        $check = $vendor->save();
        if ($check) {
            return response()->json(['successMsg' => 'Detials  successfully added']);
        }
    }
    public function getDetails()
    {
        $vendor = User::select('users.name', 'users.email', 'users.fcm_token', 'vendor_details.*')
            ->where('users.id', auth('api')->user()->id)
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->first();
        $vendor->makeHidden(['created_at', 'updated_at']);
        return response()->json(['details' => $vendor]);
    }
    public function getVendorDetails($id)
    {
        $vendor = User::select('users.name', 'users.email', 'users.fcm_token', 'vendor_details.*')
            ->where('users.id', $id)
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->first();
        $vendor->makeHidden(['created_at', 'updated_at']);
        return response()->json(['details' => $vendor]);
    }

    public function updateDetails(Request $request)
    {
        $update = vendor_details::where('id', $request->id);
        if ($request->has('shop_name')) {
            $update->update(['shop_name' => $request->shop_name]);
        }
        if ($request->has('phone_number')) {
            $update->update(['phone_number' => $request->phone_number]);
        }
        if ($request->has('type')) {
            $update->update(['type' => $request->type]);
        }
        if ($request->has('shop_address')) {
            $update->update(['shop_address' => $request->shop_address]);
        }
        if ($request->has('category')) {
            $update->update(['category' => $request->category]);
        }
        if ($request->has('longitude')) {
            $update->update(['longitude' => $request->longitude]);
        }
        if ($request->has('latitude')) {
            $update->update(['latitude' => $request->latitude]);
        }


        if ($request->has('street')) {
            $update->update(['street' => $request->street]);
        }
        if ($request->has('locality')) {
            $update->update(['locality' => $request->locality]);
        }
        if ($request->has('district')) {
            $update->update(['district' => $request->district]);
        }
        if ($request->has('postalCode')) {
            $update->update(['postalCode' => $request->postalCode]);
        }
        if ($request->has('country')) {
            $update->update(['country' => $request->country]);
        }
        if ($request->has('ISOCountryCode')) {
            $update->update(['ISOCountryCode' => $request->ISOCountryCode]);
        }
        if ($request->has('state')) {
            $update->update(['state' => $request->state]);
        }


        if ($request->has('personal_id')) {
            $update->update(['personal_id' => $request->personal_id]);
        }
        if ($request->has('image')) {
            $image = $request->image->store('public/vendor_profile');
            $update->update(['image' => $image]);
        }
        return response()->json(['successMsg' => 'Detials  successfully updated']);
    }

    public function getMyOrders()
    {

        $products = orders::select(DB::raw(
            "orders.id as order_id,
            orders.status,
            products.*,
        products.created_at as posted_date,
        products_images.*,
        categories.name as category_name,
        users.name as user_name,
        round(products.price-((discount_percentage/100)*products.price),2) as discount_price"

        ))
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.seller_id', $this->auth_id)
            ->paginate(10);
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return $products;
    }

    //Dash Board
    public function dashboard()
    {
        $dashbord = orders::select(DB::raw("
      SUM(price)  as total_earnings,
      count(quantity) as total_orders,
      sum(quantity)  as total_sold"))
            ->where('status', '!=', 'Address not confirmed')

            ->where('orders.seller_id', $this->auth_id)
            ->first();
        return $dashbord;
    }
    public function allOrders()
    {
        $orders = orders::select(DB::raw(
            "products.id as product_id,
            products.name,
            (SELECT sum(price) from orders where orders.product_id = products.id) as total_price,
            (SELECT sum(quantity) from orders where orders.product_id = products.id) as total_quatity
            ,orders.status"
        ))
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $this->auth_id)
            ->distinct('product_id')
            ->paginate(10);
        return $orders;
    }
    public function allSuccessOrders()
    {
        $orders = orders::select(DB::raw(
            "products.id as product_id,
            products.name,
            (SELECT sum(price) from orders where orders.product_id = products.id) as total_price,
            (SELECT sum(quantity) from orders where orders.product_id = products.id) as total_quatity
            ,orders.status"
        ))
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $this->auth_id)
            ->distinct('product_id')
            ->where('status', 'Delivered')
            // ->Orwhere('status','Ordered')
            ->paginate(10);
        return $orders;
    }
    public function allPendingOrders()
    {
        $orders = orders::select(DB::raw(
            "products.id as product_id,
            products.name,
            (SELECT sum(price) from orders where orders.product_id = products.id) as total_price,
            (SELECT sum(quantity) from orders where orders.product_id = products.id) as total_quatity
            ,orders.status"
        ))
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $this->auth_id)
            ->distinct('product_id')
            //->where('status','=','Address not confirmed')
            ->where('status', '=', 'Payment not done')
            ->paginate(10);
        return $orders;
    }
    public function allCancelledOrders()
    {
        $orders = orders::select(DB::raw(
            "products.id as product_id,
            products.name,
            (SELECT sum(price) from orders where orders.product_id = products.id) as total_price,
            (SELECT sum(quantity) from orders where orders.product_id = products.id) as total_quatity
            ,orders.status"
        ))
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $this->auth_id)
            ->distinct('product_id')
            ->where('status', '=', 'Cancelled')
            ->paginate(10);
        return $orders;
    }
}


  //   where('user_id',$this->auth_id)
        //   ->where('product_id',$request->product_id)
        //   ->where('status','Delivered')