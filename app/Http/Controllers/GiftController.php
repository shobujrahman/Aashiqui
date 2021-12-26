<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GiftController extends Controller
{
    //get all Gifts
    public function getAllGift()
    {
        session::put('page','gift');
        $gifts = Gift::all();
        $giftCount = Gift::count();
        return view('gift.index', compact('gifts','giftCount'))->with('no', 1);
    }

    //create store functionality
    public function store(Request $request)
    {
        $gift = new Gift();

            $s3 = Storage::disk('do_spaces');
            $file = $request->file('ItemUrl');
            $fileName = $file->getClientOriginalName();

           
            $path = $s3->putFileAs('Asiquee/GiftImage', $file, $fileName, 'public');
            $gift->ItemUrl= $path;
            
        
        $gift->name = $request->name;
        $gift->price = $request->price;
        $gift->save();
        return redirect('/gift');
    }

    //update functionality
    public function update(Request $request, $id)
    {
        $gift = Gift::find($id);

        $s3 = Storage::disk('do_spaces');
        $file = $request->file('ItemUrl');
        
        
        if($file){
            $fileName = $file->getClientOriginalName();

            if ($gift->ItemUrl != null) {
                $s3->delete($gift->ItemUrl);
                $path = $s3->putFileAs('Asiquee/GiftImage', $file, $fileName, 'public');
                $gift->update(['ItemUrl' => $path]);
            } else {
                $path = $s3->putFileAs('Asiquee/GiftImage', $file, $fileName, 'public');
                $gift->ItemUrl= $path;
                // $gift->save();
            }
        }

            $gift->name = $request->name;
            $gift->price = $request->price;
        

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