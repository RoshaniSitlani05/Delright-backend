<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\User;
use App\Models\user_details;
use App\Models\categories;
use App\Models\ProductCategory;
use App\Models\market_products;
use App\Models\market_orders;
use App\Models\PersonalDetails;
use App\Models\Shops;
use App\Models\Banks;
use App\Models\EmergencyDetails;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleDetails;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\VehicleMaster;
use App\Models\UserReviews;

use Kreait\Firebase;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use \Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Laravel\Firebase\ServiceProvider;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = user_details::select('users.*', 'user_details.image', 'user_details.city')
            ->leftjoin('users', 'users.id', '=', 'user_details.user_id')
            ->where('users.role', 2)->orderBy('user_details.id', 'DESC')->take(4)->get();

        $products = products::select('products.*', 'products_images.image')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->orderBy('products.id', 'DESC')->limit(5)->get();

        $cal =  products::select(DB::raw("
        count(products.id) as product,
        (SELECT COUNT(orders.id) from orders) as orders,
        (Select COUNT(users.id) from users where users.role= '1') as user,
        (Select COUNT(users.id) from users where users.role = '2') as seller"))
            ->first();

        $setting = Settings::Where(['id' => 1])->get();
            $cod = $setting[0]->cod;
            $servicecharge = $setting[0]->service_charge;
            $deliveryservicecharge = $setting[0]->delivery_service_charge;
            $coupon_code = $setting[0]->coupon_code;
            $coupon_discount = $setting[0]->coupon_discount;


        return view('users.dashboard')
            ->with('users', $users)
            ->with('products', $products)
            ->with('cod', $cod)
            ->with('servicecharge', $servicecharge)
            ->with('deliveryservicecharge', $deliveryservicecharge)
            ->with('coupon_code', $coupon_code)
            ->with('coupon_discount', $coupon_discount)
            ->with('calc', $cal);
    }
    public function users()
    {
        $users = user_details::select(
            'users.*',
            'user_details.image',
            'user_details.house_address',
            'user_details.street',
            'user_details.city'
        )
            ->leftjoin('users', 'users.id', '=', 'user_details.user_id')
            ->where('users.role', 1)->orderBy('user_details.id', 'DESC')->get();
        return view('users.users')
            ->with('users', $users);
    }

    // public function users()
    // {
    //     $users = User::select(
    //         '*'
    //     )
    //         ->where('users.role', 1)->orderBy('id', 'DESC')->get();
    //     return view('users.users')
    //         ->with('users', $users);
    // }

    public function sellerusers()
    {
        $users = user_details::select(
            'users.*',
            'user_details.image',
            'user_details.house_address',
            'user_details.street',
            'user_details.city'
        )
            ->leftjoin('users', 'users.id', '=', 'user_details.user_id')
            ->where('users.role', 2)->orderBy('user_details.id', 'DESC')->get();
        return view('users.users')
            ->with('users', $users);
    }

    public function user($id)
    {
        $users = User::select(
            'users.*',
            'user_details.image',
            'user_details.house_address',
            'user_details.street',
            'user_details.city'
        )
            ->leftjoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('users.id', $id)->first();

        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReferenceD = $firestore->collection('orders')->where('destination_info.user_id', '=', $id)->where('order_info.order_status', '=', 'DELIVERED');

        $ordersD = $collectionReferenceD->documents();

        $collectionReferenceP = $firestore->collection('orders')->where('destination_info.user_id', '=', $id)->where('order_info.order_status', '=', 'PLACED');

        $ordersP = $collectionReferenceP->documents();

        $collectionReferenceC = $firestore->collection('orders')->where('destination_info.user_id', '=', $id)->where('order_info.order_status', '=', 'CANCELLED');

        $ordersC = $collectionReferenceC->documents();

        $collectionReferenceA = $firestore->collection('orders')->where('destination_info.user_id', '=', $id)->where('order_info.order_status', '=', 'ACCEPTED');

        $ordersA = $collectionReferenceA->documents();

        return view('users.user')
            ->with('users', $users)
            ->with('ordersP', $ordersP)
            ->with('ordersA', $ordersA)
            ->with('ordersC', $ordersC)
            ->with('ordersD', $ordersD);
        return view('users.orders')->with('orders', $documentReference);
        

        // $orders = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
        //     ->leftjoin('products', 'products.id', '=', 'orders.product_id')
        //     ->where('user_id', $id)
        //     ->where('status', 'Delivered')
        //     ->get();
        // $ordersS = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
        //     ->leftjoin('products', 'products.id', '=', 'orders.product_id')
        //     ->where('user_id', $id)
        //     ->where('status', 'Ordered')
        //     ->orWhere('status', 'Shipped')
        //     ->get();
        // $ordersR = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
        //     ->leftjoin('products', 'products.id', '=', 'orders.product_id')
        //     ->where('user_id', $id)
        //     ->where('status', 'Return')
        //     ->get();
    }
    
    public function sellers()
    {
        $users = User::select('users.*', 'vendor_details.image', 'vendor_details.type', 'vendor_details.fssai_license_no', 'vendor_details.fssai_license_doc')
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->where('role', 2)->orderBy('users.id', 'DESC')->get();
        return view('users.sellers')
            ->with('users', $users);
    }
    
    public function marketProductsOrders()
    {
        $products = market_orders::select('market_orders.*','market_orders.id as order_id','market_orders.status as order_status','users.name as buyer_name','market_products.name as product_name','vendor_details.shop_address')
                    ->leftjoin('market_products', 'market_products.id', '=', 'market_orders.product_id')
                    ->leftjoin('vendor_details', 'vendor_details.id', '=', 'market_orders.user_id')
                    ->leftjoin('users', 'users.id', '=', 'market_orders.user_id')
                    ->orderBy('id', 'DESC')->paginate(10);
        
        return view('users.market_product_orders')
            ->with('products', $products);
            
        // $users = User::select('users.*', 'vendor_details.image', 'vendor_details.type', 'vendor_details.fssai_license_no', 'vendor_details.fssai_license_doc')
        //     ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
        //     ->where('role', 2)->orderBy('users.id', 'DESC')->get();
        return view('users.market_product_orders')
            ->with('users', $users);
    }

    public function orders()
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('orders')->where('order_info.order_type', '!=', 'SELLER_TO_USER_DELIVERY');

        $documentReference = $collectionReference->documents();

        return view('users.orders')->with('orders', $documentReference);

        // $documentReference = $collectionReference->documents()->where('order_info.order_type', '==', 'PICKUP_DROP_SERVICE');
        $data = [];
        foreach ($documentReference as $key => $document) {
            if ($document->exists()) {
                $data[$key] = $document->data();
                       
                // $data = $documentReference->->getReference('chat/detail/'. $id_pesan);

                // return $data;
            } else {
                printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
            }
            // $iii++;
        }
        return $data;
        // $users = [];
        return $documentReference;
        return view('users.delivery_partner')->with('users', $documentReference);
    }

    public function getAllOrders()
    {
        // $users = User::select('users.*', 'vendor_details.*')
        //     ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
        //     ->where('users.id', $id)->get();

        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);

        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReferenceD = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'DELIVERED');

        $ordersD = $collectionReferenceD->documents();

        $collectionReferenceP = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'PLACED');

        $ordersP = $collectionReferenceP->documents();

        $collectionReferenceC = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'CANCELLED');

        $ordersC = $collectionReferenceC->documents();

        $collectionReferenceA = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'ACCEPTED');

        $ordersA = $collectionReferenceA->documents();

        return view('users.allorders')
            ->with('ordersP', $ordersP)
            ->with('ordersA', $ordersA)
            ->with('ordersC', $ordersC)
            ->with('ordersD', $ordersD);
    }
    
    public function getOrders($id)
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);
        
        if($id == 1){
            $header = 'Placed';
            $collectionReferenceP = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'PLACED');

            $orders = $collectionReferenceP->documents();    
        }
        
        if($id == 2){
            $header = 'Ongoing';
            $collectionReferenceA = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'ACCEPTED');

            $orders = $collectionReferenceA->documents();
    
        }
        
        if($id == 3){
            $header = 'CANCELLED';
            $collectionReferenceC = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'CANCELLED');

            $orders = $collectionReferenceC->documents();
        }
        
        if($id == 4){
            $header = 'DELIVERED';
            $collectionReferenceD = $firestore->collection('orders')->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'DELIVERED');
    
            $orders = $collectionReferenceD->documents();
        }
        
        return view('users.all_orders')
            ->with('Orders', $orders)
            ->with('header', $header);
    }

    public function deliveryusers()
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        $firebase = (new Factory)->withServiceAccount($fileJson);

        // $database = $firebase->createDatabase();
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);

        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('users');

        $documentReference = $collectionReference->documents();
        // $users = [];
        return view('users.delivery_partner')->with('users', $documentReference);
        // $iii = 1;
        // foreach ($documentReference as $key => $document) {
        //     if ($document->exists()) {
        //         $users[$iii] = $document->data();
        //     } else {
        //         printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
        //     }
        //     $iii++;
        // }
        // return $users;
                
        // $snapshot = $documentReference->snapshot();

        // if ($snapshot->exists()) {
        //     // printf('Document data:' . PHP_EOL);
        //     print_r($snapshot->data());
        // } else {
        //     printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
        // }
       

    }

    // public function seller($id)
    // {
    //     $users = User::select('users.*', 'vendor_details.*')
    //         ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
    //         ->where('users.id', $id)->first();
    //     $orders = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
    //         ->leftjoin('products', 'products.id', '=', 'orders.product_id')
    //         ->where('orders.seller_id', $id)
    //         ->where('status', 'Delivered')
    //         ->get();
    //     $ordersS = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
    //         ->leftjoin('products', 'products.id', '=', 'orders.product_id')
    //         ->where('orders.seller_id', $id)
    //         ->where('status', 'Ordered')
    //         ->orWhere('status', 'Shipped')
    //         ->get();
    //     $ordersR = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
    //         ->leftjoin('products', 'products.id', '=', 'orders.product_id')
    //         ->where('orders.seller_id', $id)
    //         ->where('status', 'Return')
    //         ->get();
    //     return view('users.seller')
    //         ->with('users', $users)
    //         ->with('orders', $orders)
    //         ->with('orderR', $ordersR)
    //         ->with('ordersS', $ordersS);
    // }
    
       public function seller($id)
    {
        $users = User::select('users.*', 'vendor_details.*')
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->where('users.id', $id)->first();

        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);

        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReferenceD = $firestore->collection('orders')->where('pickup_info.id', '=', $id)->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'DELIVERED');

        $ordersD = $collectionReferenceD->documents();

        $collectionReferenceP = $firestore->collection('orders')->where('pickup_info.id', '=', $id)->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'PLACED');

        $ordersP = $collectionReferenceP->documents();

        $collectionReferenceC = $firestore->collection('orders')->where('pickup_info.id', '=', $id)->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'CANCELLED');

        $ordersC = $collectionReferenceC->documents();

        $collectionReferenceA = $firestore->collection('orders')->where('pickup_info.id', '=', $id)->where('order_info.order_type','=','SELLER_TO_USER_DELIVERY')->where('order_info.order_status', '=', 'ACCEPTED');

        $ordersA = $collectionReferenceA->documents();

        return view('users.seller')
            ->with('users', $users)
            ->with('ordersP', $ordersP)
            ->with('ordersA', $ordersA)
            ->with('ordersC', $ordersC)
            ->with('ordersD', $ordersD);
    }
    
    public function vendorReviews($id)
    {
        $reviews = UserReviews::where('vendor_id', $id)->get();

        return view('users.vendorreviews')
            ->with('reviews', $reviews);
    }
    
    public function deliveryPartnerReviews($id)
    {
        $reviews = UserReviews::where('delivery_partner_id', $id)->get();

        return view('users.deliverypartnerreviews')
            ->with('reviews', $reviews);
    }

    public function products()
    {
        $users = Products::select('products.*', 'users.name as seller_name')
            ->leftjoin('users', 'users.id', '=', 'products.seller_id')
            ->orderBy('id', 'DESC')->paginate();
        return view('users.products')
            ->with('products', $users);
    }
    public function product($id)
    {
        $products = products::select('products.*', 'products_images.*')
            ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
            ->orderBy('products.id', 'DESC')->where('products.id', $id)->first();
        $orders = orders::select(
            'orders.id as order_id',
            'users.name as user_name',
            'products.seller_id',
            'orders.quantity as qua',
            'orders.status',
            'orders.price as amount',
            DB::raw("(SELECT users.name as seller_name from users where orders.seller_id = users.id) as seller_name")
        )
            ->leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.product_id', $id)
            ->where('status', 'Delivered')
            ->get();
        $ordersS = orders::select(
            'orders.id as order_id',
            'users.name as user_name',
            'products.seller_id',
            'orders.quantity as qua',
            'orders.status',
            'orders.price as amount',
            DB::raw("(SELECT users.name as seller_name from users where orders.seller_id = users.id) as seller_name")
        )
            ->leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.product_id', $id)
            ->where('status', 'Ordered')
            ->orWhere('status', 'Shipped')
            ->get();
        $ordersR = orders::select(
            'orders.id as order_id',
            'users.name as user_name',
            'products.seller_id',
            'orders.quantity as qua',
            'orders.status',
            'orders.price as amount',
            DB::raw("(SELECT users.name as seller_name from users where orders.seller_id = users.id) as seller_name")
        )
            ->leftjoin('users', 'users.id', '=', 'orders.user_id')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.product_id', $id)
            ->where('status', 'Return')
            ->get();
        return view('users.product')
            ->with('products', $products)
            ->with('orders', $orders)
            ->with('orderR', $ordersR)
            ->with('ordersS', $ordersS);
    }
    public function order($id)
    {
        $order = orders::where('id', $id)->first();
        return $order;
    }



    public function DeleteSeller($id)
    {
        $seller = User::find($id);
        $seller->delete();
    }
    public function DeleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back();
    }


    public function addCategory()
    {
        $category = DB::table('categories')->paginate(3);
        return view('users.addCategory')->with('category', $category);
    }

    public function updateProductCategoryStatus($id,$status)
    {
        $product = ProductCategory::findOrFail($id);
        if($status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }

    public function addProductCategory()
    {
        $category = categories::get();

        $productCategory = ProductCategory::select('product_category.*','product_category.name as product_cate_name','product_category.id as product_cate_id','categories.*')
                        ->leftjoin('categories', 'categories.id', '=', 'product_category.category')
                        ->paginate(10);

        return view('users.addProductCategory')->with('productCategory', $productCategory)->with('category', $category);
    }

    public function addSlider()
    {
         $sliders = Sliders::select(DB::raw(
            "sliders.*"

        ))
            ->paginate(3);
            
        $category =  categories::all();
        return view('users.addSlider')->with('sliders', $sliders)->with('category', $category);
    }

    public function getCategory($id)
    {
        $category =  categories::where(['id' => $id])->get();
        return view('users.editCategory')->with('category', $category);
    }

    public function getProductCategory($id)
    {
        $category =  ProductCategory::select('product_category.*','categories.name as cate_name')
                    ->leftjoin('categories', 'categories.id', '=', 'product_category.category')
                    ->where(['product_category.id' => $id])->get();
        return view('users.editProductCategory')->with('category', $category);
    }

    public function updateProductCategory(Request $request)
    {
        $category = ProductCategory::findOrFail($request->id);
        $category->name = $request->name;
        $category->service_charge = $request->service_charge;
        $category->save();
        \Session::flash('flash_message', 'Image Updated Succesfully');
        
        return redirect('addProductCategory');
    }

    public function updateCategory(Request $request)
    {
        $category = categories::findOrFail($request->id);
        if($request->image != ''){
            $image = $request->image->store('public/category');
        $category->image = $image;    
        }
        
        $category->service_charge = $request->service_charge;
        $category->save();
        \Session::flash('flash_message', 'Image Updated Succesfully');
        
        return redirect('addCategory');


    }

    public function insertCategory(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'name'=>'required|unique:categories',
            'image'=>'required|mimes:jpg,jpeg,png|max:1000',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $category = new  categories();
        $category->name = $request->name;
        $image = $request->image->store('public/category');
        $category->image = $image;
        $category->save();
        \Session::flash('flash_message', 'Category Added Succesfully');
        return redirect()->back();
    }

    public function insertProductCategory(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'shop_category'=>'required',
            'name'=>'required|unique:product_category',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $category = new  ProductCategory();
        $category->category = $request->shop_category;
        $category->name = $request->name;
        $category->service_charge = $request->service_charge;
        $category->save();
        \Session::flash('flash_message', 'Category Added Succesfully');
        return redirect()->back();
    }


    public function insertSlider(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'shop_category'=>'required',
            'slider_image'=>'required|mimes:jpg,jpeg,png|max:1000',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $slider = new  Sliders();
        $slider->shop_category = $request->shop_category;
        $slider_image = $request->slider_image->store('public/sliders');
        $slider->slider_image = $slider_image;
        $slider->save();
        \Session::flash('flash_message', 'Slider Added Succesfully');
        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        categories::find($id)->delete();
        return redirect()->back();
    }

    public function deleteProductCategory($id)
    {
        ProductCategory::find($id)->delete();
        return redirect()->back();
    }

    public function deleteSlider($id)
    {
        Sliders::find($id)->delete();
        return redirect()->back();
    }


    public function addProduct()
    {
        $category = categories::get();
        $products = products::orderBy('id', 'DESC')->get()->take(15);
        return view('users.addProduct')
            ->with('products', $products)
            ->with('category', $category);
    }

    public function addMarketProduct()
    {
        $category = categories::get();
        $products = market_products::orderBy('id', 'DESC')->get()->take(15);
        return view('users.addMarketProduct')
            ->with('products', $products)
            ->with('category', $category);
    }
    
    public function getMarketProduct($id)
    {
        $category = categories::get();
        $products =  market_products::select('market_products.*','categories.name as category_name')
                    ->leftjoin('categories', 'categories.id', '=', 'market_products.category')
                    ->where(['market_products.id' => $id])->first();
        return view('users.editMarketProduct')->with('products', $products)->with('category', $category);
    }

    public function insertMarketProduct(Request $request)
    {
        
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'name'=>'required|unique:categories',
            'price'=>'required',
            'discount_percentage'=>'required',
            'hsn_code'=>'required',
            'category'=>'required',
            'quantity'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:1000',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $product = new market_products;
        $product->seller_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percentage = $request->discount_percentage;
        $product->gst = $request->gst;
        $product->hsn_code = $request->hsn_code;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $image = $request->image->store('public/marketProducts');
        $product->image = $image;
        $product->save();
        return redirect()->back();
    }

    public function insertProduct(Request $request)
    {
        $product = new products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percentage = $request->discount_percentage;
        $product->gst = $request->gst;
        $product->hsn_code = $request->hsn_code;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $image = $request->image->store('public/products_images');
        $product->image = $image;
        $product->save();
        return redirect()->back();
    }

    public function Marketproducts()
    {
        $products = market_products::orderBy('id', 'DESC')->paginate(15);
        return view('users.market_products')
            ->with('products', $products);
    }

    public function deleteMarketProduct($id)
    {
        return view('users.addCategory');
    }

    public function vendorkycData($id)
    {
        $user =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->get();
        $shopdetails =  Shops::where(['user_id' => $id, 'status' => 1])->get();
        $bank =  Banks::where(['user_id' => $id, 'status' => 1])->get();
        $contactdetails =  EmergencyDetails::where(['user_id' => $id, 'status' => 1])->get();
        $documents =  Documents::where(['user_id' => $id, 'status' => 1])->get();
        $userData =  User::where(['id' => $id])->get();

        return view('users.vendor_kyc')
                    ->with('user', $user)
                    ->with('shopdetails', $shopdetails)
                    ->with('bank', $bank)
                    ->with('contactdetails', $contactdetails)
                    ->with('userData', $userData)
                    ->with('documents', $documents);
    }

    public function delPartnerKYCData($id)
    {
        $user =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->get();
        $bank =  Banks::where(['user_id' => $id, 'status' => 1])->get();
        $contactdetails =  EmergencyDetails::where(['user_id' => $id, 'status' => 1])->get();
        $documents =  Documents::where(['user_id' => $id, 'status' => 1])->get();
        $vehiclesdetails =  VehicleDetails::where(['user_id' => $id, 'status' => 1])->get();

        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('users');

        $documentReference = $collectionReference->document($id);
        
        $snapshot = $documentReference->snapshot();
        $userData = $snapshot->data();
        
        return view('users.delivery_partner_kyc')
                    ->with('user', $user)
                    ->with('vehiclesdetails', $vehiclesdetails)
                    ->with('bank', $bank)
                    ->with('contactdetails', $contactdetails)
                    ->with('userData', $userData)
                    ->with('documents', $documents);
    }

    public function verifyKYCSellerDetails($id)
    {
        $user = User::where('id', $id)->update(['verified' => 1]);

        \Session::flash('flash_message', 'User verified Succesfully');
        
        return redirect()->back();
    }

        public function verifyKYCDeliveryDetails($id)
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('users');

        $documentReference = $collectionReference->document($id);
        
        $snapshot = $documentReference->snapshot();
        $orderData = $snapshot->data();
        
        $vehiclesdetails =  VehicleDetails::where(['user_id' => $id, 'status' => 1])->first();
        
        $vehicle_type = $vehiclesdetails->vehicle_type;

        $documentReference = $collectionReference->document($id)->update([['path' => 'user_kyc_verified','value' => 1]]);

        $documentReference = $collectionReference->document($id)->update([['path' => 'user_vehicle_type','value' => $vehicle_type]]);
        
        \Session::flash('flash_message', 'User verified Succesfully');
        return redirect()->back();   
    }


    public function addCOD(Request $request)
    {
         // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $update = Settings::where('id', 1);

        if($request->cod == 'on'){
            $update->update(['cod' => 1]);
        }else{
            $update->update(['cod' => 0]);
        }
        
             return redirect()->back();   
    }
    
    public function addServiceCharge(Request $request)
    {
         // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $update = Settings::where('id', 1);

        $update->update(['service_charge' => $request->service_charge]);
        
        return redirect()->back();   
    }
    
    public function addDeliveryServiceCharge(Request $request)
    {
         // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $update = Settings::where('id', 1);

        $update->update(['delivery_service_charge' => $request->delivery_service_charge]);
        
        return redirect()->back();   
    }
    
    public function addCouponCode(Request $request)
    {
         // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $update = Settings::where('id', 1);

        $update->update(['coupon_code' => $request->coupon_code]);
        $update->update(['coupon_discount' => $request->coupon_discount]);
        
        return redirect()->back();   
    }
    
    
    public function updateUserStatus($id,$status)
    {
        $user = User::findOrFail($id);
        if($status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }

    public function updateMarketProductStatus($id,$status)
    {
        $product = market_products::findOrFail($id);
        if($status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }
    
    public function updateShopCategoryStatus($id,$status)
    {
        $product = categories::findOrFail($id);
        if($status == 1){
            $product->consumable = 0;
        }else{
            $product->consumable = 1;
        }
        $product->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }

    
    public function updatePartnerStatus($id,$status)
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        // $firebase = (new Factory)
        // ->withServiceAccount($serviceAccount);
        $firebase = (new Factory)->withServiceAccount($fileJson);
        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('users');
        if($status == 1){
            $documentReference = $collectionReference->document($id)->update([['path' => 'user_block_status','value' => 0]]);
        }else{
            $documentReference = $collectionReference->document($id)->update([['path' => 'user_block_status','value' => 1]]);
        }
        
        \Session::flash('flash_message', 'Status Updated Succesfully');
        return redirect()->back();   
    }
    
    public function addVehicle()
    {
        $vehicle = VehicleMaster::all();
        
        return view('users.addVehicle')->with('vehicle', $vehicle);
    }
    
    public function getVehicle($id)
    {
        $vehicle =  VehicleMaster::where(['id' => $id])->get();
        return view('users.editVehicle')->with('vehicle', $vehicle);
    }
    
    
    public function updateVehicle(Request $request)
    {
        $vehicle = VehicleMaster::findOrFail($request->id);
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_price = $request->vehicle_price;
        if ($request->has('vehicle_image')) {
            $vehicle_image = $request->vehicle_image->store('public/vehicle_images');
            $vehicle->vehicle_image = $vehicle_image;
        }
        
        $vehicle->save();
        \Session::flash('flash_message', 'Vehicle Updated Succesfully');
        
        return redirect('addVehicle');


    }
    
    public function updateMarketProduct(Request $request)
    {
        $product = market_products::findOrFail($request->id);
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percentage = $request->discount_percentage;
        $product->gst = $request->gst;
        $product->hsn_code = $request->hsn_code;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        
        if ($request->has('image')) {
            $image = $request->image->store('public/marketProducts');
            $product->image = $image;
        }
        
        $product->save();
        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect('getAllMarketProducts');
        
    }
    
    
    public function insertVehicle(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'vehicle_name'=>'required|unique:vehicle_masters',
            'vehicle_image'=>'required|mimes:jpg,jpeg,png|max:1000',
            'vehicle_price'=>'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $vehicle = new  VehicleMaster();
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_price = $request->vehicle_price;
        $vehicle_image = $request->vehicle_image->store('public/vehicle_images');
        $vehicle->vehicle_image = $vehicle_image;
        $vehicle->save();
        \Session::flash('flash_message', 'Vehicle Added Succesfully');
        return redirect()->back();
    }


    public function deleteVehicle($id,$status)
    {
        $vehicle = VehicleMaster::findOrFail($id);
        if($status == 1){
            $vehicle->status = 0;
        }else{
            $vehicle->status = 1;
        }
        $vehicle->save();
        
        if($status == 1){
            $usersVehicleData =  VehicleDetails::where(['vehicle_type' => $id])->get();
            $users = [];
            
            $fileJson =  base_path("delright-dbc86-firebase.json");
            // $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
            // $firebase = (new Factory)
            // ->withServiceAccount($serviceAccount);
            $firebase = (new Factory)->withServiceAccount($fileJson);
            $firestore = new FirestoreClient([
                'projectId' => 'delright-dbc86',
            ]);

            $collectionReference = $firestore->collection('users');
            $documentReference = $collectionReference->document('+918317400953');
            
            $snapshot = $documentReference->snapshot();
            $userData = $snapshot->data();
            
            foreach ($usersVehicleData as $data){
                $userId = $data['user_id'];
                $documentReference = $collectionReference->document($userId)->update([['path' => 'user_kyc_verified','value' => 0]]);
                $documentReference = $collectionReference->document($userId)->update([['path' => 'user_vehicle_type','value' => null]]);
                VehicleDetails::where('user_id', $userId)->update(['vehicle_type' => null]);
            }
        }        

        return redirect()->back();
    }

}
