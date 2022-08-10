<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shops;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopdetails = Shops::all();
        return response()->json(['shopdetails'=> $shopdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth('api')->user()->id;
        $shopData_count =  Shops::where(['user_id' => $id, 'status' => 1])->count();
        if($shopData_count == 0){
            $shop = new Shops;
            $shop->user_id = auth('api')->user()->id;
            $shop->shop_name = $request->shop_name;
            $shop->start_date = $request->start_date;
            $shop->shop_mobile_number = $request->shop_mobile_number;
            $shop->shop_email = $request->shop_email;
            $shop->shop_gstn_number = $request->shop_gstn_number;
            $shop->shop_address = $request->shop_address;
             
            $result = $shop->save();
            if($result){
                return response()->json(["successMsg"=>"Shop details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopdetails =  Shops::where(['user_id' => $id, 'status' => 1])->get();
        return response()->json(["shopdetails"=>$shopdetails]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = auth('api')->user()->id;
        $update = Shops::where('user_id', $id);

        if ($request->has('shop_name')) {
            $update->update(['shop_name' => $request->shop_name]);
        }

        if ($request->has('start_date')) {
            $update->update(['start_date' => $request->start_date]);
        }

        if ($request->has('shop_mobile_number')) {
            $update->update(['shop_mobile_number' => $request->shop_mobile_number]);
        }
        if ($request->has('shop_email')) {
            $update->update(['shop_email' => $request->shop_email]);
        }
        if ($request->has('shop_gstn_number')) {
            $update->update(['shop_gstn_number' => $request->shop_gstn_number]);
        }
        if ($request->has('shop_address')) {
            $update->update(['shop_address' => $request->shop_address]);
        }
        
        return response()->json(['successMsg' => 'Detials  successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
