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
            <div class="d-flex justify-content-between">
            <h2 class="mb-4 fw-bold">My Blogs</h2>
                <a href="{{route('site.blogs.create')}}" class="btn btn-primary">Create Blogs</a>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @forelse($blogs as $blog)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $blog->title }}</h5>
                        <p class="text-muted">Created: {{ $blog->created_at->diffForHumans() }}</p>

                        <a href="{{route('site.blogs.details', $blog->id)}}" class="btn btn-sm btn-info">View</a>
                        <a href="{{route('site.blogs.edit', $blog->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <button wire:click="deleteBlog({{ $blog->id }})" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this blog?')">Delete
                        </button>

                    </div>
                </div>
            @empty
                <p>You haven’t created any blogs yet.</p>
            @endforelse
        </div>
    </div>

</div>
