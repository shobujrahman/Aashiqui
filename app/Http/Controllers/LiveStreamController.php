<?php

namespace App\Http\Controllers;

use App\Models\FakeUserLiveStreaming;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LiveStreamController extends Controller
{
    //get allLiveStream
    public function allLiveStream()
    {
        Session::put('page','liveStream');
        //get all user 
        $liveStreams = FakeUserLiveStreaming::with(['user'])->orderby('id','desc')->get();
        
        return view('liveStream.index',compact('liveStreams'))->with('no',1);
    }

    public function create()
    {
        $users = User::where('isAdminGenerated','=',1)->get();
        return view('liveStream.create',compact('users'));
    }

    //get store functionality
    public function store(Request $request)
    {

        $liveStream = new FakeUserLiveStreaming();
        
        //fakeUser StreamVideo Upload
      

    //take livestremurl only when urltype is Others
    if($request->url_type == 'Others'){
        $s3 = Storage::disk('do_spaces');
        $file = $request->file('live_stream_url');
        $fileName = $file->getClientOriginalName();
 
       
        $path = $s3->putFileAs('Asiquee/FakeUserStream', $file, $fileName, 'public');
 
        $liveStream->live_stream_url = $path;
        // $liveStream->url_type = $request->url_type;
    }
    else{
        $liveStream->url = $request->url;
    }

        $liveStream->user_id = $request->user_id;
        $liveStream->url_type = $request->url_type;
        $liveStream->save();

        if($liveStream)
        {
            return redirect('/liveStream')->with('success','Live Stream Created Successfully');
        }
        else
        {
            return redirect('liveStream.create')->with('error','Live Stream Not Created');
        }
    }
       
        

       
        
    
   
}
   