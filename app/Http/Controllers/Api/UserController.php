<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\Post;
class UserController extends Controller
{
    // Register User

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
            
        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token], 201);  
    }

    // Login User
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }

    // Create Post
    public function createPost(Request $request)
    {
        $user = JWTAuth::user();

        $validator = Validator::make($request->all(), [
            'content' => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->posts()->create([
            'content' => $request->content
        ]);

        return response()->json(['message' => 'Post created successfully'], 201);
    }

    // Show all Posts
    public function getPosts()
    {
        $posts = Post::with('user')->get();

        return response()->json($posts);
    }
}
