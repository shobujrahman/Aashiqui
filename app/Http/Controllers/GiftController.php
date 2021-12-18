<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GiftController extends Controller
{
    //get all Gifts
    public function getAllGift()
    {
        session::put('page','gift');
        $gifts = Gift::all();
        return view('gift.index', compact('gifts'))->with('no', 1);
    }

    //create store functionality
    public function store(Request $request)
    {
        $gift = new Gift();

        
            //image
            $imageName = time().'.'.$request->ItemUrl->extension();  
            $request->ItemUrl->move(public_path('images/'), $imageName);
            $gift->ItemUrl = $imageName;
            
        
        $gift->name = $request->name;
        $gift->ItemUrl = $imageName;
        // $gift->price = $request->price;
        $gift->save();
        return redirect('/gift');
    }

    //update functionality
    public function update(Request $request, $id)
    {
        $gift = Gift::find($id);
        $old_img = $request->input('old_img');
        if($request->ItemUrl){
            //image
            $imageName = time().'.'.$request->ItemUrl->extension();  
            $request->ItemUrl->move(public_path('images/'), $imageName);
            $gift->ItemUrl = $imageName;
            
            
            $path1 = public_path('images/'.$old_img);
            if(file_exists($path1)){
                @unlink($path1);
            }
            $gift->update();
        
        }else{

            $gift->name = $request->name;
            // $gift->price = $request->price;
        }
        
        $gift->update();
        return redirect('/gift');
    }


    //delete functionality
    public function destroy($id){
        $gift = Gift::find($id);
            $image = public_path('images/'. $gift->ItemUrl);
            
            if(file_exists($image)){
                @unlink($image);
            }
            
         $gift->delete();
         return redirect('/gift');
    } 
}