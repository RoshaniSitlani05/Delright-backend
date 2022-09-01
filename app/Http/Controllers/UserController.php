<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_details;
use App\Models\UserReviews;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\vendor_details;
use DB;

use Kreait\Firebase;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use \Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Laravel\Firebase\ServiceProvider;

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
        $user = User::select('users.id', 'users.name', 'users.email', 'users.fcm_token', 'users.unique_pin', 'user_details.*')
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
    
    public function addUserReview(Request $request)
    {
        $user = new UserReviews();
        $user->user_id = $this->auth_id;
        $user->product_id = $request->product_id;
        $user->vendor_id = $request->vendor_id;
        $user->delivery_partner_id = $request->delivery_partner_id;
        $user->rating = $request->rating;
        $user->review = $request->review;
        $user->ans_1 = $request->ans_1;
        $user->ans_2 = $request->ans_2;
        $user->ans_3 = $request->ans_3;
        
        $check = $user->save();
        
        // if ($request->has('product_id') && $request->product_id != '') {
        //     $updateRating = products::where('id', $request->product_id);    
        //     if ($request->has('rating') && $request->rating != '') {
                
        //         $ratingcount = UserReviews::where('product_id', $request->product_id)
        //             ->whereNotNull('rating')
        //             ->count();
            
        //         $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
        //             ->where('product_id', $request->product_id)
        //             ->whereNotNull('rating')
        //             ->first();
                
        //         $updateRating->update(['rating_count' => $ratingcount]);
        //         $updateRating->update(['rating_avg' => $ratingavg->ratingaverage]);    
        //     }
            
        //     if ($request->has('review') && $request->review != '') {
        //         $reviewcount = UserReviews::where('product_id', $request->product_id)
        //             ->whereNotNull('review')
        //             ->count();
        //         $updateRating->update(['review_count' => $reviewcount]);
        //     }
        // }
        
        if ($request->has('vendor_id') && $request->vendor_id != '') {
            $updateRating = vendor_details::where('id', $request->vendor_id);
            
            if ($request->has('rating') && $request->rating != '') {
                
                $ratingcount = UserReviews::where('vendor_id', $request->vendor_id)
                    ->whereNotNull('rating')
                    ->count();
            
                $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
                    ->where('vendor_id', $request->vendor_id)
                    ->whereNotNull('rating')
                    ->first();
                
                $updateRating->update(['rating_count' => $ratingcount]);
                $updateRating->update(['rating_avg' => $ratingavg->ratingaverage]);    
            }
            
            if ($request->has('review') && $request->review != '') {
                $reviewcount = UserReviews::where('vendor_id', $request->vendor_id)
                    ->whereNotNull('review')
                    ->count();
                    
                $updateRating->update(['review_count' => $reviewcount]);
            }
            
        }
        
        if ($request->has('delivery_partner_id') && $request->delivery_partner_id != '') {
            $fileJson =  base_path("delright-dbc86-firebase.json");
            $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount);
    
            $firestore = new FirestoreClient([
                'projectId' => 'delright-dbc86',
            ]);
    
            $collectionReference = $firestore->collection('users');
    
            if ($request->has('rating') && $request->rating != '') {
                
                $ratingcount = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)
                    ->whereNotNull('rating')
                    ->count();
                
                $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
                    ->where('delivery_partner_id', $request->delivery_partner_id)
                    ->whereNotNull('rating')
                    ->first();
                $ratingaverage = $ratingavg->ratingaverage;
                
                $documentReference = $collectionReference->document($request->delivery_partner_id)->update([['path' => 'user_rating_avg','value' => $ratingaverage]]);
            
                $documentReference = $collectionReference->document($request->delivery_partner_id)->update([['path' => 'user_rating_count','value' => $ratingcount]]);            
            }
            
            if ($request->has('review') && $request->review != '') {
                $reviewcount = UserReviews::where('vendor_id', $request->vendor_id)
                    ->whereNotNull('review')
                    ->count();
                $documentReference = $collectionReference->document($request->delivery_partner_id)->update([['path' => 'user_review_count','value' => $reviewcount]]);            
                
            }
        }
        
        if ($check) {
            return response()->json(['successMsg' => 'Review successfully added']);
        }
    }
    
    public function getUserReviews(Request $request){
        
        $reviewscount = [];
        $rating = [];
        $review = [];
        
        if ($request->has('product_id') && $request->product_id != '') {
            $review['review_details'] = UserReviews::select('review','rating')
                                    ->where('product_id', $request->product_id)->get();                
                                    
            $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
                ->where('product_id', $request->product_id)
                ->whereNotNull('rating')
                ->first();
            $rating['ratingavg'] = $ratingavg->ratingaverage;
            $rating['ratingcount'] = UserReviews::where('product_id', $request->product_id)
                    ->whereNotNull('rating')
                    ->count();
                    
            $review['reviewcount'] = UserReviews::where('product_id', $request->product_id)
                    ->whereNotNull('review')
                    ->count();
            
            
            $rating['reviewscount'][1] = UserReviews::where('product_id', $request->product_id)->where('rating', 1)->count();
            $rating['reviewscount'][2] = UserReviews::where('product_id', $request->product_id)->where('rating', 2)->count();
            $rating['reviewscount'][3] = UserReviews::where('product_id', $request->product_id)->where('rating', 3)->count();
            $rating['reviewscount'][4] = UserReviews::where('product_id', $request->product_id)->where('rating', 4)->count();
            $rating['reviewscount'][5] = UserReviews::where('product_id', $request->product_id)->where('rating', 5)->count();
         
        }
        
        if ($request->has('vendor_id') && $request->vendor_id != '') {
            $review['review_details'] = UserReviews::select('review','rating')
                                    ->where('vendor_id', $request->vendor_id)->get();                
            
            
            $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
                ->where('vendor_id', $request->vendor_id)
                ->whereNotNull('rating')
                ->first();
            $rating['ratingavg'] = $ratingavg->ratingaverage;
            $rating['ratingcount'] = UserReviews::where('vendor_id', $request->vendor_id)
                    ->whereNotNull('rating')
                    ->count();
                    
            $review['reviewcount'] = UserReviews::where('vendor_id', $request->vendor_id)
                    ->whereNotNull('review')
                    ->count();
            
            
            $rating['reviewscount'][1] = UserReviews::where('vendor_id', $request->vendor_id)->where('rating', 1)->count();
            $rating['reviewscount'][2] = UserReviews::where('vendor_id', $request->vendor_id)->where('rating', 2)->count();
            $rating['reviewscount'][3] = UserReviews::where('vendor_id', $request->vendor_id)->where('rating', 3)->count();
            $rating['reviewscount'][4] = UserReviews::where('vendor_id', $request->vendor_id)->where('rating', 4)->count();
            $rating['reviewscount'][5] = UserReviews::where('vendor_id', $request->vendor_id)->where('rating', 5)->count();
            
        }
        
        if ($request->has('delivery_partner_id') && $request->delivery_partner_id != '') {
            $review['review_details'] = UserReviews::select('review','rating')
                                    ->where('delivery_partner_id', $request->delivery_partner_id)->get();                
                                    
            $ratingavg = UserReviews::select(DB::raw('avg(rating) as ratingaverage'))
                ->where('delivery_partner_id', $request->delivery_partner_id)
                ->whereNotNull('rating')
                ->first();
            $rating['ratingavg'] = $ratingavg->ratingaverage;
            $rating['ratingcount'] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)
                    ->whereNotNull('rating')
                    ->count();
                    
            $review['reviewcount'] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)
                    ->whereNotNull('review')
                    ->count();
            
            
            $rating['reviewscount'][1] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)->where('rating', 1)->count();
            $rating['reviewscount'][2] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)->where('rating', 2)->count();
            $rating['reviewscount'][3] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)->where('rating', 3)->count();
            $rating['reviewscount'][4] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)->where('rating', 4)->count();
            $rating['reviewscount'][5] = UserReviews::where('delivery_partner_id', $request->delivery_partner_id)->where('rating', 5)->count();
            
        }
        return response()->json(['rating' => $rating,'review' => $review]);
    }
}
