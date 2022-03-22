<div id="widget_kaycee_post-2" class="widget widget-kaycee-post">
    <h2 class="widgettitle">Recent
        Post<span class="arrow"></span></h2>
    <div class="kaycee-posts">
        @foreach ($posts as $post)
            <article
                class="post-195 post type-post status-publish format-standard has-post-thumbnail hentry category-light category-table category-life-style tag-light tag-life-style">
                <div class="post-item-inner">
                    <div class="post-thumb">
                        <a href="{{ route('articles.show', $post->id) }}">
                            <img src="{{ asset('assets/website/images/blogpost1-83x83.jpg') }}"
                                class="img-responsive attachment-83x83 size-83x83" alt="img" width="83"
                                height="83">
                        </a>
                    </div>
                    <div class="post-info">
                        <div class="block-title">
                            <h2 class="post-title">
                                <a href="{{ route('articles.show', $post->id) }}">{{ $post->title }}</a>
                            </h2>
                        </div>
                        <div class="date">{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>
