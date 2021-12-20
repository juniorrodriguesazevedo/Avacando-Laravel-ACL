<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $data = Post::latest()->paginate(4);

        return view('blog', compact('data'));
    }
}
