<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    //get all Comment
    public function index()
    {
        Session::put('page','comment');
        //get all user 
        $comments = Comment::orderby('id','desc')->get();
        
        return view('comments.index',compact('comments'))->with('no',1);
    }

    //create 
    public function create()
    {
        return view('comments.create');
    }

    //Store Comment
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->save();

        if($comment)
        {
            return redirect('/comments')->with('success','Comment Created Successfully');
        }
    }

    //edit Comment
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit',compact('comment'));
    }

    //update Comment
    public function update(Request $request,$id)
    {
        $comment = Comment::find($id);
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->update();

        if($comment)
        {
            return redirect('/comments')->with('success','Comment Updated Successfully');
        }
    }

    //delete Comment
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        if($comment)
        {
            return redirect('/comments')->with('success','Comment Deleted Successfully');
        }
    }
}