<!-- Blog S t a r t -->
<section id="section-news">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-lg-3 text-center">
                <h2>Latest Blogs</h2>
                <p>Stay updated with the latest blog, tips, and insights from our experts.</p>
                <div class="spacer-20"></div>
            </div>
            @foreach($blogs as $blog)
                <div class="col-lg-4 mb10">
                    <div class="bloglist s2 item">
                        <div class="post-content">
                            <div class="post-image">
                                <div class="date-box">
                                    <div class="m">{{ $blog->created_date }}</div>
                                    <div class="d">{{ $blog->created_month }}</div>
                                </div>
                                <img alt="" src="{{ asset('images/blog/'. $blog->featured_image) }}" class="lazy">
                            </div>
                            <div class="post-text">
                                <h4><a href="{{ route('blog.index', ['blog' => $blog->id]) }}">{{ strlen($blog->title) > 30 ? substr($blog->title, 0, 45) . '..' : $blog->title }}<span></span></a></h4>
                                <p>{{ strlen($blog->content) > 60 ? substr($blog->content, 0, 90) . '..' : $blog->content }}</p>
                                <a class="btn-main" href="{{ route('blog.index', ['blog' => $blog->id]) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End-of Blog -->