<div class="sidebar kaycee_sidebar col-xl-3 col-lg-4 col-md-12 col-sm-12">
    <div id="widget-area" class="widget-area sidebar-blog">
        <div id="search-3" class="widget widget_search">
            <form role="search" method="get" action="{{ route('search') }}" class="search-form">
                <input class="search-field" placeholder="Your search here…" name="name" type="search">
                <button type="submit" class="search-submit"><span class="fa fa-search"
                        aria-hidden="true"></span></button>
                <input name="lang" value="en" type="hidden">
            </form>
        </div>

        <x-categories-menu />

        <x-recently-post-menu />

        <x-tags-menu />

    </div><!-- .widget-area -->
</div>
