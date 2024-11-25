<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Data storing
    public function createPost(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('dashboard');  
      }   
    
}
