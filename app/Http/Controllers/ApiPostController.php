<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ApiPostController extends Controller
{
    public function getUserPosts($userId)
    {
        $posts = Posts::where('user_id', $userId)
            ->get();

        return response()->json($posts);
    }

    public function getRecentPosts()
    {
        $posts = Posts::orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        
        return response()->json($posts);

    }
}
