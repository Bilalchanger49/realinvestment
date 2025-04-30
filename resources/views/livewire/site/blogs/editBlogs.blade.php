<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('{{asset('assets/img/other/4.png')}}')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Blog Details</h2>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <<div class="container py-5">
        <h2 class="mb-4 text-center fw-bold">Edit Blog</h2>

        @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="update" method="POST" class="shadow p-4 rounded bg-light">
            @csrf
            <div class="row">

                <div class="col-12 mb-4 ">
                    <label>Title</label>
                    <input type="text" wire:model.defer="title" class="form-control">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3 ">
                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                    <input type="file" class="form-control nic-input" wire:model="thumbnail" accept="image/*">

                    @if ($blog->thumbnail)
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Preview" class="img-thumbnail mt-2"
                        style="max-height: 150px;">
                    @endif
                </div>
                <div wire:ignore class="col-12 mb-4">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    <textarea wire:model.defer="content" id="summernote" name="content" class="form-control "
                        rows="6">{{$blog->content}}</textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12 mb-4">
                    <button type="submit" class="btn btn-base">Update Now</button>
                </div>
            </div>
        </form>
</div>
</div>
<script>
    $('#summernote').summernote({
            placeholder: 'Start writing your blog content...',
            tabsize: 2,
            height: 500,
            callbacks: {
                onChange: function(contents) {
                @this.set('content', contents);
                }
            }
        });
</script>
</div>
