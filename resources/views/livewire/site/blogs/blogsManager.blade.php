<div>
    <style>
        body.modal-open {
            overflow: hidden;
        }
    </style>

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
    <div class="single-blog-page pd-top-120">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title">📝 My Blogs</h2>
                <a href="{{ route('site.blogs.create') }}" class="btn btn-base">+ Create Blog</a>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success custom-alert">{{ session('message') }}</div>
            @endif

            @forelse($blogs as $blog)
                <div class="custom-blog-card mb-4 d-flex">
                    <div class="blog-thumb-wrapper">
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Thumbnail">
                    </div>

                    <div class="blog-card-content flex-grow-1 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="blog-title"><a href="{{ route('site.blogs.details', $blog->id) }}">{{ $blog->title }}</a></h5>
                            <p class="blog-meta">🕒 {{ $blog->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="blog-actions">
                            <a href="{{ route('site.blogs.details', $blog->id) }}" class="action-btn view">View</a>
                            <a href="{{ route('site.blogs.edit', $blog->id) }}" class="action-btn edit">Edit</a>
                            <button wire:click="deleteBlog({{ $blog->id }})" class="action-btn delete"
                                    onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="no-blog-text">You haven’t created any blogs yet.</p>
            @endforelse
        </div>
    </div>


</div>
