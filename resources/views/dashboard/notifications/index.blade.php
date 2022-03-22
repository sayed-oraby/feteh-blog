@extends('dashboard.layouts.app')

@section('page_title', __('Users'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Notifications') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{ __('Notifications') }}</h5>
                        </div>
                    </div>
                    <div>
                        @foreach ($notifications as $notification)
                            <a href="{{ route('notifications.show', $notification->id) }}" class="dropdown-item"
                                @if($notification->unread()) style="background-color: #fafafa" @endif>
                                <span>{{ $notification->data['title'] }}</span>
                                <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
                                <p class="pl-2 pr-2">{{ $notification->data['body'] }}</p>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
