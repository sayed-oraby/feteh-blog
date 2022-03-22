@extends('dashboard.layouts.app')

@section('page_title', __('Roles'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="default-color">{{ __('Roles') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
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

                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">{{__('Name')}}</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="table-responsive mt-15">
                            <label for="permissions" class="form-label">{{__('Assign Permissions')}}</label>
                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                    <th scope="col" width="20%">{{__('Name')}}</th>
                                </thead>

                                @foreach (config('permissions') as $key => $value)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="permissions[{{ $key }}]"
                                                value="{{ $value }}" class='permission'>
                                        </td>
                                        <td>{{ __($value) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Add Role')}}</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-default">{{__('Back')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endsection
