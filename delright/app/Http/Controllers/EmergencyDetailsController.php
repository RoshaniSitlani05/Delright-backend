<?php

namespace App\Http\Controllers;

use App\Models\EmergencyDetails;
use Illuminate\Http\Request;

class EmergencyDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

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
        if($request->mobile_no){
            $id = $request->mobile_no;
        }else{
            $id = auth('api')->user()->id;
        }
        $contact_count =  EmergencyDetails::where(['user_id' => $id, 'status' => 1])->count();

        if($contact_count == 0){
            $contact = new EmergencyDetails;
            if($request->mobile_no){
                $contact->user_id = $request->mobile_no;
            }else{
                $contact->user_id = auth('api')->user()->id;
            }
            
            $contact->name = $request->name;
            $contact->relation = $request->relation;
            $contact->phone_number = $request->phone_number;
            $contact->address = $request->address;
            
            $result = $contact->save();
            if($result){
                return response()->json(["successMsg"=>"User Contact details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added User Contact details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmergencyDetails  $emergencyDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactdetails =  EmergencyDetails::where(['user_id' => $id, 'status' => 1])->get();
        return response()->json(["contactdetails"=>$contactdetails]);//
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
        if($request->mobile_no){
            $id = $request->mobile_no;
        }else{
            $id = auth('api')->user()->id;
        }
        $update = EmergencyDetails::where('user_id', $id);

        if ($request->has('name')) {
            $update->update(['name' => $request->name]);
        }

        if ($request->has('relation')) {
            $update->update(['relation' => $request->relation]);
        }

        if ($request->has('phone_number')) {
            $update->update(['phone_number' => $request->phone_number]);
        }
        if ($request->has('address')) {
            $update->update(['address' => $request->address]);
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
