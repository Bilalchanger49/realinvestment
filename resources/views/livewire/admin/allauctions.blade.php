<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Auctions</h1>

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
                        <input type="number" wire:model.defer="noOfShares" class="form-control" placeholder="Search No Of Shares">
                    </div>
                    <div class="col-md-3">
                        <select wire:model="activity" class="form-control">
                            <option value="">All Activities</option>
                            <option value="buy">Buy</option>
                            <option value="sell">Sell</option>
                        </select>
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
                            <th scope="col">Holding date</th>
                            <th scope="col">Total bids</th>
                            <th scope="col">UnResponded bids</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($auctions as $auction)
                            @if($auction->status == 'active')
                                @php
                                    $totalBids = \App\Models\Bid::where('auctions_id', $auction->id)->count();
                                    $unrespondedBids = \App\Models\Bid::where('auctions_id', $auction->id)
                                        ->where('status', 'active')
                                        ->count();
                                @endphp
                                <tr>
                                    <td>1</td>
                                    <td>
                                        {{$auction->property->property_name}}
                                        <br><small
                                            class="text-muted">code:#{{$auction->property->property_reg_no}}</small>
                                    </td>
                                    <td>
                                        {{ $auction->user->name ?? 'Unknown User' }}
                                        <br><small class="text-muted">id:#{{ $auction->user_id }}</small>
                                    </td>
                                    <td>{{$auction->no_of_shares}}</td>
                                    <td>{{$auction->share_amount_placed}}</td>
                                    <td><strong>{{$auction->total_amount_placed}}</strong></td>
                                    <td>{{$auction->created_at}}</td>
                                    <td><strong>{{$totalBids}}</strong></td>
                                    <td><strong>{{$unrespondedBids}}</strong></td>
                                    <td><span class="status-completed">{{$auction->status}}</span></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $auctions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
