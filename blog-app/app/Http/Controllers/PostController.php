<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $allPosts = [
            [
                "id" => 1,
                "title" => "Learn PHP",
                "posted by" => "Ahmed",
                "created at" => "2018-4-10"
            ],
            [
                "id" => 2,
                "title" => "Solid Principles",
                "posted by" => "Mohamed",
                "created at" => "2018-4-12"
            ],
            [
                "id" => 3,
                "title" => "Design Patterns",
                "posted by" => "Ali",
                "created at" => "2018-4-13"
            ]
        ];

        return view('posts.index', ["posts" => $allPosts,]);
    }
    function create()
    {
        return view('posts.create');
    }
    function store()
    {
        return 'Hello world';
    }
    function show($postId)
    {
        dd($postId);
    }
    function edit($postId)
    {
        return view('posts.edit', ["postId" => $postId,]);
    }
    function update($postId)
    {
        dd($postId);
    }
        function destroy($postId)
    {
        dd($postId);
    }
}
