@extends('dashboard.layouts.app')

@section('page_title', __('User'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="default-color">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('View') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="p-4 text-center bg-success" style="height: 180px">
                    <h5 class="mb-70 mt-20 text-white">{{ $user->name }}</h5>
                    <div class="btn-group info-drop">
                        <button type="button" class="dropdown-toggle-split text-white" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                        <div class="dropdown-menu">
                            @if ($user->type == 'user')
                                <form action="{{ route('aprove.blogger', $user->id) }}" method="post" class="dropdown-item p-0">
                                    @csrf
                                    @method('put')

                                    <button class="dropdown-item" type="submit">
                                        <i class="text-primary ti-files"></i> Approve
                                    </button>
                                </form>
                            @endif
                            <a class="dropdown-item" href="#">
                                <i class="text-dark ti-pencil-alt"></i> Edit Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="text-success ti-user"></i> View Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="text-secondary ti-info"></i> Contact Info
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="avatar-top text-center">
                        <img class="img-fluid w-10 rounded-circle" src="{{asset('uploads/'. $user->profile->photo) }}" style="width: 10% !important" alt="">
                    </div>
                    <p class="mt-30 text-center">{{ $user->email }}</p>
                    <div class="divider mt-20"></div>
                    <div class="row text-center">
                        <div class="col-6 col-sm-6 mt-30">
                            <b>{{__('Posts')}}</b>
                            <h4 class="text-success mt-10">{{ $user->posts->count() }}</h4>
                        </div>
                        <div class="col-6 col-sm-6 mt-30">
                            <b>{{__('Views')}}</b>
                            <h4 class="text-warning mt-10">{{ array_sum($user->posts()->pluck('total_views')->toArray()) }}</h4>
                        </div>
                    </div>
                    {{-- <div class="divider mt-20"></div>
                    <div class="mt-20">
                        <label for="" class="form-lable fs-16">{{ __('Roles') }}</label>
                        <ul>
                            @foreach ($user->roles as $role)
                                <li class="ml-10 mr-10">{{ __($role->name) }}</li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
