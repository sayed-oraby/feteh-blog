<header id="header" class="header style-04 header-sticky">
    <div class="header-middle">
        <div class="header-middle-inner">
            <div class="header-search-mid">
                <div class="header-search">
                    <div class="block-search">
                        <form role="search" method="get" action="{{ route('search') }}" class="form-search block-search-form kaycee-live-search-form">
                            <div class="form-content search-box results-search">
                                <div class="inner">
                                    <input autocomplete="off" class="searchfield txt-livesearch input" name="name" value=""
                                        placeholder="Search here..." type="text">
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">
                                <span class="flaticon-magnifying-glass-1"></span>
                            </button>
                        </form><!-- block search -->
                    </div>
                </div>
            </div>
            <div class="header-logo-menu">
                <div class="block-menu-bar">
                    <a class="menu-bar menu-toggle" href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
            @auth
                <div class="header-control">
                    <div class="header-control-inner">
                        <div class="meta-dreaming">
                            <div class="menu-item block-user block-dreaming kaycee-dropdown">
                                <a class="block-link" href="{{ route('profile.index') }}" target="_blank">
                                    <span class="flaticon-profile"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li
                                        class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--dashboard is-active">
                                        <a href="{{ route('dashboard') }}" target="_blank">Dashboard</a>
                                    </li>
                                    {{-- <li
                                        class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--orders">
                                        <a href="#">Orders</a>
                                    </li>
                                    <li
                                        class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--downloads">
                                        <a href="#">Downloads</a>
                                    </li>
                                    <li
                                        class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--edit-address">
                                        <a href="#">Addresses</a>
                                    </li> --}}
                                    <li
                                        class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--edit-account">
                                        <a href="{{ route('profile.index') }}" target="_blank">Account details</a>
                                    </li>
                                    <li class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--customer-logout">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <input type="submit" value="Logout" style="cursor: pointer;
                                                                                            background-color: white;
                                                                                            color: black;
                                                                                            font-weight: normal;
                                                                                            font-size: medium;
                                                                                            padding: 0;
                                                                                            margin: 0;">
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <div class="header-control">
                    <a href="{{ route('login') }}">Login</a>
                    <span> / </span>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            @endguest

        </div>
    </div>

    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-nav">
                <div class="container">
                    <div class="kaycee-menu-wapper"></div>
                    <div class="header-nav-inner">
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu kaycee-clone-mobile-menu kaycee-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kaycee-menu-item-title" title="Home"
                                        href="{{ route('website') }}">Home</a>
                                    {{-- <span class="toggle-submenu"></span> --}}
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kaycee-menu-item-title" title="Shop"
                                        href="{{ route('articles.index') }}">Posts</a>
                                    {{-- <span class="toggle-submenu"></span> --}}
                                </li>
                                <li id="menu-item-237"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent">
                                    <a class="kaycee-menu-item-title" title="Pages" href="#">Pages</a>
                                    <span class="toggle-submenu"></span>
                                    <ul role="menu" class="submenu">
                                        <li id="menu-item-987"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-987">
                                            <a class="kaycee-menu-item-title" title="About" href="about.html">About</a>
                                        </li>
                                        <li id="menu-item-988"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-988">
                                            <a class="kaycee-menu-item-title" title="Contact"
                                                href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>

            <div class="header-search kaycee-dropdown">
                <div class="header-search-inner" data-kaycee="kaycee-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-magnifying-glass-1"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form role="search" method="get" action="{{ route('search') }}" class="form-search block-search-form kaycee-live-search-form">
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="name" value=""
                                    placeholder="Search here..." type="text">
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">
                            <span class="flaticon-magnifying-glass-1"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
        </div>

        @auth
            <div class="header-mobile-right">
                <div class="header-control-inner">
                    <div class="meta-dreaming">
                        <div class="menu-item block-user block-dreaming kaycee-dropdown">
                            <a class="block-link" href="{{ route('profile.index') }}">
                                <span class="flaticon-profile"></span>
                            </a>
                            <ul class="sub-menu">
                                <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--dashboard is-active">
                                    <a href="{{ route('dashboard') }}" target="_blabk">Dashboard</a>
                                </li>
                                {{-- <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--orders">
                                    <a href="#">Orders</a>
                                </li>
                                <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--downloads">
                                    <a href="#">Downloads</a>
                                </li>
                                <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--edit-address">
                                    <a href="#">Addresses</a>
                                </li> --}}
                                <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--edit-account">
                                    <a href="{{ route('profile.index') }}" target="_blabk">Account details</a>
                                </li>
                                <li
                                    class="menu-item kaycee-MyAccount-navigation-link kaycee-MyAccount-navigation-link--customer-logout">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <input type="submit" value="Logout" style="cursor: pointer;
                                                                                        background-color: white;
                                                                                        color: black;
                                                                                        font-weight: normal;
                                                                                        font-size: medium;
                                                                                        padding: 0;
                                                                                        margin: 0;">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <div class="header-control">
                <a href="{{ route('login') }}">Login</a>
                <span> / </span>
                <a href="{{ route('register') }}">Register</a>
            </div>
        @endguest
    </div>
</header>
