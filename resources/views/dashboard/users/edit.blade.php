@extends('dashboard.layouts.app')

@section('page_title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="default-color">{{__('Users')}}</a></li>
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

                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('Patch')

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Name')}}</label>
                            <input type="text" value="{{ old('name')? old('name'):$user->name }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Email')}}</label>
                            <input type="email" value="{{ old('email')? old('email'):$user->email }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Type')}}</label>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="type" id="type-admin" class="custom-control-input" @if ($user->type == 'admin') checked @endif value="admin">
                                <label for="type-admin" class="custom-control-label">{{__('Admin')}}</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="type" id="type-blogger" class="custom-control-input" @if ($user->type == 'blogger') checked @endif value="blogger">
                                <label for="type-blogger" class="custom-control-label">{{__('Blogger')}}</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="type-user" name="type" class="custom-control-input" @if ($user->type == 'user') checked @endif value="user">
                                <label class="custom-control-label" for="type-user">{{__('User')}}</label>
                            </div>
                        </div>

                        <div class="table-responsive mt-15">
                            <label for="permissions" class="form-label">{{__('Assign Roles')}}</label>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_roles"></th>
                                    <th scope="col" width="20%">{{__('Name')}}</th>
                                </thead>

                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="roles[{{ $role->name }}]"
                                                value="{{ $role->id }}" @if(in_array($role->name,$user->roles()->pluck('name')->toArray())) checked @endif class='role'>
                                        </td>
                                        <td>{{ __($role->name) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Update User')}}</button>
                        <a href="{{ route('users.index') }}" class="btn btn-default">{{__('Back')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_roles"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.role'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.role'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
