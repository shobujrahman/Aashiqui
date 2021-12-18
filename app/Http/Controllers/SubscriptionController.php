<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    //get all suscription
    public function getAllSubscription()
    {   
        Session::put('page', 'subscription');
        $subscriptions = SubscriptionPlan::all();
        
        return view('subscription.index', ['subscriptions' => $subscriptions])->with('no',1);
    }
    
    //store function to store the database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'durationInMonth' => 'required'
        ]);
        
        $subscription = new SubscriptionPlan();
        $subscription->name = $request->name;
        $subscription->price = $request->price;
        $subscription->durationInMonth = $request->durationInMonth;
        $subscription->viewCountMultiplier = $request->viewCountMultiplier;
        $subscription->metadata = $request->metadata;
        $subscription->save();

        if($subscription){
            $notification=array(
                'message'=>'Successfully added',
                'alert-type'=>'success'
            );
            return redirect('/subscription')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // update function to update the data
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'durationInMonth' => 'required'
        ]);
        
        $subscription = SubscriptionPlan::find($request->id);
        $subscription->name = $request->name;
        $subscription->price = $request->price;
        $subscription->durationInMonth = $request->durationInMonth;
        $subscription->viewCountMultiplier = $request->viewCountMultiplier;
        $subscription->metadata = $request->metadata;
        $subscription->update();

        if($subscription){
            $notification=array(
                'message'=>'Successfully updated',
                'alert-type'=>'success'
            );
            return redirect('/subscription')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function updateStatus( $id){
        $subscription = DB::table('subscription_plans')
        ->select('isBlocked')
        ->where('id', '=', $id)
        ->first();

        //check user Status
        if($subscription->isBlocked=='1'){
            $status = '0';
        }else{
            $status = '1';
        }

        //update user status
        $values = array('isBlocked'=>$status);
        DB::table('subscription_plans')->where('id',$id)->update($values);
        return redirect('/subscription')->with('message','updated status');
    }


    public function destroy($id){
        // Category::destroy(array('id',$id));
        $data = SubscriptionPlan::find($id);
        $data->delete();
       if($data){
            $notification=array(
                'message'=>'Successfully deleted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

}
