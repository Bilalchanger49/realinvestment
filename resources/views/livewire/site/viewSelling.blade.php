<div>
    <div class="container mt-5">
        <div class="card-header">
            Selling Properties
        </div>
        <div class="card p-3">
            <!-- Add fixed height and overflow-y:auto to this div -->
            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                <table class="table">
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
{{--                        @if($auction->status == 'active')--}}
                            <tr>
                                <td>1</td>
                                <td>
                                    {{$propertyAdd->property->property_name}}
                                    <br><small class="text-muted">code:#{{$propertyAdd->property->property_reg_no}}</small>
                                </td>
                                <td>{{$propertyAdd->no_of_shares}}</td>
                                <td>{{$propertyAdd->share_amount}}</td>
                                <td>{{$propertyAdd->total_amount}}</td>
                                <td>{{$propertyAdd->created_at}}</td>
                                <td>{{$propertyAdd->status}}</td>
                                <td>
                                    <button type="button" class="btn btn-base custom-small-btn"
                                            style="line-height: 0px;"><i
                                            class="fas fa-edit"></i></button>
                                    <button
                                        type="button"
                                        class="btn btn-danger custom-small-btn"
                                        style="line-height: 0px;"
                                        data-toggle="modal"
                                        data-target="#delete_auction_popup">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
{{--                        @endif--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
