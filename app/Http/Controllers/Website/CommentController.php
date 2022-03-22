<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Guest;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if (Auth::user()) {
            Comment::create([
                'user_id' => Auth::user()->id,
                'content' => $request->post('comment'),
                "post_id" => $request->post('post_id'),
                "comment_id" => $request->post('comment_id')
            ]);

            return back();
        } else {
            if (Cookie::get('blogGuestId')){
                $comment = Comment::create([
                    'guest_id' => Cookie::get('blogGuestId'),
                    'content' => $request->post('comment'),
                    "post_id" => $request->post('post_id'),
                    "comment_id" => $request->post('comment_id')
                ]);
            } else {
                $guest = Guest::firstOrCreate([
                    "name" => $request->post('name'),
                    "email" => $request->post('email'),
                ]);

                if ($guest) {
                    $comment = Comment::create([
                        'guest_id' => $guest->id,
                        'content' => $request->post('comment'),
                        "post_id" => $request->post('post_id'),
                        "comment_id" => $request->post('comment_id')
                    ]);

                    $cookie = Cookie::make('blogGuestId', $guest->id, 30);

                    return back()->withCookie($cookie);
                }
            }

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
