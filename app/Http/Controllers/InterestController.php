<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InterestController extends Controller
{
    //get all interest
    public function getAllInterest()
    {   Session::put('page', 'interest');
        $interests = Interest::all();
        return view('interest.index', ['interests' => $interests])->with('no',1);
    }

    // create function to show the form
    // public function create()
    // {
    //     return view('interest.create');
    // }

    // store function to store the data
    public function store(Request $request)
    {

        $interest = new Interest();
        $interest->interestName = $request->interestName;
        $interest->save();

        
        if($interest){
            $notification=array(
                'message'=>'Successfully added',
                'alert-type'=>'success'
            );
            return redirect('/interest')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    

    // update function to update the data
    public function update(Request $request, $id)
    {
        $interest = Interest::find($id);
        $interest->interestName = $request->interestName;
        $interest->update();

        if($interest){
            $notification=array(
                'message'=>'Successfully updated',
                'alert-type'=>'success'
            );
            return redirect('/interest')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    public function destroy($id){
        // Category::destroy(array('id',$id));
        $data = Interest::find($id);
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
