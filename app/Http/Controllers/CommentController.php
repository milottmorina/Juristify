<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        //$_GET["id"]
        $comments = Comment::with('user','blog')->where('$_GET["id"]',)->orderBy('id', 'desc')->get();
        dd($comments);
        return view('Blog/Single')->with(['comments', $comments]);

    }

  
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
            // 'user_id',
    // 'blog_id',
    // 'pershkrimi'
        Comment::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $request['blog_id'],
            'pershkrimi'=>$request['pershkrimi'],
        ]);
        return back()->with('msg','Komenti juaj u be me sukses!');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->pershkrimi = $request->pershkrimi;
        $comment->save();
        return back();
    }

   
    public function destroy($id)
    {
        $comment = comment::findOrFail($id);
        
        $comment->delete();
        return back()->with('msg','Komenti juaj u fshi me sukses!');
    }
}
