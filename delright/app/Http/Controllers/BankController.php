<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banks;

class BankController extends Controller
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
        //
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

        $bank_count =  Banks::where(['user_id' => $id, 'status' => 1])->count();

        if($bank_count == 0){
            $bank = new Banks;
            if($request->mobile_no){
                $bank->user_id = $request->mobile_no;
            }else{
                $bank->user_id = auth('api')->user()->id;
            }
            
            $bank->bank_name = $request->bank_name;
            $bank->account_no = $request->account_no;
            $bank->account_holder_name = $request->account_holder_name;
            $bank->ifsc_code = $request->ifsc_code;
            $bank->email_id = $request->email_id;
            
            $result = $bank->save();
            if($result){
                return response()->json(["successMsg"=>"User Bank details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added User Bank details"]);
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
        $documents =  Banks::where(['user_id' => $id, 'status' => 1])->get();
        return response()->json(["documents"=>$documents]);//
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
        $update = Banks::where('user_id', $id);

        if ($request->has('bank_name')) {
            $update->update(['bank_name' => $request->bank_name]);
        }

        if ($request->has('account_no')) {
            $update->update(['account_no' => $request->account_no]);
        }

        if ($request->has('account_holder_name')) {
            $update->update(['account_holder_name' => $request->account_holder_name]);
        }
        if ($request->has('ifsc_code')) {
            $update->update(['ifsc_code' => $request->ifsc_code]);
        }
        if ($request->has('email_id')) {
            $update->update(['email_id' => $request->email_id]);
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
