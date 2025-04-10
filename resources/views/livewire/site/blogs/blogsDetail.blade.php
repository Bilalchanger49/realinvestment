<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{asset('assets/img/other/4.png')}}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Blog Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog-page- Start -->
    <div class="single-blog-page pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-page-inner pb-lg-5">
                        <div class="single-blog-inner bg-none">
                            <div class="details p-0 border-bottom mb-4 pb-3">

                                <div class="cat"><a href="#">{{ $blog->category->name }}</a></div>
                                <h3>{{ $blog->title }}</h3>
                                <ul class="meta-inner">
                                    <li><img src="{{asset('assets/img/icon/1.png')}}" alt="img"> {{ $blog->user->name }}</li>
                                    <li><img src="{{asset('assets/img/icon/2.png')}}" alt="img"> {{ $blog->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <div class="thumb my-5">
                                <img src="{{asset('storage/'.$blog->thumbnail)}}" alt="img">
                            </div>
                            <div class="container details p-0 pt-3">
                                <div class="blog-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                            @livewire('site.blogs.blog-comments-component', ['post' => $blog])
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget-search">
                            <div class="single-search-inner">
                                <input type="text" placeholder="Search your keyword">
                                <button><i class="la la-search"></i></button>
                            </div>
                        </div>
                        <div class="widget widget-author text-center">
                            <h4 class="widget-title">About Me</h4>
                            <div class="thumb">
                                <img src="{{asset('assets/img/agent/1.png')}}" alt="img">
                            </div>
                            <div class="details">
                                <h5>Sandara Mrikon</h5>
                                <p>Lorem ipsum dolor amet, Lore ipsum dolor sit amet, consectetur et eiLorem ipsum dolor
                                    sit amet</p>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget-news">
                            <h5 class="widget-title">Popular Feeds</h5>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="{{asset('assets/img/blog/5.png')}}" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Dolor eorem ipsum sit amet Lorem ipsum</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2020</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="{{asset('assets/img/blog/6.png')}}" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Responsive Web And Desktop Develope</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2020</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="{{asset('assets/img/blog/7.png')}}" alt="img">
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
