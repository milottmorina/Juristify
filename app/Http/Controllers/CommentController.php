<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'pershkrimi' => ['required','string','max:700','min:6']
        ]);
        Comment::create([
            'user_id' => Auth::user()->id,
            'blog_id' => $request['blog_id'],
            'pershkrimi'=>$request['pershkrimi'],
        ]);
        return back()->with('msg','Comment added successfully!');
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'pershkrimi' => ['required','string','max:700','min:6']
        ]);
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
        return back()->with('msg','Comment deleted successfully!');
    }
}
