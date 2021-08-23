<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $page_name = "Comments";
        $comments = Comment::where('post_id', $id)->orderBy('id', 'DESC')->get();

        return view('admin.comment.list', compact('page_name', 'comments'));
    }

    public function replay($id)
    {
        $page_name = "Comment Replay";
        return view('admin.comment.replay', compact('page_name', 'id'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->status = 0;
        $comment->comment = $request->comment;
        $comment->post_id  = $request->post_id;
        $comment->save();

        return redirect()->route('comment.view', ['id' => $request->post_id])->with('success', 'Comment Replay saved successfully');
    }

    public function status($id)
    {
        $comment = Comment::find($id);
        $status = $comment->status;
        if ($status === 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }
        $comment->update();

        return back()->with('success', 'Comment status updated Successfully');
    }
}
