<div>
    <div class="container">
        <h1>Distribute Returns to Investors</h1>

        <form wire:submit.prevent="distributeReturns" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="property">Select Property:</label>
                <select name="property_id" id="property" class="form-control" wire:model="property_id">
                    <option value="" selected>Select a property</option>
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->property_name }}</option>
                    @endforeach
                </select>
                @error('property_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="date">Distribution year</label>
                <input type="date" class="form-control" id="date" name="date" wire:model="date" >
                @error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="amount">Distribution amount</label>
                <input type="number" class="form-control" id="amount" name="amount" wire:model="amount">
                @error('amount') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Distribute Returns</button>
        </form>
    </div>
</div>
