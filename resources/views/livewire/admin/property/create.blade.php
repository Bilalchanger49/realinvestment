<div class="content-wrapper">

    <div class="content">
        <h1 class="mb-3">Add New property</h1>
        <div class="card card-default">
            <div class="container mb-4 mt-4">


                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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



                <form wire:submit.prevent="createproperty" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" wire:model="property_name">
                        @error('property_name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            wire:model="property_description" rows="4"></textarea>
                        @error('property_description') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="reg_no">Registration no</label>
                        <input type="text" class="form-control" id="reg_no" name="reg_no" wire:model="property_reg_no">
                        @error('property_reg_no') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            wire:model="property_address">
                        @error('property_address') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="number" class="form-control" id="rooms" name="rooms" wire:model="property_rooms">
                        @error('property_rooms') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kitchens">kitchens</label>
                        <input type="number" class="form-control" id="kitchens" name="kitchens"
                            wire:model="property_kitchens">
                        @error('property_kitchens') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" wire:model="property_type">
                        @error('property_type') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="property_price">Property Price</label>
                        <input type="number" class="form-control" id="property_price" name="property_price"
                            wire:model="property_price">
                        @error('property_price') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="property_rent">Property Rent</label>
                        <input type="number" class="form-control" id="property_rent" name="property_rent"
                            wire:model="property_rent">
                        @error('property_rent') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>


                    {{-- <div class="form-group">--}}
                        {{-- <label for="property_image">Property Image</label>--}}
                        {{-- <input type="file" class="form-control" id="property_image" name="property_image"
                            wire:model="property_image">--}}
                        {{-- @error('property_image') <span class="error text-danger">{{ $message }}</span>
                        @enderror--}}
                        {{-- <div wire:loading wire:target="property_image">Uploading...</div>--}}
                        {{-- </div>--}}
                    {{-- --}}

                    <div class="form-group">
                        <label for="property_images">Property Images (Max: 10)</label>

                        @foreach ($property_images as $index => $image)
                        <div class="mb-3 position-relative">
                            <div class="d-flex align-items-center">
                                <input type="file" class="form-control" wire:model="property_images.{{ $index }}" />

                                <!--  Remove Field Button -->
                                <button type="button" wire:click="removeImage({{ $index }})" class="btn-remove-field"
                                    title="Remove Image">
                                    ×
                                </button>
                            </div>

                            <!-- Loading Spinner -->
                            <div wire:loading wire:target="property_images.{{ $index }}" class="mt-1 text-muted small">
                                <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                                Uploading...
                            </div>

                            {{-- <!--  Show File Name -->
                            @if (!empty($property_images[$index]))
                            <div class="mt-2 p-2 border rounded bg-light">
                                {{ $property_images[$index]->getClientOriginalName() }}
                            </div>
                            @endif --}}

                            <!--  Validation Error -->
                            @error("property_images.{$index}")
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach

                        @if (count($property_images) < 10) <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn-add-image" wire:click="addImage">
                                <span>➕ Add Another Image</span>
                            </button>
                    </div>
                    @endif
            </div>



            <button type="submit" class="btn btn-primary">Create Property</button>
            </form>
        </div>
    </div>
</div>
</div>