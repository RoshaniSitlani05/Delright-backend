<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalDetails;
use App\Models\Bank;
use App\Models\Profession;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\feedback;
use App\Models\GetInTouch;
use App\Models\VehicleDetails;
use App\Models\EmergencyDetails;


class PersonalDetailsDelController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdetails = PersonalDetails::all();
        return response()->json(['user'=> $userdetails]);
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
        $userData_count =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->count();
        if($userData_count == 0){
            $user = new PersonalDetails;
            if($request->mobile_no){
                $user->user_id = $request->mobile_no;
            }else{
                $user->user_id = auth('api')->user()->id;
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->dob = $request->dob;
            $user->mobile_number = $request->mobile_number;
            $user->email = $request->email;
            
            $profile_image = $request->file('profile_image');

            if($profile_image){
                //Get file name with extension
                $fileNameWithExt = $profile_image->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $profile_image->getClientOriginalExtension();
                
                // file name to store
                // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                $fileNameToStore = $profile_image->hashName();
             
                $profile_image->store('profileimgs', ['disk' => 'my_profile']);
                
                $user->profile_image = $fileNameToStore;    
            }
 
            $result = $user->save();
            if($result){
                return response()->json(["successMsg"=>"User details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added user details"]);
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
        // $user = PersonalDetails::find($id);
        $user =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->get();
        return response()->json(["user"=>$user], 200);
        // return response()->json(['details' => $details], 200);
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
        $update = PersonalDetails::where('user_id', $id);

        if ($request->has('first_name')) {
            $update->update(['first_name' => $request->first_name]);
        }

        if ($request->has('last_name')) {
            $update->update(['last_name' => $request->last_name]);
        }

        if ($request->has('dob')) {
            $update->update(['dob' => $request->dob]);
        }
        if ($request->has('mobile_number')) {
            $update->update(['mobile_number' => $request->mobile_number]);
        }
        if ($request->has('email')) {
            $update->update(['email' => $request->email]);
        }

        if ($request->has('profile_image')) {
            $profile_image = $request->file('profile_image');
            $fileNameToStore = '';
            if($profile_image){
                //Get file name with extension
                $fileNameWithExt = $profile_image->getClientOriginalName();
                
                // Get only file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // Get only the extension
                $fileExt = $profile_image->getClientOriginalExtension();
                
                // file name to store
                $fileNameToStore = $profile_image->hashName();
             
                $profile_image->store('profileimgs', ['disk' => 'my_profile']);
                $update->update(['profile_image' => $request->profile_image]);
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
        $userData_count =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->count();

        $userData =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->get();
        
        if($userData_count > 0){
            $id = $userData[0]->id;
        
            $user = PersonalDetails::find($id);
            $result = $user->delete();

            if($result){
                return response()->json(["result"=>"User Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting User details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $user = User::find($id);

        $result = $user->delete();
        if($result){
            return response()->json(["result"=>"User Deleted successfully"]);
        }else{
            return response()->json(["result"=>"Issue in deleting User details"]);
        }
    }

    
        //Percent of profile completes
    public function profilePercent($id)
    {
        $user_id = $id; 
        
        $userData_count =  PersonalDetails::where(['user_id' => $user_id, 'status' => 1])->count();
 
        $bank_count =  Banks::where(['user_id' => $user_id, 'status' => 1])->count();
        
        $vehicle_count =  VehicleDetails::where(['user_id' => $user_id, 'status' => 1])->whereNOTNULL('vehicle_type')->count();
        
        $contact_count =  EmergencyDetails::where(['user_id' => $user_id, 'status' => 1])->count();

        $documents_count =  Documents::where(['user_id' => $user_id, 'status' => 1])->count();

        $userData = 0;
        $bank = 0;
        $vehicle = 0;
        $contact = 0;
        $documents = 0;

        $userData_check = false;
        $bank_check = false;
        $vehicle_check = false;
        $contact_check = false;
        $documents_check = false;

        if($userData_count == 1){
            $userData = 20;
            $userData_check = true;
        }
        
        if($bank_count == 1){            
            $bank = 20;
            $bank_check = true;
        }

        if($vehicle_count == 1){
            $vehicle = 20;
            $vehicle_check = true;
        }

        if($contact_count == 1){
            $contact = 20;
            $contact_check = true;
        }

        if($documents_count == 1){
            $documents = 20;
            $documents_check = true;
        }
    
        $profile_percent = $userData + $bank + $vehicle + $contact + $documents;

        return response()->json(['profile_percent'=> $profile_percent,'user_details_completed'=> $userData_check,'bank_details_completed'=> $bank_check,'contact_details_completed'=> $contact_check,'vehicle_details_completed'=> $vehicle_check,'documents_details_completed'=> $documents_check]);
    }
    
    
    public function addDelFeedback(Request $request)
    {
        $feedback = new feedback();
        $feedback->user_id = $request->mobile_no;
        $feedback->feedback = $request->feedback;
        $check = $feedback->save();
        if ($check) {
            return response()->json(['successMsg' => 'Thanks for your feedback']);
        } else {
            return response()->json(['errorMsg' => 'Feedback not added']);
        }
    }

    public function addGetInTouch(Request $request)
    {
        $contact = new GetInTouch();
        $contact->user_id = $request->mobile_no;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        
        $check = $contact->save();
        if ($check) {
            return response()->json(['successMsg' => 'Thanks for contacting']);
        } else {
            return response()->json(['errorMsg' => 'Contact not added']);
        }
    }
}
