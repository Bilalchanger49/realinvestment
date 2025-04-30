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
                            <h3><a href="{{ route('site.blogs.details', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <ul class="meta-inner">
                                <li><img src="assets/img/icon/1.png" alt="img"> By Admin</li>
                                <li><img src="assets/img/icon/2.png" alt="img"> {{$blog->total_views}}</li>
                                <li><img src="assets/img/icon/3.png" alt="img"> {{ $blog->created_at->diffForHumans() }}</li>
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
                        @livewire('site.blogs.latest-blogs-component')
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-page- end -->


</div>
