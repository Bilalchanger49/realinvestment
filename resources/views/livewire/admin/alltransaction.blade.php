<div class="content-wrapper">
    <div class="content">
        <h1 class="mb-3">Transactions</h1>

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
                            <th>No</th>
                            <th>Property Name</th>
                            <th>Name/User ID</th>
                            <th>Shares Owned</th>
                            <th>Share Price</th>
                            <th>Total Amount</th>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $transaction->property->property_name ?? 'N/A' }}
                                    <br><small class="text-muted">code:#{{ $transaction->property->property_reg_no ?? 'N/A' }}</small>
                                </td>
                                <td>
                                    {{ $transaction->user->name ?? 'Unknown User' }}
                                    <br><small class="text-muted">id:#{{ $transaction->user_id }}</small>
                                </td>
                                <td>{{ $transaction->shares_owned }}</td>
                                <td>{{ $transaction->share_price }}</td>
                                <td><strong>PK {{ $transaction->total_investment }}</strong></td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>
                                        <span class="status-{{ $transaction->activity == 'buy' ? 'completed' : 'unpaid' }}">
                                            {{ $transaction->activity }}
                                        </span>
                                </td>
                                <td>
                                        <span class="status-{{ $transaction->status == 'holding' ? 'completed' : 'cancelled' }}">
                                            {{ $transaction->status }}
                                        </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No transactions found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>

                    <!-- Pagination -->
                    <div class="my-3 flex justify-center">
                        {{ $transactions->links() }}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
