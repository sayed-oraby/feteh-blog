@extends('dashboard.layouts.app')

@section('page_title', __('Dashboard'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="#" class="default-color"></a></li>
@endsection

@section('content')
    <!-- widgets -->
    <div class="row">
        <div class="@if (Auth::user()->type == 'admin') col-xl-3 @else col-xl-4 @endif col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fa fa-image highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{ __('Posts') }}</p>
                            <h4>{{ $postsCount }}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower
                        growth
                    </p>
                </div>
            </div>
        </div>

        <div class="@if (Auth::user()->type == 'admin') col-xl-3 @else col-xl-4 @endif col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-danger">
                                <i class="fa fa-image highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{ __('Posts Inactive') }}</p>
                            <h4>{{ $postsInactive }}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                    </p>
                </div>
            </div>
        </div>

        @if (Auth::user()->type == 'admin')
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ __('Users') }}</p>
                                <h4>{{ $usersCount }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-danger">
                                    <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ __('Users Need Aprove') }}</p>
                                <h4>{{ $userNeedAprove }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="@if (Auth::user()->type == 'admin') col-xl-3 @else col-xl-4 @endif col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-primary">
                                    <i class="fa fa-eye highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ __('Views') }}</p>
                                <h4>{{ array_sum(Auth::user()->posts()->pluck('total_views')->toArray()) }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower
                            growth
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- <div class="mb-30">
        <div class="card h-100">
            <div class="btn-group info-drop">
                <button type="button" class="dropdown-toggle-split text-muted" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="ti-more"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="text-primary ti-reload"></i>Refresh</a>
                    <a class="dropdown-item" href="#"><i class="text-secondary ti-eye"></i>View all</a>
                </div>
            </div>

            <div class="mb-30">
                <div class="card-body">
                    <h5 class="card-title">Bar Chart </h5>
                    <div id="chart-bar" style="height: 320px;"></div>
                    <div class="text-center">
                        <ul class="list-inline card-detail-list m-b-0">
                            <li class="list-inline-item">
                                <i class="fa fa-circle mr-2"></i>Series A
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
            Morris.Bar({
                element: 'chart-bar',
                data: [
                    @foreach ($charts as $key => $value)
                        {y: "", a: {{ $value }} },
                    @endforeach
                ],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['WordPress'],
                hideHover: 'auto',
                resize: true,
                gridLineColor: '#efefef',
                barSizeRatio: .5,
                xLabelAngle: 35,
                barColors: ['#ffc107']
            });
        })
    </script>
@endsection --}}
