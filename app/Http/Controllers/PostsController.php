<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Posts;
use App\Models\Temas;

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
        $temas = Temas::all();

        return view('createPostView', compact('user', 'temas'));
    }

    public function createPost(Request $request ,$userId)
    {
        $user = Usuarios::find($userId);

        if($user) {
            $post = $user->posts()->create([
                'edukia'=>$request->edukia
            ]);

            $post->temas()->attach($request->input('tema', []));
        }


        return redirect()->route('postIndex');
    }

    public function updatePostView($id)
    {
        $post = Posts::find($id);
        $temas = Temas::all();
        return view('updatePostView', compact('post', 'temas'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Posts::find($id);
        
        if($post) {
            $post->update([
                'edukia'=>$request->edukia
            ]);
            $post->temas()->detach();
            $post->temas()->attach($request->input('tema', []));
        }
        
        return redirect()->route('postIndex');
    }

    public function ezabatu($id)
    {
        $post = Posts::find($id);

        $post->temas()->detach();

        $post->delete();

        return redirect()->route('postIndex');
    }
}