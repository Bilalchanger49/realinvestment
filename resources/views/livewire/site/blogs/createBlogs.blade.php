<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2"
         style="background-image:url('{{ asset('assets/img/other/6.png') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="breadcrumb-inner py-5">
                <div class="section-title text-center text-white">
                    <h2 class="page-title">Create Blog Post</h2>
                    <ul class="page-list list-inline">
                        <li class="list-inline-item"><a href="/" class="text-white text-decoration-none">Home</a></li>
                        <li class="list-inline-item text-white">Create Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <div class="container py-5">
        <h2 class="mb-4 text-center fw-bold">Create a New Blog</h2>

        <form wire:submit.prevent="save"  class="shadow p-4 rounded bg-light">
            @csrf

            <div class="row">
                <div class="col-12 mb-4 ">
                    <label for="title" class="form-label fw-semibold">Blog Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter blog title"
                           wire:model.defer="title">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select wire:model.defer="category_id" class="form-control">
                        <option value="">Select a category...</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12 mb-4">
                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                    <input type="file" class="form-control nic-input" wire:model="thumbnail" accept="image/*">

                    @if ($thumbnail)
                        <img src="{{ $thumbnail->temporaryUrl() }}" alt="Preview" class="img-thumbnail mt-2"
                             style="max-height: 150px;">
                    @endif
                </div>

                <div wire:ignore class="col-12 mb-4">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    <textarea id="summernote" name="content" class="form-control" rows="6"></textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12 mb-4">
                    <button type="submit" class="btn btn-base">Submit Now</button>
                </div>
            </div>

        </form>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Start writing your blog content...',
            tabsize: 2,
            height: 500,
            callbacks: {
                onChange: function (contents) {
                @this.set('content', contents)
                    ;
                }
            }
        });

    </script>
</div>
