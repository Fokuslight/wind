<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        // 1. Request
        // 2. Логика
        // 3. Response
        return Post::all();
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function store()
    {
        $data = [
            'author' => 'Ivan',
            'title' => 'My posttt',
            'category' => 'PHP',
            'tag' => 'Cat',
            'image_path' => 'some path',
            'description' => 'description',
            'published_at' => '2020-12-20',
            'likes' => 30,
            'views' => 150,
            'status' => 2,
            'is_published' => true,
        ];
        return Post::create($data);
    }

    public function update(Post $post)
    {
        $data = [
            'author' => 'Ivan edit',
            'title' => 'My post edited',
            'category' => 'PHP edit',
            'tag' => 'Cat',
            'image_path' => 'some path',
            'description' => 'description',
            'published_at' => '2020-12-20',
            'likes' => 30,
            'views' => 150,
            'status' => 2,
            'is_published' => true,
        ];
        $post->update($data);
        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response(['message' => 'deleted'], Response::HTTP_OK);

    }
}


