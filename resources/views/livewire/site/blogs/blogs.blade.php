<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/9.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Blog</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog-page- Start -->
    <div class="blog-page-area pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @forelse($blogs as $blog)
                    <div class="single-blog-inner">
                        <div class="blog-thumbnail">
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="img">
                        </div>

                        <div class="details">
                            <div class="cat"><a href="#">{{ $blog->category->name }}</a></div>
                            <h3><a href="{{ route('site.blogs.details', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <ul class="meta-inner">
                                <li><img src="assets/img/icon/1.png" alt="img"> By Admin</li>
                                <li><img src="assets/img/icon/2.png" alt="img"> Marce 9 , 2020</li>
                                <li><img src="assets/img/icon/3.png" alt="img"> Marce 9 , 2020</li>
                            </ul>

                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 250, '...') }}</p>

                            <div class="row">
                                <div class="col-7">
                                    <div class="author-inner">
                                        <img src="assets/img/blog/author1.png" alt="img">
                                        <span>By Admin</span>
                                    </div>
                                </div>
                                <div class="col-5 align-self-center text-right">
                                    <a class="read-more" href="{{ route('site.blogs.details', $blog->id) }}">Read More <i class="la la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">No blog posts available.</div>
                        </div>
                    @endforelse
{{--                    <div class="pagination-area text-center">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-left"></i></a></li>--}}
{{--                            <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-right"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                        <div class="pagination-area text-center mt-4 mb-5">
                            {{ $blogs->links() }}
                        </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget-search">
                            <div class="single-search-inner">
                                <input  wire:model.lazy="search" type="text" placeholder="Search your keyword">
                                <button><i class="la la-search"></i></button>
                            </div>
                        </div>
                        <div class="widget widget-news">
                            <h5 class="widget-title">Popular Feeds</h5>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/5.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Dolor eorem ipsum sit amet Lorem ipsum</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2020</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/6.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Responsive Web And Desktop Develope</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2020</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/7.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Admin Web is Django Highlig Models</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2020</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-page- end -->


</div>
