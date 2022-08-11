<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use HasApiTokens;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Hash;
use Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:4',
                'role' => 'required|min:1',
                //  'phone_number'=>'required|min:10|unique:users'
            ],
            [
                "name" => "we need your name for registration",
                'email.required' => 'we need your email_id for registration',
                'email.unique' => 'sorry this email id is already registred',
                //'phone_number.unique'=>'sorry this phone number is already registred',
                //'phone_number.min'=>'invalid phonenumber',
                //'phone_number.required'=>'we need your phone number for registration',
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['validateError' => $errors], 200);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->fcm_token = $request->fcm_token;
        $result = $user->save();
        if ($result == true) {
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['success' => 'message', 'details' => $token, 'fcm_token' => $request->fcm_token]);
        }
    }
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ];
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            User::where('email', $request->email)->update(['fcm_token' => $request->fcm_token]);
            
            $userData = User::where('email', $request->email)->get();
            
            $success['token'] = $token;
            $success['role'] = $request->role;
            $success['fcm_token'] = $request->fcm_token;
            $success['status'] = $userData[0]->status;
            

            return response()->json([
                'successMsg' => 'SuccessFully Logged IN', 'details' => auth()->user(), 'details' => $success
            ]);
        } else {
            $emailCheck = User::where('email', $request->email)->get();
            if (count($emailCheck) < 1) {
                return response()->json(['validateError' => ['email' => 'invalid Email', 'password' => 'invalid password']]);
            } else {
                return response()->json(['validateError' => ['password' => 'password not matching']]);
            }
        }
    }

    public function logoutApi()
    {

        $request = auth('api')->user()->id;
        $accessToken = auth('api')->user()->token;
        $token = auth('api')->user()->tokens->find($accessToken);
        $token->revoke();
        $response = array();
        // $response['status']=1;
        // $response['statuscode']=200;
        $response['successMsg'] = "Successfully logout";
        return response()->json($response)->header('Content-Type', 'application/json');
    }


    // forgot password
    public function test(Request $request)
    {
        $test = User::where('email', $request->email)->first();
        if ($test == true) {
            return response()->json(["successMsg" => "Otp has been send to your email", 'name' => $test->name]);
        } else {
            return response()->json(["errorMsg" => "invalid email"]);
        }
    }

    public function storeOtp(Request $request)
    {
        $trial = User::where('email', $request->email)->update(['remember_token' => $request->otp]);
        return response()->json(["successMsg" => 'otp saved in db', 'email' => $request->email]);
    }

    public function checkotp(Request $request)
    {
        $check = User::where('remember_token', $request->otp)->where('email', $request->email)->get()->count();
        if ($check > 0) {
            return response()->json(["successMsg" => 'otp verified']);
        } else {
            return response()->json(["errorMsg" => 'Otp verification faild']);
        }
    }

    public function reset(Request $request)
    {

        $password = Hash::make($request->password);
        $trial = User::where('email', $request->email)->update(['password' => $password]);
        if ($trial == 1) {
            User::where('email', $request->email)->update(['remember_token' => '']);
            return response()->json(["successMsg" => 'Password updated']);
        }
    }
    public function check(Request $request)
    {
        $check = User::where('phone_number', $request->phone_number)->first();
        if (!$check) {
            return response()->json([
                "new_user" => 0,
                "phone_number" => $request->phone_number,
                'role' => $request->role,
                'successMsg' => 'Please Register'
            ]);
        } else {
            $token = $check->createToken('LaravelAuthApp')->accessToken;
            return response()->json(["new_user" => 1, "successMsg" => "Successfully LoggedIn", "token" => $token, 'role' => $check->role]);
        }
    }
    public function registerWithFireBase(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'unique:users',
                'role' => 'required|min:1',
            ],
            [
                "name" => "we need your name for registration",
                'email.unique' => 'sorry this email id is already exists'
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['validateError' => $errors], 200);
        }
        $user =  new User;
        $user->phone_number = $request->phone_number;
        $user->name = $request->name;
        if ($request->has('email')) {
            $user->email = $request->email;
        } else {
            $user->email = $request->phone_number . '@Szeappstore.com';
        }
        $user->password = bcrypt($request->phone_number . 'password');
        $user->role = $request->role;
        $user->save();
        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(["successMsg" => "Successfully Registred", "token" => $token]);
    }

    public function getCOD()
    {
        $setting = Settings::Where(['id' => 1])->get();
        $cod = $setting[0]->cod;
        if($cod == 1){
            $cod = true;
        }else{
            $cod = false;
        }
        return response()->json(['cod' => $cod]);
    }
    
    // public function getServiceCharge($catid)
    // {
    //     $product = ProductCategory::findOrFail($catid);
        
    //     // $setting = Settings::Where(['id' => 1])->get();
    //     $ServiceCharge = $product->service_charge;
        
    //     return response()->json(['ServiceCharge' => $ServiceCharge]);
    // }
    
    
     //in Object data, not in array.
    public function getServiceCharge()
    {
        // $product = ProductCategory::findOrFail($catid);
        
        $setting = Settings::Where(['id' => 1])->get();
        $ServiceCharge = $setting[0]->service_charge;
        
        return response()->json(['ServiceCharge' => $ServiceCharge]);
    }
   
    
    public function getDeliveryServiceCharge()
    {
        $setting = Settings::Where(['id' => 1])->get();
        $ServiceCharge = $setting[0]->delivery_service_charge;
        
        return response()->json(['DeliveryServiceCharge' => $ServiceCharge]);
    }
    
    public function checkCouponCode($code)
    {
        $setting = Settings::Where(['id' => 1])->get();
        $coupon_code = $setting[0]['coupon_code'];
        $coupon_discount = $setting[0]['coupon_discount'];
        if($coupon_code == $code){
            return response()->json(['coupon_discount' => $coupon_discount]);    
        }else{
            return response()->json(['coupon_discount' => NULL]);    
        }
        
    }
    

    public function authenticate(Request $request) { 
        $phone_number = $request->input('phone_number');
        $user = User::where('phone_number', '=', $phone_number)->first();
        try { 
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::fromUser($user)) { 
                return response()->json(['error' => 'invalid_credentials'], 401);
            } 
        } catch (JWTException $e) { 
            // something went wrong 
            return response()->json(['error' => 'could_not_create_token'], 500); 
        } 
        $data = [
            'phone_number' => $request->phone_number,
            'role' => $request->role
        ];

        if (auth()->attempt($data)) {            
            $userData = User::where('phone_number', '=', $phone_number)->get();
            
            $success['token'] = $token;
            $success['role'] = $request->role;
            $success['status'] = $userData[0]->status;

            return response()->json([
                'successMsg' => 'SuccessFully Logged IN', 'details' => auth()->user(), 'details' => $success
            ]);
        } else {
            $emailCheck = User::where('phone_number', $request->phone_number)->get();
            if (count($emailCheck) < 1) {
                return response()->json(['validateError' => ['phone_number' => 'invalid Phone Number']]);
            } 
        }
        // if no errors are encountered we can return a JWT 
        return response()->json(compact('token')); 
    }

    public function registerauthenticate(Request $request) { 
        $validator = Validator::make(
            $request->all(),
            [
                'phone_number'=>'required|min:10|unique:users'
            ],
            [
                'phone_number.unique'=>'sorry this phone number is already registred',
                'phone_number.min'=>'invalid phonenumber',
                'phone_number.required'=>'we need your phone number for registration',
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['validateError' => $errors], 200);
        }
        
        $user = new User;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;
        $result = $user->save();

        $phone_number = $request->input('phone_number');
        $user = User::where('phone_number', '=', $phone_number)->first();
        try { 
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::fromUser($user)) { 
                return response()->json(['error' => 'invalid_credentials'], 401);
            } 
        } catch (JWTException $e) { 
            // something went wrong 
            return response()->json(['error' => 'could_not_create_token'], 500); 
        } 
        // if no errors are encountered we can return a JWT 
        
        if ($result == true) {
            
            return response()->json(['success' => 'message', 'details' => $token, 'fcm_token' => $request->fcm_token]);
        }
        
    }    
}
