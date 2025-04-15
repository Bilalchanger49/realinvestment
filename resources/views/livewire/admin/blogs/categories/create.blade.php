<div class="content-wrapper">
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1 class="mb-3">Create Categories</h1>
            <a class="btn btn-primary mb-3" href="{{route('admin.category')}}">Categories</a>
        </div>

        <div class="card card-default">
            <div class="container mt-4">
                <div class="mb-4">
                    <form wire:submit.prevent="save">




                        <div class="form-group d-flex flex-column">
                            <label for="name">Name</label>
                            <input type="text" wire:model.defer="name" placeholder="Category name" class="border p-2 rounded">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
