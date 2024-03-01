<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store Comment
    public function store(Request $request) {

        if (Auth::check()) {
            $request->validate([
                'data' => 'required'
            ]);
    
            Comment::create([
                'data' => $request->data,
                'recipe_id' => $request->recipe_id,
                'user_id' => auth()->id()
            ]);
    
        }
        return back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return back();
    }
}
