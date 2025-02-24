<!-- Single Blog S t a r t -->
<section aria-label="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-read">
                    <img alt="" src="{{ asset('images/blog/'. $blog->featured_image) }}"
                         class="img-fullwidth mb30">
                    <h4 class="title">{{ $blog->title }}</h4>
                    <div class="divider"></div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <div class="info">
                                <i class="ri-user-line"></i>
                                By: {{ $blog->nameAuthor->name }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="donate flex gap-10 align-items-center">
                                <i class="ri-bookmark-fill"></i>
                                {{ $blog->nameBlogCategory->name }}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="donate flex gap-10 align-items-center">
                                <i class="ri-calendar-2-fill"></i>
                                {{ $blog->created_date }} {{ $blog->created_month }} {{ $blog->created_year }}
                            </div>
                        </div>
                    </div>
                    <div class="post-text">
                        <p>{!! nl2br(e($blog->content)) !!}</p>
                    </div>
                </div>
                <div class="spacer-single"></div>
            </div>

            <div id="sidebar" class="col-md-4">
                <div class="widget">
                    <h4>Share With Friends</h4>
                    <div class="small-border"></div>
                    <div class="de-color-icons">
                        <span><i class="fa fa-twitter fa-lg"></i></span>
                        <span><i class="fa fa-facebook fa-lg"></i></span>
                        <span><i class="fa fa-reddit fa-lg"></i></span>
                        <span><i class="fa fa-linkedin fa-lg"></i></span>
                        <span><i class="fa fa-pinterest fa-lg"></i></span>
                        <span><i class="fa fa-stumbleupon fa-lg"></i></span>
                        <span><i class="fa fa-delicious fa-lg"></i></span>
                        <span><i class="fa fa-envelope fa-lg"></i></span>
                    </div>
                </div>

                <div class="widget widget-post">
                    <h4>Recent Posts</h4>
                    <div class="small-border"></div>
                    <ul class="de-bloglist-type-1">
                        @foreach($latest_blogs as $blog)
                            <li>
                                <div class="d-image">
                                    <img src="{{ asset('images/blog/'. $blog->featured_image) }}" alt="">
                                </div>
                                <div class="d-content">
                                    <a href="{{ route('blog.index', ['blog' => $blog->id]) }}">
                                        <h4>{{ strlen($blog->title) > 80 ? substr($blog->title, 0, 80) . '..' : $blog->title }}</h4>
                                    </a>
                                    <div class="d-date">{{ $blog->created_date }} {{ $blog->created_month }} {{ $blog->created_year }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End-of Single Blog -->