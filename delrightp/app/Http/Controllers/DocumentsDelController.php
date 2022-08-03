<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentsDelController extends Controller
{
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
        $document_count =  Documents::where(['user_id' => $id, 'status' => 1])->count();

        if($document_count == 0){
            $document =  new Documents;
            if($request->mobile_no){
                $document->user_id = $request->mobile_no;
            }else{
                $document->user_id = auth('api')->user()->id;
            }
            
            $document->document_type = $request->document_type;
            $aadharcard_img = $request->file('aadharcard_img');
            $passport_img = $request->file('passport_img');

            if($aadharcard_img){
                //Get file name with extension
                $fileNameWithExt = $aadharcard_img->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $aadharcard_img->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $aadharcard_img->hashName();
                $aadharcard_img->store('Documents', ['disk' => 'my_files']);
                
                $document->aadharcard_img = $fileNameToStore;    
            }

            if($passport_img){
                //Get file name with extension
                $fileNameWithExt = $passport_img->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $passport_img->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $passport_img->hashName();
                $passport_img->store('Documents', ['disk' => 'my_files']);
                
                $document->passport_img = $fileNameToStore;    
            }
            
            $result = $document->save();
            if($result){
                return response()->json(["successMsg"=>"Documents added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added Documents"]);
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
        $documents =  Documents::where(['user_id' => $id, 'status' => 1])->get();
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
        $update = Documents::where('user_id', $id);

        if ($request->has('document_type')) {
            $update->update(['document_type' => $request->document_type]);
        }

        if ($request->has('aadharcard_img')) {
            $aadharcard_img = $request->file('aadharcard_img');
            $fileNameToStore = '';
            if($aadharcard_img){
                //Get file name with extension
                $fileNameWithExt = $aadharcard_img->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $aadharcard_img->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $aadharcard_img->hashName();
             
                $aadharcard_img->store('Documents', ['disk' => 'my_files']);
                $update->update(['aadharcard_img' => $request->aadharcard_img]);
            }
        }

        if ($request->has('passport_img')) {
            $passport_img = $request->file('passport_img');
            $fileNameToStore = '';
            if($passport_img){
                //Get file name with extension
                $fileNameWithExt = $passport_img->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $passport_img->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $passport_img->hashName();
             
                $passport_img->store('Documents', ['disk' => 'my_files']);
                $update->update(['passport_img' => $request->passport_img]);
            }
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
