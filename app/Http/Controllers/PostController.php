<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
      public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (! $post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        return response()->json($post, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create($data);

        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (! $post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $data = $request->only(['title', 'content']);
        $post->update($data);

        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (! $post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post eliminado'], 200);
    }
}
