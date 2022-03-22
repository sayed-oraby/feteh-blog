@extends('website.layouts.home-master')

@section('breadcrumb')
    <li class="trail-item  trail-end active"><span>Home</span></li>
@endsection

@section('content')
    <div class="main-container no-sidebar">
        <!-- POST LAYOUT -->
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12 col-sm-12">
                    <div class="blog-grid auto-clear content-post row">
                        @foreach ($posts as $post)
                            <article
                                class="post-item post-grid col-bg-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-ts-12 post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{ route('articles.show', $post->id) }}">
                                            <img src="{{ asset('uploads/'. $post->image_path) }}"
                                                class="img-responsive attachment-370x330 size-370x330" alt="img" width="370"
                                                height="330"> </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <div class="post-author">
                                                <a href="#"> {{ $post->user->name }} </a>
                                            </div>
                                            <div class="date">
                                                <a href="#">{{ $post->created_at->diffForHumans() }}</a>
                                            </div>
                                        </div>
                                        <div class="post-info equal-elem">
                                            <h2 class="post-title"><a href="{{ route('articles.show', $post->id) }}">{{ $post->title }}</a></h2>
                                            <a href="{{ route('articles.show', $post->id) }}">
                                                {{ Str::limit($post->summary, 120, '.....') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                    </div>

                    <nav class="navigation pagination">
                        <div class="nav-links">
                            {!! $posts->withQueryString()->links() !!}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
