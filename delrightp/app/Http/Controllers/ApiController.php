<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\vendor_details;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sliders;
use App\Models\VehicleMaster;
use App\Models\Settings;

class ApiController extends Controller
{
     public function getAllSliders($category)
    {
        
        $sliders = DB::table('sliders')->where('shop_category', $category)->get();
        
        return response()->json(['details' => $sliders]);
    }
    
    public function vehicles()
    {
        $vehicles = VehicleMaster::where('status', 1)->get();
        $vehicles->makeHidden(['created_at', 'updated_at']);

        $setting = Settings::Where(['id' => 1])->get();
        $ServiceCharge = $setting[0]->delivery_service_charge;
        
        return response()->json(['details' => $vehicles,'deliveryservicecharge' => $ServiceCharge]);
    }

    public function getVehiclePrice($id)
    {
        $vehicles = VehicleMaster::where('id', $id)->first();
        
        $vehicles->makeHidden(['created_at', 'updated_at']);

        return response()->json(['details' => $vehicles]);
    }
    
    // public function getAllSliders()
    // {
    //     $sliders = Sliders::all();
    //     $sliders->makeHidden(['created_at', 'updated_at']);
    //     return response()->json(['details' => $sliders]);
    // }

    public function category()
    {
        $category = categories::all();
        $category->makeHidden(['created_at', 'updated_at']);
        return response()->json(['totalCount' => strval(count($category)), 'details' => $category]);
    }
    public function Productcategory()
    {
        $id = auth('api')->user()->id;
        $cate = vendor_details::select('category')->where('id', $id)->first();
        $category = DB::table('product_category')
            ->select('id', 'name')
            ->where('category', $cate->category)
            ->where('status', 1)
            ->get();

        return response()->json(['totalCount' => strval(count($category)), 'details' => $category]);
    }
    public function notifications()
    {
        $notifications = DB::table('notifications')->where('user_id', auth('api')->user()->id)
            ->paginate(10);
        return $notifications;
    }
    public function addFeedback(Request $request)
    {
        $feedback = new feedback();
        $feedback->user_id = auth('api')->user()->id;
        $feedback->feedback = $request->feedback;
        $check = $feedback->save();
        if ($check) {
            return response()->json(['successMsg' => 'Thanks for your feedback']);
        } else {
            return response()->json(['errorMsg' => 'Feedback not added']);
        }
    }
    
}
