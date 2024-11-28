<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Edit Property</h1>

        <!-- Informational Text -->
        <div class="alert alert-info">
            <p>You are editing the property details. Make sure to double-check the information before saving.</p>
        </div>
        <!-- End of Informational Text -->

        <div class="card card-default">
            <div class="container mt-4">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form wire:submit.prevent="updateProperty" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="property_name">
                        @error('property_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" wire:model="property_description" rows="4"></textarea>
                        @error('property_description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="reg_no">Registration No</label>
                        <input type="text" class="form-control" id="reg_no" wire:model="property_reg_no">
                        @error('property_reg_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" wire:model="property_address">
                        @error('property_address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="property_price">Property Price</label>
                        <input type="number" class="form-control" id="property_price" wire:model="property_price">
                        @error('property_price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="property_rent">Property Rent</label>
                        <input type="number" class="form-control" id="property_rent" wire:model="property_rent">
                        @error('property_rent') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="property_image">Property Image</label>
                        <input type="file" class="form-control" id="property_image" wire:model="property_image">
                        @error('property_image') <span class="text-danger">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="property_image">Uploading...</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Property</button>
                </form>
            </div>
        </div>
    </div>
</div>