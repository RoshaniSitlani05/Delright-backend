<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\User;
use App\Models\user_details;
use App\Models\categories;
use App\Models\market_products;
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


        return view('users.dashboard')
            ->with('users', $users)
            ->with('products', $products)
            ->with('cod', $cod)
            ->with('calc', $cal);
    }
    // public function users()
    // {
    //     $users = user_details::select(
    //         'users.*',
    //         'user_details.image',
    //         'user_details.house_address',
    //         'user_details.street',
    //         'user_details.city'
    //     )
    //         ->leftjoin('users', 'users.id', '=', 'user_details.user_id')
    //         ->where('users.role', 1)->orderBy('user_details.id', 'DESC')->get();
    //     return view('users.users')
    //         ->with('users', $users);
    // }

    public function users()
    {
        $users = User::select(
            '*'
        )
            ->where('users.role', 1)->orderBy('id', 'DESC')->get();
        return view('users.users')
            ->with('users', $users);
    }

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
        $orders = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('user_id', $id)
            ->where('status', 'Delivered')
            ->get();
        $ordersS = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('user_id', $id)
            ->where('status', 'Ordered')
            ->orWhere('status', 'Shipped')
            ->get();
        $ordersR = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('user_id', $id)
            ->where('status', 'Return')
            ->get();
        return view('users.user')
            ->with('users', $users)
            ->with('orders', $orders)
            ->with('orderR', $ordersR)
            ->with('ordersS', $ordersS);
    }
    public function sellers()
    {
        $users = User::select('users.*', 'vendor_details.image', 'vendor_details.type')
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->where('role', 2)->orderBy('users.id', 'DESC')->get();
        return view('users.sellers')
            ->with('users', $users);
    }
    public function deliveryusers()
    {
        $fileJson =  base_path("delright-dbc86-firebase.json");
        $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount);

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

    public function seller($id)
    {
        $users = User::select('users.*', 'vendor_details.*')
            ->leftjoin('vendor_details', 'vendor_details.id', '=', 'users.id')
            ->where('users.id', $id)->first();
        $orders = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $id)
            ->where('status', 'Delivered')
            ->get();
        $ordersS = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $id)
            ->where('status', 'Ordered')
            ->orWhere('status', 'Shipped')
            ->get();
        $ordersR = orders::select('products.*', 'orders.quantity as qua', 'orders.status', 'orders.price as amount')
            ->leftjoin('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.seller_id', $id)
            ->where('status', 'Return')
            ->get();
        return view('users.seller')
            ->with('users', $users)
            ->with('orders', $orders)
            ->with('orderR', $ordersR)
            ->with('ordersS', $ordersS);
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
    public function deleteCategory($id)
    {
        categories::find($id)->delete();
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
        return view('users.addProduct')
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
        $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount);

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
        $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount);

        $firestore = new FirestoreClient([
            'projectId' => 'delright-dbc86',
        ]);

        $collectionReference = $firestore->collection('users');

        $documentReference = $collectionReference->document($id)->update([['path' => 'user_kyc_verified','value' => 1]]);
        
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
    
}
