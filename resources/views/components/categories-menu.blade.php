<div id="categories-3" class="widget widget_categories">
    <h2 class="widgettitle">Categories<span class="arrow"></span></h2>
    <ul>
        @foreach ($categories as $category)
            <li class="cat-item cat-item-51">
                <a href="{{ route('search').'?category='.$category->name }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
