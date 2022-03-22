@extends('dashboard.layouts.app')

@section('page_title', __('Post'))

@section('header')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/inputTags/inputTags.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="default-color">{{__('Posts')}}</a></li>
    <li class="breadcrumb-item active">{{__('Edit')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post->id) }}" method="post" onkeydown="return event.key != 'Enter';" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Title')}}</label>
                            <input type="text" value="{{ old('title') ? old('title'):$post->title }}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Summary')}}</label>
                            <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" rows="3">{{ old('summary')? old('summary'):$post->summary }}</textarea>

                            @error('summary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Banner')}}</label>
                            <input type="file" value="{{ old('image') }}" name="image" class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-lable">{{__('Categories')}}</label>
                            <input type="text" class="form-control" id="categories" name="categories" value="{{ old('categories')? old('categories'):$post->categories->implode('name', ',') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-lable">{{__('Tags')}}</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') ? old('tags'):$post->tags->implode('name', ',') }}">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Post')}}</label>
                            <textarea class="summernote" name="body">{{ old('body') ? old('body'):$post->body }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Update Post')}}</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-default">{{__('Back')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/inputTags/inputTags.jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname', 'fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                tooltip: null,
                height: '100px',
            });

            $('#categories').inputTags();
            $('#tags').inputTags();
        });
    </script>
@endsection
