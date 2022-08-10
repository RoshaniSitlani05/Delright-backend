<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\favourites;
use App\Models\orders;
use App\Models\ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }
    public function addToCart(Request $request)
    {
        $cart = new carts();
        $cart->user_id = $this->auth_id;
        $cart->product_id = $request->product_id;
        $result = carts::where('product_id', $request->product_id)
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
        $products = carts::select(
            'products.*',
            'products.created_at as posted_date',
            'products_images.*',
            'categories.name as category_name',
            'users.name as seller_name',
            DB::raw(" (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites"),
            DB::raw('(select round(price-((discount_percentage/100)*price),2) from products where products.id=carts.product_id) as discount_price')

        )
            ->leftjoin('products', 'products.id', '=', 'carts.product_id')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('carts.user_id', $this->auth_id)
            ->get();
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return response()->json(['details' => $products]);
    }
    public function deleteFromCart($id)
    {
        $cart = carts::where('product_id', $id)
            ->where('user_id', $this->auth_id)->first();
        $check = $cart->delete();
        if ($check) {
            return response()->json(['successMsg' => 'Product removed to cart']);
        }
    }
    public function deleteFromCartUser()
    {
        $cart = carts::where('user_id', $this->auth_id)->delete();
        // if ($cart) {
        //     foreach ($cart as $cart) {
        //         $delete = carts::where('id', $cart->id)->delete();
        //     }

        //     if ($delete) {
        //         return response()->json(['successMsg' => 'Product removed to cart']);
        //     } else {
        //         return response()->json(['successMsg' => 'cart is empty']);
        //     }
        // } else {
        //     return response()->json(['successMsg' => 'cart is empty']);
        // }

        return response()->json(['successMsg' => 'Product removed to cart']);
    }

    public function addToFavourites(Request $request)
    {
        $favourites = new favourites();
        $favourites->user_id = $this->auth_id;
        $favourites->product_id = $request->product_id;
        $result = favourites::where('product_id', $request->product_id)
            ->where('user_id', $this->auth_id)->first();
        if ($result) {
            return response()->json(['errorMsg' => 'Product is already in favourites']);
        } else {
            $check = $favourites->save();
            if ($check) {
                return response()->json(['successMsg' => 'Product added to favourites']);
            }
        }
    }
    public function myFavourites()
    {
        $products = favourites::select(
            'products.*',
            'products.created_at as posted_date',
            'products_images.*',
            'categories.name as category_name',
            'users.name as seller_name',
            DB::raw(" (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites"),
            DB::raw('(select round(price-((discount_percentage/100)*price),2) from products where products.id=favourites.product_id) as discount_price')

        )
            ->leftjoin('products', 'products.id', '=', 'favourites.product_id')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('favourites.user_id', $this->auth_id)

            ->paginate(10);
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return $products;
    }
    public function deleteFromFavourites($id)
    {
        $favourites = favourites::where('product_id', $id)
            ->where('user_id', $this->auth_id)->first();
        $check = $favourites->delete();
        if ($check) {
            return response()->json(['successMsg' => 'Product removed to cart']);
        }
    }


    //Ratings
    public function addRating(Request $request)
    {
        $check = orders::where(['user_id' => $this->auth_id, 'product_id' => $request->product_id, 'status' => 'Delivered'])
            ->first();
        if (!$check) {
            return response()->json(['errorMsg' => 'Sorry Only product purchased  user can add rating']);
        }
        $ratings = new ratings();
        $ratings->user_id = $this->auth_id;
        $ratings->product_id = $request->product_id;
        $ratings->rating = $request->rating;
        $ratings->comment = $request->comment;
        $result = ratings::where('product_id', $request->product_id)
            ->where('user_id', $this->auth_id)->first();
        if ($result) {
            return response()->json(['errorMsg' => 'Product is already reated']);
        } else {
            $check = $ratings->save();
            if ($check) {
                return response()->json(['successMsg' => 'Thanks for your rating']);
            }
        }
    }
    public function updateRating(Request $request)
    {
        $ratings = ratings::where('product_id', $request->product_id)
            ->where('user_id', $this->auth_id)->first();
        if ($request->has('rating')) {
            ratings::where('product_id', $request->product_id)
                ->where('user_id', $this->auth_id)->update(['rating' => $request->rating]);
        }
        if ($request->has('comment')) {
            ratings::where('product_id', $request->product_id)
                ->where('user_id', $this->auth_id)->update(['comment' => $request->comment]);
        }
        return response()->json(['successMsg' => 'Rating updated']);
    }

    public function deleteRating($id)
    {
        $ratings = ratings::where('product_id', $id)
            ->where('user_id', $this->auth_id)->first();
        $check = $ratings->delete();
        if ($check) {
            return response()->json(['successMsg' => 'ratings removed']);
        }
    }
}
