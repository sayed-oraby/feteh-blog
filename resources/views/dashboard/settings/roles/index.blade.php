@extends('dashboard.layouts.app')

@section('page_title', __('Roles'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Roles') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{ __('Roles') }}</h5>
                        </div>
                        <div class="d-block d-md-flex clearfix sm-mt-20">
                            <div class="clearfix">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus p-1"></i>
                                    {{ __('Add Role') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-15">
                        <table class="table table-bordered center-aligned-table mb-1">
                            <tr>
                                <th width="1%">No</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Permissions')}}</th>
                                <th width="3%" colspan="2">{{__('Actions')}}</th>
                            </tr>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ __($role->name) }}</td>
                                    <td>
                                        @foreach ($role->permissions as $key => $value)
                                            <span class="badge bg-info bg-lg text-white">{{ __($value) }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('roles.edit', $role->id) }}">{{__('Edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="post"
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
                            {!! $roles->links() !!}
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
