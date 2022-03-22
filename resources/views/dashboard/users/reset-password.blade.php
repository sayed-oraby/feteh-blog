@extends('dashboard.layouts.app')

@section('page_title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('profile.index') }}" class="default-color">{{__('Edit')}}</a></li>
    <li class="breadcrumb-item active">{{__('Reset Password')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">Reset Password</h5>
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

                    <form action="{{ route('user.reset.password') }}" method="post">
                        @csrf
                        @method('Put')

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Current Password')}}</label>
                            <input type="password" name="curent_password" class="form-control @error('curent_password') is-invalid @enderror">

                            @error('curent_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('New Password')}}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Confirm Password')}}</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">

                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Reset Password')}}</button>
                        <a href="{{ route('profile.edit', Auth::user()->profile->id) }}" class="btn btn-default">{{__('Back')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
