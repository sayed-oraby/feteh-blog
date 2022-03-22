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

        <small class="comment-text">{{ $comment->content }}</small>

        <div class="d-flex flex-row align-items-center status">
            <small class="mr-2 reply" data-id="{{ $comment->id }}" style="cursor: pointer">Reply</small>
            <small class="mr-2">{{ $comment->created_at->diffForHumans() }}</small>
        </div>

        @if ($comment->replies->count() > 0)
            @foreach ($comment->replies as $reply)
                @include('website.posts.incloud', ["comment" => $reply])
            @endforeach
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
        </div>
    </div>
</div>
