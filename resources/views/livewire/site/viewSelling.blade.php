<div class="tab-content mt-3">
    <div>
        <h3>Selling Properties</h3>
        <table class="table custom-table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Total Shares</th>
                <th scope="col">Share price</th>
                <th scope="col">Total price</th>
                <th scope="col">Creation date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($propertyAdds as $propertyAdd)
                <tr >
                    <td>1</td>
                    <td>
                        {{$propertyAdd->property->property_name}}
                        <br><small class="text-muted">code:#{{$propertyAdd->property->property_reg_no}}</small>
                    </td>
                    <td>{{$propertyAdd->no_of_shares}}</td>
                    <td>{{$propertyAdd->share_amount}}</td>
                    <td>{{$propertyAdd->total_amount}}</td>
                    <td>{{$propertyAdd->created_at}}</td>
                    {{--                    <td>{{$propertyAdd->status}}</td>--}}
                    <td><span class="badge bg-primary">{{$propertyAdd->status}}</span></td>
                    <td>
                        <button type="button" class="btn btn-base custom-small-btn"
                                style="line-height: 0px;"
                                data-toggle="modal"
                                data-target="#edit_property_add_popup"
                                wire:click.prevent="openAdvertisementEditPopup({{ $propertyAdd->id }})">
                            <i class="fas fa-edit"></i></button>
                        <button
                            type="button"
                            class="btn btn-danger custom-small-btn"
                            style="line-height: 0px;"
                            data-toggle="modal"
                            wire:click.prevent="confirmSellingAddDelete({{ $propertyAdd->id }}, '{{ $propertyAdd->property->property_name }}')"
                            data-target="#delete_selling_add_popup">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



     {{--    delete selling add popup--}}
    <div wire:ignore.self class="modal fade" id="delete_selling_add_popup" tabindex="-1" role="dialog"
         aria-labelledby="delete_selling_add_popup" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Selling Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Advertisement for <strong>{{ $property_name }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteSellingAdd">Delete</button>
                </div>
            </div>
        </div>
    </div>


    {{--    edit property add popup--}}
    <div wire:ignore.self class="modal fade" id="edit_property_add_popup" tabindex="-1" role="dialog"
         aria-labelledby="edit_property_add_label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center position-relative">

                    <h5 class="modal-title position-absolute">Edit Advertisement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{$property_name}}</h5>
                    <!-- Popup Form Start -->
                    <form wire:submit.prevent="updateSellingAdd" id="popupForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="shares">Min Price Per Share</label>
                                <input type="number" id="shares" placeholder="Enter shares"
                                       wire:model="price_per_share_for_add"
                                       wire:input="calculateTotalForAdd">
                                <div>
                                    @error('price_per_share_for_add')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="shares">Total share to sell</label>
                                <label for="shares">{{$no_of_shares_for_add}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dropdown1">Number of Shares</label>
                            <select id="dropdown1" name="category" wire:model.live="shares_to_sell_for_add"
                                    wire:click="calculateTotalForAdd">
                                @for ($share = 0; $share <= $no_of_shares_for_add; $share++)
                                    <option value="{{ $share }}">{{ $share }}</option>
                                @endfor
                            </select>
                            <div>
                                @error('shares_to_sell_for_add')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_price_for_add">Total Price</label>
                            <input type="number" id="total_price_for_add" placeholder="Total price"
                                   wire:model="total_price_for_add"
                                   value="{{ $total_price_for_add }}">
                            <div>
                                @error('total_price_for_add')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex flex-row">
                                <input type="checkbox" id="confirmActionForAdd" wire:model="confirmActionForEdit">
                                <label for="confirmActionForEdit">I confirm that I want to edit this Advertisement</label>
                            </div>
                            <div>
                                @error('confirmActionForEdit')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="submit-btn btn">Update Advertisement</button>
                    </form>
                    <!-- Popup Form End -->
                </div>
            </div>
        </div>
    </div>

</div>
