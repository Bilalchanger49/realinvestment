<div class="tab-content mt-3">
    <div class="tab-pane fade" id="selling">
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
                                style="line-height: 0px;"><i
                                class="fas fa-edit"></i></button>
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
</div>
