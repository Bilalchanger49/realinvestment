<div>

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Secondary-Market</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Secondary Market</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog-page- Start -->
    <div class="blog-page-area pd-top-90">
        <div class="container">
            <!-- Property Search Bar -->
            <div class="row">
                <form wire:submit.prevent="save"  class="shadow p-4 rounded bg-light">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select wire:model="state" class="form-control">
                            <option value="">Select a category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit">submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
