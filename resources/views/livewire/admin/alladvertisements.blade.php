<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Advertisements</h1>

        <!-- Search Form -->
        <div class="card card-default">
            <div class="container mt-4 mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="propertyName" class="form-control" placeholder="Search Property Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="userName" class="form-control" placeholder="Search User Name">
                    </div>
                    <div class="col-md-3">
                        <input type="number" wire:model.defer="noOfShares" class="form-control" placeholder="Search Total Shares">

                    </div> <div class="col-md-3">
                        <input type="text" wire:model.defer="shareAmount" class="form-control" placeholder="Search Share Price">
                    </div>
                    <div class="col-md-3 mt-3">
                        <select wire:model="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="holding">Holding</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button wire:click="$refresh" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Indicator -->
        <div wire:loading class="text-center mt-3">
            <span class="spinner-border spinner-border-sm" role="status"></span> Loading...
        </div>

        <!-- Transactions Table (Only Updates Data, Not Page) -->
        <div class="card card-default">
            <div class="container mt-4">
                <div wire:loading.remove>
                    <div class="responsive-table-wrapper">
                    <table class="table custom-table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th>Property Name</th>
                            <th>Name/User ID</th>
                            <th scope="col">Total Shares</th>
                            <th scope="col">Share price</th>
                            <th scope="col">Total price</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisements as $propertyAdd)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{$propertyAdd->property->property_name}}
                                    <br><small class="text-muted">code:#{{$propertyAdd->property->property_reg_no}}</small>
                                </td>
                                <td>
                                    {{ $propertyAdd->user->name ?? 'Unknown User' }}
                                    <br><small class="text-muted">id:#{{ $propertyAdd->user_id }}</small>
                                </td>
                                <td>{{$propertyAdd->no_of_shares}}</td>
                                <td>{{$propertyAdd->share_amount}}</td>
                                <td>{{$propertyAdd->total_amount}}</td>
                                <td>{{$propertyAdd->created_at}}</td>
                                {{--                    <td>{{$propertyAdd->status}}</td>--}}
                                <td><span class="badge bg-success text-white">{{$propertyAdd->status}}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $advertisements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
