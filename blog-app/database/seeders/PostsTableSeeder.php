<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Post One',
                'description' => 'description one',
            ],
            [
                'title' => 'Post Two',
                'description' => 'description two',
            ]
        ];

        foreach ($posts as $key => $value) {
            Post::create($value);
        }

    }
}
