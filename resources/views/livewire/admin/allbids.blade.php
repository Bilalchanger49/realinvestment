<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Bids</h1>

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
                        <input type="number" wire:model.defer="sharePrice" class="form-control" placeholder="Search Shares Price">
                    </div>
                    <div class="col-md-3">
                        <input type="number" wire:model.defer="totalPrice" class="form-control" placeholder="Search Total Price">
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="number" wire:model.defer="totalShares" class="form-control" placeholder="Search Total Shares">
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
                                <th scope="col">Name</th>
                                <th scope="col">Investor name</th>
                                <th scope="col">Share price</th>
                                <th scope="col">Total Share</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach($bids as $index=>$bid)
                                    @php
                                        $property = \App\Models\Property::where('id', $bid->auctions->property_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{$property->property_name ?? 'N/A'}}
                                            <br><small class="text-muted">code:#{{$property->property_reg_no ?? 'N/A'}}</small>
                                        </td>
                                        <td>
                                            {{$bid->user->name}}
                                            <br><small class="text-muted">id:#{{$bid->user->id ?? 'N/A'}}</small>
                                        </td>
                                        <td>{{$bid->share_amount}}</td>
                                        <td>{{$bid->total_shares}}</td>
                                        <td>{{$bid->total_price}}</td>
                                        @if($bid->status == 'accepted')
                                            <td><span class="status-completed">{{$bid->status}}</span></td>
                                        @elseif($bid->status == 'rejected')
                                            <td><span class="status-unpaid">{{$bid->status}}</span></td>
                                        @elseif($bid->status == 'active')
                                            <td><span class="status-cancelled">{{$bid->status}}</span></td>
                                        @endif
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $bids->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
