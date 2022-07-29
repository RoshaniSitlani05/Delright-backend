<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\ratings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }
    public function displayAllProducts()
    {
        $products = products::select(DB::raw(
            "products.*,
        products.created_at as posted_date,
        products_images.*,
        categories.name as category_name,
        users.name as seller_name,
        round(price-((discount_percentage/100)*price),2) as discount_price,
        (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
        "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->paginate(10);
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return $products;
    }

    public function displaySinlgeProduct($id)
    {
        $products = products::select(DB::raw(
            "products.*,
    products.created_at as posted_date,
    products_images.*,
    categories.name as category_name,
    users.name as seller_name,
    (select round(price-((discount_percentage/100)*price),2) as discount_percentage from products where products.id=$id) as discount_price,
    (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
    "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('products.id', $id)
            ->first();
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return response()->json(['details' => $products]);
    }

    public function getRatings($id)
    {
        $my_id = $this->auth_id;
        $ratings = ratings::select(
            DB::raw("
        users.name,
        users.id as user_id,
        user_details.image as user_image
        ,ratings.*,(SELECT CASE WHEN 
         ratings.user_id=$my_id THEN 1
         ELSE 0
         END)
         as my_rating")
        )
            ->leftjoin('users', 'users.id', '=', 'ratings.user_id')
            ->leftjoin('user_details', 'user_details.user_id', '=', 'ratings.user_id')
            ->where('product_id', $id)->paginate(5);
        $ratings->makeHidden(['updated_at', 'id']);
        return $ratings;
    }

    public function search(Request $request)
    {
        $products = products::select(DB::raw(
            "products.*,
        products.created_at as posted_date,
        products_images.*,
        categories.name as category_name,
        users.name as seller_name,
        round(price-((discount_percentage/100)*price),2) as discount_price,
        (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
        "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('products.name', 'like', '%' . $request->search . '%')
            ->paginate(10);
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return $products;
    }
    public function filter(Request $request)
    {
        $products = products::query();

        $products->select(DB::raw(
            "products.*,
        products.created_at as posted_date,
        products_images.*,
        categories.name as category_name,
        users.name as seller_name,
        round(price-((discount_percentage/100)*price),2) as discount_price,
        (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
        "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id');
        if ($request->price_start != '' && $request->price_end != '') {
            $products->whereBetween('price', [$request->price_start, $request->price_end]);
        }
        if ($request->discount_start != '' && $request->discount_end != '') {
            $products->whereBetween('discount_percentage', [$request->discount_start, $request->discount_end]);
        }
        $ans = $products->paginate(10);
        return $ans;
    }

    public function similerProducts($id)
    {
        $product_info = products::where('id', $id)->first();
        $products = products::query();

        $products->select(DB::raw(
            "products.*,
         products.created_at as posted_date,
         products_images.*,
         categories.name as category_name,
         users.name as seller_name,
         round(price-((discount_percentage/100)*price),2) as discount_price,
         (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
         (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
         (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
         "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('category', $product_info->category)
            ->Orwhere('products.name', 'like', '%' . $product_info->name . '%')
            ->Orwhere('products.tags', 'like', '%' . $product_info->tags . '%');
        $ans = $products->paginate(10);
        return $ans;
    }
    public function productsByCategory($id)
    {
        $products = products::select(DB::raw(
            "products.*,
        products.created_at as posted_date,
        products_images.*,
        categories.name as category_name,
        users.name as seller_name,
        round(price-((discount_percentage/100)*price),2) as discount_price,
        (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
        "

        ))
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->leftjoin('categories', 'categories.id', '=', 'products.category')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->where('products.category', '=', $id)
            ->paginate(10);
        $products->makeHidden(['created_at', 'updated_at', 'id']);
        return $products;
    }

    public function productsBycategoryShop($cateid, $shopid)
    {
        $shopDetails = User::select('users.name', 'vendor_details.*')
            ->where('users.id', $shopid)
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->first();
        $productsCate = DB::table('product_category')->where('category', $shopDetails->category)->get();
        foreach ($productsCate as $pc) {
            $products = products::select(DB::raw(
                "products.*,
        products.created_at as posted_date,
        products_images.*,
        product_category.name as category_name,
        users.name as seller_name,
        round(price-((discount_percentage/100)*price),2) as discount_price,
        (SELECT COUNT(carts.id) from carts where product_id=products.id and user_id=$this->auth_id) as cart,
        (SELECT COUNT(favourites.id) from favourites where product_id=products.id and user_id=$this->auth_id) as favourites,
        (SELECT AVG(rating) from ratings where ratings.product_id=products.id) as rating
        "

            ))
                ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
                ->leftjoin('product_category', 'product_category.id', '=', 'products.category')
                ->leftjoin('users', 'users.id', '=', 'products.seller_id')
                ->where('products.category', '=', $pc->id)
                ->where('products.seller_id', '=', $shopid)
                ->get();
            $products->makeHidden(['created_at', 'updated_at', 'id']);
            $details[] = [
                $pc->name =>  $products
            ];
        }
        //$details = (object) $details;
        $details = json_decode(json_encode($details));

        return response()->json(['shop_details' => $shopDetails, 'products' => $details]);

        return $products;
    }
}
//select concat(round((((price-discount_percentage) / price) * 100 ),2), '%') as persentage from products
