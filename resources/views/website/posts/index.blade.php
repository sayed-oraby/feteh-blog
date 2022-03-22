@extends('website.layouts.app')

@section('breadcrumb')
    <li class="trail-item trail-begin"><a href="{{ route('website') }}"><span>Home</span></a></li>
    <li class="trail-item trail-end active"><span>Posts</span></li>
@endsection

@section('articale')
    <div class="blog-standard content-post">
        @foreach ($posts as $post)
            <article
                class="post-item post-standard post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                <div class="post-thumb">
                    <a href="{{ route('articles.show', $post->id) }}">
                        <img src="{{ asset('uploads/'. $post->image_path) }}"
                            class="img-responsive attachment-1170x768 size-1170x768" alt="img" width="1170" height="768"></a>
                </div>

                <div class="post-info">
                    <h2 class="post-title">
                        <a href="{{ route('articles.show', $post->id) }}">{{ $post->title }}</a>
                    </h2>

                    <div class="post-meta">
                        <div class="date">
                            <a href="#">{{ $post->created_at->diffForHumans() }}</a>
                        </div>
                        <div class="post-author">
                            <a href="#">By :  {{ $post->user->name }} </a>
                        </div>
                        <div class="post-author">
                            <a href="#">Comments :  {{ $post->comments->count() }} </a>
                        </div>
                    </div>
                </div>
                <div class="post-content">{{ $post->summary }}</div>
                <a href="{{ route('articles.show', $post->id) }}" class="readmore">Read more</a>
            </article>
        @endforeach
    </div>
    @if ($posts->isNotEmpty())
        <nav class="navigation pagination">
            <div class="nav-links">
                {!! $posts->withQueryString()->links() !!}
            </div>
        </nav>
    @endif
@endsection
