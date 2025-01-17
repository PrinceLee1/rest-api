<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user:id,name')->get();
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            foreach ($messages as $message) {
                return response()->json(
                    [
                        "error" => true,
                        "message" => $message,
                    ],
                    400
                );
            }
        }

        $post = $request->user()->posts()->create($request->only('title', 'content'));

        return response()->json(['post' => $post], 201);
    }

    public function show(Post $post)
    {
        // print_r($post->message);exit;
        if(!$post){
            return response()->json(
                [
                    "error" => true,
                    "message" => 'Post data not found!',
                ],
                400
            );
        }
        return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        // print_r($request->user()->id);exit;
        if ($request->user()->id !== $post->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            foreach ($messages as $message) {
                return response()->json(
                    [
                        "error" => true,
                        "message" => $message,
                    ],
                    400
                );
            }
        }

        $post->update($request->only('title', 'content'));

        return response()->json(['post' => $post]);
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->id !== $post->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted']);
    }
}

