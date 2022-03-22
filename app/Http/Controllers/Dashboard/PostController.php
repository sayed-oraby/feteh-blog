<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\PostChangeStatusNotification;
use App\Notifications\PostCreateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->type == 'admin') {
            $posts = Post::orderBy('id', 'desc')->withoutGlobalScope('active')->paginate(5);
        } else {
            $posts = $user->posts()->orderBy('id', 'desc')->withoutGlobalScope('active')->paginate(5);
        }

        return view('dashboard.posts.index', compact('posts'));
    }

    public function changeStatus(Request $request)
    {
        $post = Post::withoutGlobalScope('active')->find($request->id);
        $user = Auth::user();

        if ($post and $post->status == "inactive") {
            $status = $post->update(['status' => 'active' ]);

            if ($status) {

                Notification::send($post->user, new PostChangeStatusNotification($post));

                return response()->json(['msg' => 'the status updated successffuly', 'status' => 1]);
            } else {
                return response()->json(['msg' => 'Something Went Wrong',  'status' => 0]);
            }
        } else {
            return response()->json(['msg' => 'Something Went Wrong',  'status' => 0]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type == 'user') {
            return back()->with('error', "you can't create post now please wiate the admin to aprove you");
        } else {
            return view('dashboard.posts.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $image_path = $image->store('posts', 'uploads');

            $request->merge(['image_path' => $image_path]);
        }

        $post = Post::create([
            "image_path" => $request->image_path,
            "title" => $request->post('title'),
            "summary" => $request->post('summary'),
            "body" => $request->post('body'),
            "user_id" => Auth::user()->id,
            "status" => Auth::user()->type == 'admin' ? 'active':'inactive',
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->syncWithoutDetaching($tag->id);
        }

        $categories = explode(',', $request->categories);

        foreach ($categories as $category) {
            $category = Category::firstOrCreate(['name' => $category]);
            $post->categories()->syncWithoutDetaching($category->id);
        }

        if ($post->status == 'inactive') {
            $users = User::where('type','admin')->get();

            Notification::send($users, new PostCreateNotification($post));
        }

        return redirect()->route('posts.index')->with('success', 'the post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::withoutGlobalScope('active')->find($id);

        if ($post) {
            return view('dashboard.posts.show', compact('post'));
        } else {
            return back()->with('error', 'Spething Went Wrong The Post Not Found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::withoutGlobalScope('active')->find($id);

        if ($post) {
            return view('dashboard.posts.edit', compact('post'));
        }

        return back()->with('error', 'Something Went Wrong The Post Not Found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::withoutGlobalScope('active')->find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Storage::disk('uploads')->delete($post->image_path);

            $image_path = $image->store('posts', 'uploads');

            $request->merge(['image_path' => $image_path]);
        }

        $post->update([
            "title" => $request->post('title'),
            "body" => $request->post('body'),
            "user_id" => Auth::user()->id,
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->syncWithoutDetaching($tag->id);
        }

        $categories = explode(',', $request->categories);

        foreach ($categories as $category) {
            $category = Category::firstOrCreate(['name' => $category]);
            $post->categories()->syncWithoutDetaching($category->id);
        }

        return redirect()->route('posts.index')->with('success', 'the post created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withoutGlobalScope('active')->find($id);

        if ($post) {
            $status = $post->delete();
            Storage::disk('uploads')->delete($post->image_path);
            if ($status) {
                return redirect()->route('posts.index')->with('success', 'the post deleted successfuly');
            } else {
                return redirect()->route('posts.index')->with('error', 'Something Went Wrong');
            }
        } else {
            return redirect()->route('posts.index')->with('error', 'Something Went Wrong the Post Not Found');
        }
    }
}
