<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_details;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->auth_id = auth('api')->user()->id;
        //return $this->auth_id;
    }

    public function addUserDetails(Request $request)
    {
        $user = new user_details();
        $user->user_id = $this->auth_id;
        $user->phone_number = $request->phone_number;
        $user->house_address = $request->house_address;
        $user->street = $request->street;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->pincode = $request->pincode;
        if ($request->has('image')) {
            $image = $request->image->store('public/user_profile');
            $user->image = $image;
        }

        $check = $user->save();
        if ($check) {
            return response()->json(['successMsg' => 'Detials  successfully added']);
        }
    }

    public function getMyDetails()
    {
        $user = User::select('users.id', 'users.name', 'users.email', 'users.fcm_token', 'user_details.*')
            ->leftjoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->where('users.id', $this->auth_id)
            ->first();
        $user->makeHidden(['created_at', 'updated_at']);
        return response()->json(['details' => $user]);
    }
    public function updateUserDetails(Request $request)
    {
        $update = user_details::where('user_id', $request->id);
        $updateName = User::where('id', $request->id);

        if ($request->has('name')) {
            $updateName->update(['name' => $request->name]);
        }
        if ($request->has('phone_number')) {
            $update->update(['phone_number' => $request->phone_number]);
        }
        if ($request->has('house_address')) {
            $update->update(['house_address' => $request->house_address]);
        }
        if ($request->has('street')) {
            $update->update(['street' => $request->street]);
        }
        if ($request->has('city')) {
            $update->update(['city' => $request->city]);
        }
        if ($request->has('state')) {
            $update->update(['state' => $request->state]);
        }
        if ($request->has('pincode')) {
            $update->update(['pincode' => $request->pincode]);
        }
        if ($request->has('image')) {
            $image = $request->image->store('public/user_profile');
            $update->update(['image' => $image]);
        }
        return response()->json(['successMsg' => 'Detials  successfully updated']);
    }
}
