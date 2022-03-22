@extends('dashboard.layouts.app')

@section('page_title', __('Posts'))

@section('header')
    <style>
        .tags {
            font-weight: 400;
            line-height: 1.5;
            font-size: 0.95rem;
            font-family: Ubuntu Condensed,sans-serif;
            -webkit-box-direction: normal;
            word-wrap: break-word;
            box-sizing: border-box;
            background-clip: padding-box;
            display: inline-block;
            background-color: #19bc9c;
            border-radius: 3px;
            color: #fff;
            margin: 2px;
            opacity: 1;
            padding: 3px 10px;
            position: relative;
            text-align: center;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('posts.index') }}" class="default-color">{{ __('Posts') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Show') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="p-10">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <p style="font-weight: bold; font-size: 18px">{{ $post->title }}</p>
                                <p>{{__('Posted')}} : {{ $post->created_at->diffForHumans() }}</p>
                                <label class="label-form">{{__('Tags')}} : </label>
                                <div class="ml-20 mr-20">
                                    @foreach ($post->tags as $tag)
                                        <span class="tags">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                <label class="label-form">{{__('Categories')}} : </label>
                                <div class="ml-20 mr-20">
                                    @foreach ($post->categories as $category)
                                        <span class="tags">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-block d-md-flex clearfix sm-mt-20">
                                <div class="clearfix">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                                        <i class="fa  fa-edit p-1"></i>
                                        {{ __('Edit') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div>
                            <label class="form-label">{{ __('Summary') }}</label>
                            <p>{{ $post->summary }}</p>
                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="mt-10 mb-10 p-10">
                            <div class="text-center mb-10">
                                <img src="{{ asset('uploads/'.$post->image_path) }}" class="img-fluid" alt="img">
                            </div>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
