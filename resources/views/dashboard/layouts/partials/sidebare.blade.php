<!-- Left Sidebar -->
<div class="side-menu-fixed" style="z-index: 900 !important; top: 65px !important">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <li class="sidebare-avatar text-center pt-15">
                <div class="position-relative clearfix">
                    <img class="img-fluid mr-15" style="margin: 0 !important; width: 85px !important; height: 85px !important; border: 3px solid white; border-radius: 50%;" src="{{ asset('uploads/'. Auth::user()->profile->photo) }}" alt="">
                    <i class="avatar-online bg-success" style="right: 88px !important"></i>
                </div>
                <div class="media">
                    <div class="media-body mb-10">
                        <h5 class="mt-10 mb-0 text-white">{{ Auth::user()->name }}</h5>
                        <span class="text-white">{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </li>
            {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('WebSite')}}</li> --}}
            <!-- menu item Website-->
            <li>
                <a href="{{ route('website') }}" target="_blank">
                    <i class="fa fa-th-large"></i>
                    <span class="right-nav-text">{{ __('WebSite') }}</span>
                </a>
            </li>
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{__('Dashboard')}}</li>
            <!-- menu item Dashboard-->
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="ti-home"></i>
                    <span class="right-nav-text">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <!-- menu title -->
            {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components</li> --}}
            <!-- menu item posts-->

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#posts">
                    <div class="pull-left">
                        <i class="fa fa-image"></i>
                        <span class="right-nav-text">{{ __('Posts') }}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="posts" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('posts.index') }}">{{ __('All Posts') }}</a></li>
                    <li><a href="{{ route('posts.create') }}">{{ __('Create Post') }}</a></li>
                </ul>
            </li>

            <!-- menu item users-->
            @can('users.view-any')
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                        <div class="pull-left">
                            <i class="fa fa-address-book-o"></i>
                            <span class="right-nav-text">{{ __('Users') }}</span>
                        </div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="users-menu" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{ route('users.index') }}">{{ __('All Users') }}</a></li>
                        @can('users.create')
                            <li> <a href="{{ route('users.create') }}">{{ __('Create User') }}</a></li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <!-- menu item settings-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#setting-menu">
                    <div class="pull-left">
                        <i class="fa fa-cog"></i>
                        <span class="right-nav-text">{{ __('Setting') }}</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="setting-menu" class="collapse" data-parent="#setting-menu">
                    @can('roles.view-any')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles">
                                {{ __('Roles') }}
                                <div class="pull-right">
                                    <i class="ti-plus"></i>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="roles" class="collapse">
                                <li><a href="{{ route('roles.index') }}">{{ __('All Roles') }}</a></li>
                                <li><a href="{{ route('roles.create') }}">{{ __('Create Role') }}</a></li>
                            </ul>
                        </li>
                    @endcan
                    <li> <a href="{{ route('profile.index') }}">{{ __('Profile') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Left Sidebar End-->
