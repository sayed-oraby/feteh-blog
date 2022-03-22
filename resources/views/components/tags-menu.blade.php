<div id="tag_cloud-3" class="widget widget_tag_cloud">
    <h2 class="widgettitle">Tags<span class="arrow"></span></h2>
    <div class="tagcloud">
        @foreach ($tags as $tag)
            <a href="{{ route('search').'?tag='.$tag->name }}"
                class="tag-cloud-link tag-link-46 tag-link-position-1" aria-label="Earrings (4 items)">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</div>
