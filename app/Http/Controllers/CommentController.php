<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'content' => 'required|string|min:10'
        ]);

        $comment = Comment::create([
            'user_id' => request()->user()->id,
            'product_id' => request('product_id'),
            'content' => request('content')
        ]);
        if (request('fromForm')) {
            return back()->with('success', 'Comment added successfully');
        }
        return response()->json([
            'status' => 'success',
            'comment' => $comment->load('user')
        ]);
    }
}
