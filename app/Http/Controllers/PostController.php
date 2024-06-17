<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('timeline', [
            'posts' => $posts
        ]);
    }

    public function like($postId)
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        $post = Post::findOrFail($postId); // Récupérer le post concerné

        if (!$user->likedPosts()->where('post_id', $postId)->exists()) {
            $user->likedPosts()->attach($postId); // Attacher le post à l'utilisateur
        }

        return redirect()->back();
    }

    public function unlike($postId)
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté
        $user->likedPosts()->detach($postId); // Détacher le post de l'utilisateur

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|max:180'
        ]);

        $post = new Post();
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('timeline');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('timeline');
    }
}
