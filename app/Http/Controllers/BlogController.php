<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $post_latest = [
            'title' => 'Post Populer',
            'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
        ];

        $post_highlight = [
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
        ];

        $posts = [
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
            [
                'title' => 'Post Pertama',
                'date' => '27-04-2025',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque quisquam maxime expedita inventore velit sunt animi sint, error soluta.',
            ],
        ];

        return view('blog.all-post', compact('post_latest', 'post_highlight', 'posts'));
    }
}
