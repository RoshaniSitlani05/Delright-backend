<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleDetails;

class VehicleDetailsController extends Controller
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
        $id = $request->mobile_no;
        $document_count =  VehicleDetails::where(['user_id' => $id, 'status' => 1])->count();

        if($document_count == 0){
            $document =  new VehicleDetails;
            $document->user_id = $request->mobile_no;

            $document->vehicle_type = $request->vehicle_type;

            $insurance = $request->file('insurance');
            $rcbook = $request->file('rcbook');
            $driving_license = $request->file('driving_license');
            $puc_certificate = $request->file('puc_certificate');
            $vehicle_image1 = $request->file('vehicle_image1');
            $vehicle_image2 = $request->file('vehicle_image2');
            $vehicle_image3 = $request->file('vehicle_image3');
            $vehicle_image4 = $request->file('vehicle_image4');

            if($insurance){
                //Get file name with extension
                $fileNameWithExt = $insurance->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $insurance->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $insurance->hashName();
                $insurance->store('Documents', ['disk' => 'my_files']);
                
                $document->insurance = $fileNameToStore;    
            }

            if($rcbook){
                //Get file name with extension
                $fileNameWithExt = $rcbook->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $rcbook->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $rcbook->hashName();
                $rcbook->store('Documents', ['disk' => 'my_files']);
                
                $document->rcbook = $fileNameToStore;    
            }

            if($driving_license){
                //Get file name with extension
                $fileNameWithExt = $driving_license->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $driving_license->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $driving_license->hashName();
                $driving_license->store('Documents', ['disk' => 'my_files']);
                
                $document->driving_license = $fileNameToStore;    
            }

            if($puc_certificate){
                //Get file name with extension
                $fileNameWithExt = $puc_certificate->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $puc_certificate->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $puc_certificate->hashName();
                $puc_certificate->store('Documents', ['disk' => 'my_files']);
                
                $document->puc_certificate = $fileNameToStore;    
            }

            if($vehicle_image1){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image1->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image1->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $vehicle_image1->hashName();
                $vehicle_image1->store('Documents', ['disk' => 'my_files']);
                
                $document->vehicle_image1 = $fileNameToStore;    
            }

            if($vehicle_image2){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image2->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image2->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $vehicle_image2->hashName();
                $vehicle_image2->store('Documents', ['disk' => 'my_files']);
                
                $document->vehicle_image2 = $fileNameToStore;    
            }

            if($vehicle_image3){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image3->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image3->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $vehicle_image3->hashName();
                $vehicle_image3->store('Documents', ['disk' => 'my_files']);
                
                $document->vehicle_image3 = $fileNameToStore;    
            }

            if($vehicle_image4){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image4->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image4->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $vehicle_image4->hashName();
                $vehicle_image4->store('Documents', ['disk' => 'my_files']);
                
                $document->vehicle_image4 = $fileNameToStore;    
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
        $documents =  VehicleDetails::where(['user_id' => $id, 'status' => 1])->get();
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
        $id = $request->mobile_no;
        $update = VehicleDetails::where('user_id', $id);

        if ($request->has('vehicle_type')) {
            $update->update(['vehicle_type' => $request->vehicle_type]);
        }

        if ($request->has('insurance')) {
            $insurance = $request->file('insurance');
            $fileNameToStore = '';
            if($insurance){
                //Get file name with extension
                $fileNameWithExt = $insurance->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $insurance->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $insurance->hashName();
             
                $insurance->store('Documents', ['disk' => 'my_files']);
                $update->update(['insurance' => $request->insurance]);
            }
        }

        if ($request->has('rcbook')) {
            $rcbook = $request->file('rcbook');
            $fileNameToStore = '';
            if($rcbook){
                //Get file name with extension
                $fileNameWithExt = $rcbook->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $rcbook->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $rcbook->hashName();
             
                $rcbook->store('Documents', ['disk' => 'my_files']);
                $update->update(['rcbook' => $request->rcbook]);
            }
        }

        if ($request->has('driving_license')) {
            $driving_license = $request->file('driving_license');
            $fileNameToStore = '';
            if($driving_license){
                //Get file name with extension
                $fileNameWithExt = $driving_license->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $driving_license->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $driving_license->hashName();
             
                $driving_license->store('Documents', ['disk' => 'my_files']);
                $update->update(['driving_license' => $request->driving_license]);
            }
        }

        if ($request->has('puc_certificate')) {
            $puc_certificate = $request->file('puc_certificate');
            $fileNameToStore = '';
            if($puc_certificate){
                //Get file name with extension
                $fileNameWithExt = $puc_certificate->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $puc_certificate->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $puc_certificate->hashName();
             
                $puc_certificate->store('Documents', ['disk' => 'my_files']);
                $update->update(['puc_certificate' => $request->puc_certificate]);
            }
        }

        if ($request->has('vehicle_image1')) {
            $vehicle_image1 = $request->file('vehicle_image1');
            $fileNameToStore = '';
            if($vehicle_image1){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image1->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image1->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $vehicle_image1->hashName();
             
                $vehicle_image1->store('Documents', ['disk' => 'my_files']);
                $update->update(['vehicle_image1' => $request->vehicle_image1]);
            }
        }

        if ($request->has('vehicle_image2')) {
            $vehicle_image2 = $request->file('vehicle_image2');
            $fileNameToStore = '';
            if($vehicle_image2){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image2->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image2->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $vehicle_image2->hashName();
             
                $vehicle_image2->store('Documents', ['disk' => 'my_files']);
                $update->update(['vehicle_image2' => $request->vehicle_image2]);
            }
        }

        if ($request->has('vehicle_image3')) {
            $vehicle_image3 = $request->file('vehicle_image3');
            $fileNameToStore = '';
            if($vehicle_image3){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image3->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image3->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $vehicle_image3->hashName();
             
                $vehicle_image3->store('Documents', ['disk' => 'my_files']);
                $update->update(['vehicle_image3' => $request->vehicle_image3]);
            }
        }

        if ($request->has('vehicle_image4')) {
            $vehicle_image4 = $request->file('vehicle_image4');
            $fileNameToStore = '';
            if($vehicle_image4){
                //Get file name with extension
                $fileNameWithExt = $vehicle_image4->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $vehicle_image4->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $vehicle_image4->hashName();
             
                $vehicle_image4->store('Documents', ['disk' => 'my_files']);
                $update->update(['vehicle_image4' => $request->vehicle_image4]);
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
