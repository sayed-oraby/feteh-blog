@extends('dashboard.layouts.app')

@section('page_title', __('Profile'))

@section('header')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profile.index') }}" class="default-color">{{__('Profile')}}</a></li>
    <li class="breadcrumb-item active">{{__('Edit')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">Edit Profile</h5>
                        </div>
                        <div class="d-block d-md-flex clearfix sm-mt-20">
                            <div class="clearfix">
                                <a class="btn btn-primary" href="{{ route('create.reset.password') }}">{{ __('Reset Password') }}</a>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('Patch')

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Name')}}</label>
                            <input type="text" value="{{ old('name')? old('name'):Auth::user()->name }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Email')}}</label>
                            <input type="email" value="{{ old('email')? old('email'):Auth::user()->email }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Phone')}}</label>
                            <input type="text" value="{{ old('phone')? old('phone'):Auth::user()->Profile->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="phone">

                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Photo')}}</label>
                            <input type="file" value="{{ old('image')? old('image'):Auth::user()->Profile->phone }}" name="image" class="form-control @error('image') is-invalid @enderror">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Description')}}</label>
                            <textarea class="summernote" name="description">{{ Auth::user()->Profile->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Gender')}}</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male" @if (Auth::user()->Profile->gender == 'male') checked @endif>
                                <label class="custom-control-label" for="customRadio1">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female" @if (Auth::user()->Profile->gender == 'female') checked @endif>
                                <label class="custom-control-label" for="customRadio2">Female</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Add Profile')}}</button>
                        <a href="{{ route('profile.index') }}" class="btn btn-default">{{__('Back')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/summernote/lang/summernote-ar-AR.js') }}"></script>
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
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                lang: "{{ App::getLocale() == 'ar' ? 'ar-AR':'en-US' }}",
                tooltip: null,
                height: '100px',
            });
        });
    </script>
@endsection
