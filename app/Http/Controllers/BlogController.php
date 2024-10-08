<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::with(['authors', 'categories'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->simplePaginate(10);

        return view('posts', compact('posts'));
    }
}
