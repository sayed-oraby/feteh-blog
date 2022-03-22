<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Guest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return view('website.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::user()->type != 'admin' and Auth::user() != $post->user) {
            $post->increment('total_views');
        }

        return view('website.posts.show', compact('post'));
    }

    public function search(Request $request)
    {
        $posts = collect();

        if ($request->name != null) {
            $posts = Post::where('title', 'Like', '%' . $request->name . '%')
                ->orderBy('id', 'desc')->paginate(10);
        }

        if ($request->category != null) {
            $category = Category::where('name', $request->category)->first();
            $posts = $category ? $category->posts()->orderBy('id', 'desc')->paginate(10) : collect();

        }

        if ($request->tag != null) {
            $tag = Tag::where('name', $request->tag)->first();
            $posts = $tag ? $tag->posts()->orderBy('id', 'desc')->paginate(10) : collect();
        }

        return view('website.posts.index', compact('posts'));
    }
}
