@extends('dashboard.layouts.app')

@section('page_title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="default-color">{{__('Users')}}</a></li>
    <li class="breadcrumb-item active">{{__('Create')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Name')}}</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('name')}}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Email')}}</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('email')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{__('Type')}}</label>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="type" id="type-admin" class="custom-control-input" value="admin">
                                <label for="type-admin" class="custom-control-label">{{__('Admin')}}</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="type" id="type-blogger" class="custom-control-input" value="blogger">
                                <label for="type-blogger" class="custom-control-label">{{__('Blogger')}}</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="type-user" name="type" class="custom-control-input" value="user">
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
                                            <input type="checkbox" name="roles[{{ $role->name }}]" value="{{ $role->id }}" class="role @error('roles') is-invalid @enderror">
                                            @error('roles')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>{{ __($role->name) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Add User')}}</button>
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
