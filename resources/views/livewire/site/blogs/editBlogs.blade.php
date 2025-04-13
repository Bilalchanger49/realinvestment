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
    <div class="single-blog-page pd-top-120">
        <div class="container">
            <h2>Edit Blog</h2>

            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form wire:submit.prevent="update" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" wire:model.defer="title" class="form-control">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div wire:ignore class="mb-3">
                    <label for="title" class="form-label fw-semibold">Category</label>
                    <div class="single-select-inner style-bg-border">
                        <select class="form-control" wire:model.defer="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
{{--                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>--}}
                                <option value="{{ $category->id }}" @if($category->id == $category_id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label>Change Thumbnail</label>
                    <input type="file" wire:model="newThumbnail" class="form-control">
                    @error('newThumbnail') <small class="text-danger">{{ $message }}</small> @enderror

                    @if ($blog->thumbnail)
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Thumbnail" width="100" class="mt-2">
                    @endif
                </div>
                <div wire:ignore class="col-12 mb-4">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    <textarea wire:model.defer="content" id="summernote" name="content" class="form-control" rows="6">{{$blog->content}}</textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary" type="submit">Update Blog</button>
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
