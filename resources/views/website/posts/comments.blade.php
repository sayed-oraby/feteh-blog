@foreach ($comment->replies as $reply)
    <div class="d-flex flex-row mb-2">
        @if ($reply->user)
            <img src="{{ asset('uploads/' . $reply->user->Profile->photo) }}"
                style="border-radius: 50%; width: 50px; height: 50px">
        @else
            <img src="{{ asset('uploads/' . $reply->guest->photo) }}"
                style="border-radius: 50%; width: 50px; height: 50px">
        @endif

        <div class="d-flex flex-column m-2 mt-0">
            @if ($reply->user)
                <span class="name">{{ $reply->user->name }}</span>
            @else
                <span class="name">{{ $reply->guest->name }}</span>
            @endif

            <small class="comment-text">
                @if ($reply->parent)
                    <span style="border: 1px solid;
                                border-radius: 8px;
                                padding: 3px 6px;
                                margin: 0 6px;
                                font-size: xs-small;
                                color: white;
                                background-color: rgb(39, 91, 233);">
                        {{ $reply->parent->user ? $reply->parent->user->name : $reply->parent->guest->name }}
                    </span>
                @endif
                {{ $reply->content }}
            </small>

            <div class="d-flex flex-row align-items-center status">
                <small class="mr-2 reply" data-id="{{ $reply->id }}" style="cursor: pointer">Reply</small>
                <small class="mr-2">{{ $reply->created_at->diffForHumans() }}</small>
            </div>

            <div id="reply{{ $reply->id }}" class="comments-area d-none commentReply" style="padding-top: 10px !important">
                <div id="respond" class="comment-respond">
                    <form id="commentform" class="comment-form" action="{{ route('comments.store') }}"
                        method="POST">
                        @csrf

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
                            <textarea class="input-form" id="comment" name="comment" aria-required="true" placeholder="Enter you comment here..."></textarea>
                        </p>

                        <input name="post_id" value="{{ $post->id }}" type="hidden">
                        <input name="comment_id" value="{{ $reply->id }}" type="hidden">

                        <p class="form-submit">
                            <input id="submit" class="submit" value="Reply" type="submit" style="cursor: pointer">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($reply->replies->count() > 0)
        @include('website.posts.comments', ["comment" => $reply])
    @endif
@endforeach
