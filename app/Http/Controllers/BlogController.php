<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;


class BlogController extends Controller
{
    public function index()
    {
        $posts = Posts::whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(5);

        return view('blog.all-post', compact('posts'));
    }

    public function show($id)
{
    $post = Posts::where('id_posts', $id)->firstOrFail();
    return view('blog.detailPost', compact('post'));
}

}
