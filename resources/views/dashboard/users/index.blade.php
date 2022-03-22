@extends('dashboard.layouts.app')

@section('page_title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Users') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{ __('Users') }}</h5>
                        </div>
                        <div class="d-block d-md-flex clearfix sm-mt-20">
                            <div class="clearfix">
                                @can('users.create')
                                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus p-1"></i>
                                        {{ __('Add User') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-1">
                            <tr>
                                <th width="1%">{{__('No.')}}</th>
                                <th>{{__('Member')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Type')}}</th>
                                <th>{{__('Role')}}</th>
                                <th width="3%" colspan="3">{{__('Actions')}}</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="img-fluid avatar-small" style="height: 50px !important; width: 50px !important;" src="{{asset('uploads/'. $user->profile->photo)}}" alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-info bg-lg text-white">{{ __($role->name) }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('users.show', $user->id) }}">{{__('View')}}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('users.edit', $user->id) }}">{{__('Edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="{{__('Delete')}}" class="btn btn-danger btn-sm delete-btn">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.delete-btn').click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();
            swal({
                title: "{{__('Are you sure?')}}",
                text: "{{__('You will not be able to revert this!')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('Yes')}}",
                cancelButtonText: "{{__('Cancel')}}",
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        });
    </script>
@endsection
