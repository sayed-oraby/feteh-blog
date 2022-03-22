<!-- header start-->

<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="z-index: 1000 !important">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('assets/dashboard/images/logo-dark.png') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('assets/dashboard/images/logo-icon-dark.png') }}"
                alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value=""
                        name="search">
                    <button class="search-button" type="submit">
                        <i class="fa fa-search not-click"></i>
                    </button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <!-- LightSwitcher -->
        <li class="nav-item">
            @if (Session::get('isDark'))
                <a href="{{ route('mode.switch', 0) }}" class="nav-link top-nav" data-toggle="tooltip" title="{{__('Light')}}"><i class="fa fa-sun-o" style="color: white"></i></a>
            @else
                <a href="{{ route('mode.switch', 1) }}" class="nav-link top-nav" data-toggle="tooltip" title="{{__('Dark')}}"><i class="fa fa-moon-o"></i></a>
            @endif
        </li>

        <!-- LanguageSwitcher -->
        <li class="nav-item dropdown">
            <a class="nav-link lang-switcher" data-toggle="dropdown" href="#">
                <span
                    class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }} flag-icon-squared"></span>
                {{ Config::get('languages')[App::getLocale()]['display'] }}
            </a>
            <div class="dropdown-menu">
                @foreach (Config::get('languages') as $code => $language)
                    @if ($code != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $code) }}">
                            <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                            {{ $language['display'] }}
                        </a>
                    @endif
                @endforeach
            </div>
        </li>

        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link" data-toggle="tooltip" title="{{__('Fullscreen')}}">
                <i class="ti-fullscreen"></i>
            </a>
        </li>

        <x-notifications-menu />

        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>Quick Links</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="{{ route('posts.create') }}" class="nav-grid-item">
                        <i class="ti-files text-primary"></i>
                        <h5>{{__('Add Post')}}</h5>
                    </a>
                    <a href="{{ route('website') }}" class="nav-grid-item" target="_blank">
                        <i class="fa fa-th-large" style="color: blue"></i>
                        <h5>{{__('WebSite')}}</h5>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('uploads/'. Auth::user()->profile->photo) }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="min-width: 190px">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="text-warning ti-user"></i>Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->profile->id ) }}"><i class="text-info ti-settings"></i>Settings</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf

                    <button type="submit" class="dropdown-item" style="cursor: pointer">
                        <i class="text-danger ti-unlock"></i>
                        <span>{{__('Logout')}}</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>

<!-- header End-->
