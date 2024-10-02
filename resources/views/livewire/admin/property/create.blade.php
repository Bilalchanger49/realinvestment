
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="container mt-4">
                    <h1>Add New property</h1>

{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <form wire:submit.prevent="createproperty" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="property_name" >
                            @error('property_name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" wire:model="property_description" rows="4"></textarea>
                            @error('property_description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="reg_no">Registration no</label>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" wire:model="property_reg_no" >
                            @error('property_reg_no') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" wire:model="property_address" >
                            @error('property_address') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="property_price">Property Price</label>
                            <input type="number" class="form-control" id="property_price" name="property_price" wire:model="property_price">
                            @error('property_price') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_shares">Total Shares</label>
                            <input type="number" class="form-control" id="total_shares" name="total_shares" wire:model="property_total_shares">
                            @error('property_total_shares') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="property_image">Property Image</label>
                            <input type="file" class="form-control" id="property_image" name="property_image" wire:model="property_image">
                            @error('property_image') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Property</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
