<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Property</h1>
        <div class="card card-default">
            <div class="container mt-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Reg no</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Rent</th>
                        <th>Share Price</th>
                        <th>Total Shares</th>
                        <th>Remaining Share</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>{{ $property->property_name }}</td>
                            <td style="max-height: 100px; display: -webkit-box; overflow-y: hidden;}">
                                {{ $property->property_description }}
                            </td>
                            <td>{{ $property->property_reg_no }}</td>
                            <td>{{ $property->property_address }}</td>
                            <td>{{ $property->property_price }}</td>
                            <td>{{ $property->property_rent }}</td>
                            <td>{{ $property->property_share_price }}</td>
                            <td>{{ $property->property_total_shares }}</td>
                            <td>{{ $property->property_remaining_shares }}</td>
                            @php
                                /** @var string $images */
                                $image = $images->firstWhere('property_id', $property->id);
                            @endphp
                            @if($image)
                                <td><img src="{{ asset('storage/' . $image->image_path) }}" alt="Property Image"
                                         width="100"></td>
                            @endif
                            <td>
                                @can('property.edit')
                                    <button class="btn btn-danger">
                                        <a href="{{route('admin.property.edit', $property->id)}}"
                                           class="text-decoration-none text-light">
                                            <i class="icon-trash"></i> Edit
                                        </a>
                                    </button>
                                @endcan
                                @can('property.delete')
                                    <button wire:click="confirmDelete({{ $property->id }})" class="btn btn-danger">
                                        <i class="icon-trash"></i> Delete
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Confirmation Modal -->
                @if ($deleteId)
                    <div class="modal fade show d-block" style="background-color: rgba(0, 0, 0, 0.5);"
                         tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Deletion</h5>
                                    <button type="button" wire:click="$set('deleteId', null)"
                                            class="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this property?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click="$set('deleteId', null)"
                                            class="btn btn-secondary">
                                        Cancel
                                    </button>
                                    <button type="button" wire:click="deleteProperty" class="btn btn-danger">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function toggleReadMore(button) {
        const descriptionContainer = button.previousElementSibling;
        const isExpanded = descriptionContainer.classList.toggle('expanded');

        button.textContent = isExpanded ? 'Read Less' : 'Read More';
    }
</script>
