@extends('dashboard.layouts.app')

@section('page_title', __('Posts'))

@section('header')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/switch-button-bootstrap/css/bootstrap-switch-button.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Posts') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if (Auth::user()->type == 'user')
                        <div class="alert alert-warning">
                            <strong>Warning!</strong> You Can't Create Post Wait The Admin To Approve on Your request.<br><br>
                        </div>
                    @endif

                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{ __('Posts') }}</h5>
                        </div>
                        <div class="d-block d-md-flex clearfix sm-mt-20">
                            <div class="clearfix">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus p-1"></i>
                                    {{ __('Add Post') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-1">
                            <tr>
                                <th width="1%">{{ __('No.') }}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Summary')}}</th>

                                @if (Auth::user()->type == 'admin')
                                    <th>{{__('Auther')}}</th>
                                @endif

                                <th>{{__('Status')}}</th>
                                <th width="3%" colspan="3">{{__('Actions')}}</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ Str::limit($post->summary, 100, '......') }}</td>
                                    @if (Auth::user()->type == 'admin')
                                        <td>{{ $post->user->name }}</td>
                                    @endif
                                    <td>
                                        @if (Auth::user()->type == 'admin')
                                            <input type="checkbox" name="toogle" value="{{ $post->id }}"
                                                data-toggle="switchbutton"
                                                {{ $post->status == 'active' || Auth::user()->type != 'admin' ? 'disabled':'' }}
                                                {{ $post->status == 'active' ? 'checked' : '' }}
                                                data-onlabel={{__("Active")}}
                                                data-offlabel={{__("Inactive")}}
                                                data-onstyle="success"
                                                data-offstyle="danger"
                                                data-size="sm">
                                        @else
                                            <span style="padding: 5px 10px; border-radius: 20px; @if($post->status == 'active') border: 1px solid green; color: green @else border: 1px solid #dc3545; color: #dc3545 @endif">
                                                {{ $post->status }}
                                            </span>
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('posts.show', $post->id) }}">{{__('View')}}</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('posts.edit', $post->id) }}">{{__('Edit')}}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post"
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
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/dashboard/plugins/switch-button-bootstrap/dist/bootstrap-switch-button.min.js') }}"></script>
    <script type="text/javascript">
        $('input[name = toogle]').change(function(e) {
            var id = $(this).val();
            var mode = $(this).prop('checked');

            if (mode) {
                $.ajax({
                    url:"{{ route('post.changeStatus') }}",
                    type:"POST",
                    data:{
                        _token:"{{ csrf_token() }}",
                        id: id
                    },
                    success:function(response) {
                        if (response.status) {
                            swal({
                                text: response.msg,
                                type: 'success'
                            });
                        } else {
                            swal({
                                text: response.msg,
                                type: 'error'
                            });
                        }
                    }
                });
            } else {
                swal({
                    text: "you can't do that!",
                    type: 'error'
                });
            }
        })
    </script>
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
