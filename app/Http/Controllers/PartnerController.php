<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerPreference;
use App\Models\User;
use Illuminate\Support\Carbon;
use Auth;
use DB;

class PartnerController extends Controller
{

public function getHome(){
    $user = PartnerPreference::find(Auth::user()->id);
    $user_d = User::find(Auth::user()->id);
    $gender = $user_d->gender;
    if($gender == 2){
        $pref_gender = 1;
    }else{
        $pref_gender = 2; 
    }

    if($user){
    $salary_range = $user->salary_range;
    $split_amount = explode("-", $salary_range);
    $job_type = json_decode($user->job_type);
    $family_type = json_decode($user->family_type);
    $maritial_status = $user->maritial_status;

    DB::enableQueryLog();
    $partners = User::whereBetween('annual_income', [$split_amount[0], $split_amount[1]])->where(function ($q) use ($job_type, $family_type , $maritial_status ,$pref_gender) {
       if($job_type != ''){
         $q->whereIn('job_type', $job_type);
     }
     if($family_type != ''){
         $q->whereIn('family_type', $family_type);
     }
     if($maritial_status != '' && $maritial_status != 2){
         $q->where('maritial_status', $maritial_status);
     }
     $q->where('gender', $pref_gender);
      
     })->get();
  }else{
    $partners = User::where('gender', $pref_gender)->get();
  }
    $query = DB::getQueryLog();

    return view('dashboard',compact('partners'));
}

 public function addPartner(){
    return view('partner/add_partner');
 }

 public function savePartner(Request $request){

     $amount = $request->amount;
     $maritial_status = $request->maritial_status;
     $family_type = $request->family_type;
     $job_type = $request->job_type;
     $user_id = Auth::user()->id;
     
     $partner_p = PartnerPreference::find($user_id)->first();
     if( $partner_p){
         $add_preference = PartnerPreference::find($user_id)->update([
            'salary_range' => $amount,
            'maritial_status' =>$maritial_status,
            'family_type' =>json_encode($family_type),
            'job_type' => json_encode($job_type),
            'user_id' => $user_id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Preference added successfully');
     }else{
         $add_preference = PartnerPreference::insert([
            'salary_range' => $amount,
            'maritial_status' =>$maritial_status,
            'family_type' =>json_encode($family_type),
            'job_type' => json_encode($job_type),
            'user_id' => $user_id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Preference added successfully');
     }

    


 }
}
