<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Investments</h1>

        <!-- Search Form -->
        <div class="card card-default">
            <div class="container mt-4 mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="propertyName" class="form-control"
                               placeholder="Search Property Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="userName" class="form-control"
                               placeholder="Search User Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" wire:model.defer="sharesOwned" class="form-control"
                               placeholder="Search shares owned">
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Property Name</th>
                            <th>Name/User ID</th>
                            <th>Total Shares</th>
                            <th>Shares owned</th>
                            <th>Remaining Shares</th>
                            <th>Holding date</th>
                            <th>Current price</th>
                            <th>Total investments</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($investments as $index => $propertyInvestment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{$propertyInvestment->property->property_name}}
                                        <br><small
                                            class="text-muted">code:#{{$propertyInvestment->property->property_reg_no}}</small>
                                    </td>
                                    <td>
                                        {{ $propertyInvestment->user->name ?? 'Unknown User' }}
                                        <br><small class="text-muted">id:#{{ $propertyInvestment->user_id }}</small>
                                    </td>
                                    <td>{{$propertyInvestment->property->property_total_shares}}</td>
                                    <td>{{$propertyInvestment->shares_owned}}</td>
                                    <td>{{$propertyInvestment->property->property_remaining_shares}}</td>
                                    <td>{{$propertyInvestment->created_at}}</td>
                                    <td><strong>{{$propertyInvestment->share_price}}</strong></td>
                                    <td><strong>PK {{$propertyInvestment->total_investment}}</strong></td>
                                    <td><span class="status-completed">{{$propertyInvestment->status}}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No investments found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $investments->links() }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
