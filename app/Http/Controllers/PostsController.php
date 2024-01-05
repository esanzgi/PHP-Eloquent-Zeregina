<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $usersWithPosts = Usuarios::with('posts')->get();
        return view('postsGehitu', compact('usersWithPosts'));
    }

    public function createPostView($userId)
    {
        $user = Usuarios::find($userId);

        return view('createPostView', ['user'=>$user]);
    }

    public function createPost(Request $request ,$userId)
    {
        $user = Usuarios::find($userId);

        if($user) {
            $user->posts()->create([
                'edukia'=>$request->edukia
            ]);
        }

        return redirect()->route('postIndex');
    }

    public function updatePostView($id)
    {
        $post = Posts::find($id);
        return view('updatePostView', ['post'=>$post]);
    }

    public function updatePost(Request $request, $id)
    {
        Posts::find($id)->update([
            'edukia'=>$request->edukia
        ]);
        return redirect()->route('postIndex');
    }

    public function ezabatu($id)
    {
        Posts::find($id)->delete();

        return redirect()->route('postIndex');
    }
}