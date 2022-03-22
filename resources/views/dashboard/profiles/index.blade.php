@extends('dashboard.layouts.app')

@section('page_title', __('Profile'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection

@section('content')
    <div class="profile-page">
        <!-- User Info -->
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="user-bg" style="background: url({{ asset('assets/dashboard/images/user-bg.jpg')}});">
                            <div class="user-info">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center">
                                        <div class="user-dp" style="width: 150px">
                                            <img style="max-height: 120px;" src="{{ asset('uploads/' . $profile->photo) }}" alt="">
                                        </div>

                                        <div class="user-detail">
                                            <h2 class="name">{{ $profile->user->name }}</h2>
                                            <p class="designation mb-0">{{ $profile->user->roles()->value('name') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-right align-self-center">
                                        <a class="btn btn-sm btn-success text-white" href="{{ route('profile.edit') }}">
                                            <i class="fa fa-edit"></i>
                                            {{__('Edit')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 mb-30">
                <div class="card mb-30 about-me">
                    <div class="card-body">
                        <h5 class="card-title">{{__('About Me')}}</h5>
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('profile.edit', $profile->id) }}">
                                    <i class="text-success ti-pencil-alt"></i>
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                        <div class="mb-1">
                            <p>{!! $profile->description !!}</p>
                        </div>
                        <ul class="list-unstyled ">
                            @if ($profile->phone)
                                <li class="list-item">
                                    <span class="text-info fa fa-phone"></span>
                                    <span>{{ $profile->phone }}</span>
                                </li>
                            @endif
                            <li class="list-item">
                                <span class="text-warning ti-email"></span>
                                <span>{{ $profile->user->email }}</span>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-8 mb-30">
                <div class="card tickets">
                    <div class="card-body">
                        <h5 class="card-title"> Support Tickets</h5>
                        <!-- action group -->
                        <div class="btn-group info-drop">
                            <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="text-success ti-thumb-up"></i> Mark As Read</a>
                                <a class="dropdown-item" href="#">
                                    <i class="text-danger ti-trash"></i> Delete all</a>
                            </div>
                        </div>
                        {{-- <div class="scrollbar max-h-550 tickets-info">
                            <ul class="list-unstyled">
                                <li class="mb-15">
                                    <div class="media">
                                        <div class="position-relative clearfix">
                                            <img class="img-fluid mr-15 avatar-small" src="{{ asset('assets/dashboard/images/team/02.jpg') }}" alt="">
                                            <i class="avatar-online bg-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 ">Paul Flavius
                                                <small class="float-right">Just now</small>
                                            </h6>
                                            <a href="#">title</a>
                                            <p class="mt-10">body</p>
                                        </div>
                                    </div>
                                    <div class="divider mt-15"></div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- wrapper -->


    </div>
@endsection
