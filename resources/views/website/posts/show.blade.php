@extends('website.layouts.app')

@section('breadcrumb')
    <li class="trail-item trail-begin"><a href="{{ route('website') }}"><span>Home</span></a></li>
    <li class="trail-item"><a href="{{ route('articles.index') }}"><span>Posts</span></a></li>
    <li class="trail-item trail-end active"><span>Show</span></li>
@endsection

@section('head')
    <style>
        .comment-form .comment-form-comment textarea {
            height: 100% !important;
            min-width: 400px !important;
        }
    </style>
@endsection

@section('articale')
    <div class="blog-standard content-post">
        <article
            class="post-item post-single post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
            <div class="single-post-thumb">
                <div class="post-thumb">
                    <img src="{{ asset('uploads/'.$post->image_path) }}" class="attachment-full size-full wp-post-image" alt="img">
                </div>
            </div>

            <div class="single-post-info">
                <h2 class="post-title">
                    <a href="#">{{ $post->title }}</a>
                </h2>
                <div class="post-meta">
                    <div class="date">
                        <a href="#">{{ $post->created_at->diffForHumans() }}</a>
                    </div>
                    <div class="post-author">
                        By:<a href="#"> {{ $post->user->name }} </a>
                    </div>
                </div>
            </div>

            <div class="post-content">
                {!! $post->body !!}
            </div>

            <div class="tags">
                @foreach ($post->tags as $tag)
                    <a href="#" rel="tag">{{ $tag->name }}</a>
                @endforeach
            </div>

            <div class="post-footer">
                <div class="categories">
                    <span>Categories: </span>
                    @foreach ($post->categories as $category)
                        <a href="#" class="ml-1 mr-1">{{ $category->name }}</a>,
                    @endforeach
                </div>
            </div>
        </article>

        <div id="comments" class="comments-area">
            <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">Leave a comment</h3>

                <form id="commentform" class="comment-form" action="{{ route('comments.store') }}" method="POST">
                    @csrf

                    <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>
                        Required fields are marked <span class="required">*</span>
                    </p>

                    @guest

                        @php
                            $guest = App\Models\Guest::find(Cookie::get('blogGuestId'));
                        @endphp

                        <p class="comment-reply-content">
                            <input name="name" id="name" class="input-form name" value="{{ $guest? $guest->name:'' }}" placeholder="Name*" type="text">
                        </p>
                        <p class="comment-reply-content">
                            <input name="email" id="email" class="input-form email" value="{{ $guest? $guest->email:'' }}" placeholder="Email*" type="text">
                        </p>
                    @endguest

                    <p class="comment-form-comment">
                        <textarea class="input-form" id="comment" name="comment" cols="45" rows="6" aria-required="true"
                            placeholder="Enter you comment here..."></textarea>
                    </p>
                    <input name="post_id" value="{{ $post->id }}" type="hidden">
                    <p class="form-submit">
                        <input id="submit" class="submit" value="Post a comment" type="submit" style="cursor: pointer">
                    </p>
                </form>
            </div>
            <!-- #respond -->
        </div>

        @if ($post->comments)
            <div id="comments" class="comments-area">
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Comments</h3>

                    @foreach ($post->comments as $comment)
                        @if (! $comment->comment_id)
                            <div class="d-flex flex-row mb-2">

                                @if ($comment->user)
                                    <img src="{{ asset('uploads/'.$comment->user->Profile->photo) }}" style="border-radius: 50%; width: 50px; height: 50px">
                                @else
                                    <img src="{{ asset('uploads/'.$comment->guest->photo) }}" style="border-radius: 50%; width: 50px; height: 50px">
                                @endif

                                <div class="d-flex flex-column m-2 mt-0">
                                    @if ($comment->user)
                                        <span class="name">{{ $comment->user->name }}</span>
                                    @else
                                        <span class="name">{{ $comment->guest->name }}</span>
                                    @endif

                                    <small class="comment-text">
                                        {{ $comment->content }}
                                    </small>

                                    <div class="d-flex flex-row align-items-center status">
                                        <small class="mr-2 reply" data-id="{{ $comment->id }}" style="cursor: pointer">Reply</small>
                                        <small class="mr-2">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>

                                    @if ($comment->replies->count() > 0)
                                        @include('website.posts.comments', ["comment" => $comment])
                                    @endif

                                    <div id="reply{{ $comment->id }}" class="comments-area d-none">
                                        <div id="respond" class="comment-respond">
                                            <form id="commentform" class="comment-form" action="{{ route('comments.store') }}" method="POST">
                                                @csrf

                                                @guest
                                                    <p class="comment-reply-content">
                                                        <input name="name" id="name" class="input-form name" placeholder="Name*" type="text">
                                                    </p>
                                                    <p class="comment-reply-content">
                                                        <input name="email" id="email" class="input-form email" placeholder="Email*" type="text">
                                                    </p>
                                                @endguest

                                                <p class="comment-form-comment">
                                                    <textarea class="input-form" id="comment" name="comment" aria-required="true"
                                                        placeholder="Enter you comment here..."></textarea>
                                                </p>
                                                <input name="post_id" value="{{ $post->id }}" type="hidden">
                                                <input name="comment_id" value="{{ $comment->id }}" type="hidden">
                                                <p class="form-submit">
                                                    <input id="submit" class="submit" value="Reply" type="submit" style="cursor: pointer">
                                                </p>
                                            </form>
                                        </div>
                                        <!-- #respond -->
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        @endif

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.reply').click(function(e){
                var id = $(this).data('id');

                // $('#reply'+id).toggleClass('d-none');

                if ($('#reply'+id).hasClass('d-none')) {
                    $('.commentReply').addClass('d-none');
                    $('#reply'+id).removeClass('d-none')
                } else {
                    $('.commentReply').addClass('d-none');
                }
            });
        });
    </script>
@endsection
