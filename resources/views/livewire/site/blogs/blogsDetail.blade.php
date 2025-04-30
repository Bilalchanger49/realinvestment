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
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details-page-inner pb-lg-5">
                        <div class="single-blog-inner bg-none">
                            <div class="details p-0 border-bottom mb-4 pb-3">

                                <h3>{{ $blog->title }}</h3>
                                <ul class="meta-inner">
                                    <li><img src="{{asset('assets/img/icon/1.png')}}" alt="img"> {{ $blog->user->name }}</li>
                                    <li><img src="{{asset('assets/img/icon/2.png')}}" alt="img"> {{ $blog->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <div class="blog-thumbnail">
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
            </div>
        </div>
    </div>
    <!-- blog-page- end -->
</div>
