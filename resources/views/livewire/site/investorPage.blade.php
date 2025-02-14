<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Investor Details</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Investor Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!--Search-->
    <div class="blog-page-area pd-top-90">
        <div class="container">
            <div>
                <h2 class="ms-2">
                    Investor profile
                </h2>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                    <div class="card investor-profile-card">
                        <div class="card-img">

                            {{--                            <img src="assets/img/agent/default user.jpeg" style="border-radius: 100%"--}}
                            {{--                                 class="card-img-top" alt="...">--}}
                            <img src="{{asset('storage/'. Auth::User()->profile_photo_path)}}"
                                 style="border-radius: 100%"
                                 class="card-img-top" alt="...">
                        </div>
                        <div class="card-body investor-profile-card-body">
                            <div class="text-section">
                                <h5 class="card-title"><strong>{{$user->name}}</strong></h5>
                                <h6 class="card-title"><strong>{{$user->email}}</strong></h6>
                                <div>
                                    <div class="card-text">
                                        <div class="card-text d-flex">
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-coins" style="color: #5ba600;"></i>
                                                <strong>{{$totalProperties}}</strong> properties
                                            </p>
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-money" style="color: #5ba600;"></i>
                                                <strong>{{$overallShares}}</strong> shares
                                            </p>
                                        </div>
                                        <div>

                                            <p>
                                                <i class="fa fa-solid fa-circle-check" style="color: #5ba600;"></i>
                                                <strong>Verified</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- <div class="card-text">
                                        <p>Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                    </div> -->
                                </div>

                            </div>
                            <div class="cta-section">
                                <div>
                                    <p>Investment<strong> PK {{$overallInvestment}}</strong></p>
                                    <p>Profit <strong> PK {{$returndistribution->amount}}</strong></p>
                                </div>
                                <a href="{{route('profile.show')}}">
                                    <button class="btn btn-base "> View Profile</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5">

            {{--        Active Investment table--}}
            <div class="container mt-5">
                <div class="card-header">
                    Active Investments
                </div>
                <div class="card p-3">
                    <!-- Add a fixed height to this div -->
                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Shares</th>
                                <th scope="col">Shares</th>
                                <th scope="col">Remaining Shares</th>
                                <th scope="col">Holding date</th>
                                <th scope="col">Current price</th>
                                <th scope="col">Total investments</th>
                                <th scope="col">Status</th>
                                <th scope="col">Selling</th> <!-- Added Selling Column -->
                                <th scope="col">Auctions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propertyInvestments as $propertyInvestment)
                                @if($propertyInvestment->status == 'holding' && $propertyInvestment->shares_owned > 0 )
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            {{$propertyInvestment->property->property_name}}
                                            <br><small
                                                class="text-muted">code:#{{$propertyInvestment->property->property_reg_no}}</small>
                                        </td>
                                        <td>{{$propertyInvestment->property->property_total_shares}}</td>
                                        <td>{{$propertyInvestment->shares_owned}}</td>
                                        <td>{{$propertyInvestment->property->property_remaining_shares}}</td>
                                        <td>{{$propertyInvestment->created_at}}</td>
                                        <td><strong>{{$propertyInvestment->share_price}}</strong></td>
                                        <td><strong>PK {{$propertyInvestment->total_investment}}</strong></td>
                                        <td><span class="status-completed">{{$propertyInvestment->status}}</span></td>
                                        <!-- New Selling Column -->
                                        <td>
                                            <button
                                                wire:click.prevent="open_property_add_popup({{$propertyInvestment->id}})"
                                                id="openPopup" class="details-btn-investment openPopup"
                                                data-toggle="modal" data-target="#property_add_popup">
                                                Sell
                                            </button>
                                        </td>
                                        <!-- Existing Auctions Column -->
                                        <td>
                                            <button
                                                wire:click.prevent="open_active_investment_popup({{$propertyInvestment->id}})"
                                                id="openPopup" class="details-btn-investment openPopup"
                                                data-toggle="modal" data-target="#active_investment_popup">
                                                &rarr;
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            {{--        Active Auctions table--}}
            <div class="container mt-5">
                <div class="card-header">
                    Active Auctions
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
                                <th scope="col">Holding date</th>
                                <th scope="col">Total bids</th>
                                <th scope="col">UnResponded bids</th>
                                <th scope="col">Status</th>
                                <th scope="col">Bids</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
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
                                        <td>{{$auction->no_of_shares}}</td>
                                        <td>{{$auction->share_amount_placed}}</td>
                                        <td><strong>{{$auction->total_amount_placed}}</strong></td>
                                        <td>{{$auction->created_at}}</td>
                                        <td><strong>{{$totalBids}}</strong></td>
                                        <td><strong>{{$unrespondedBids}}</strong></td>
                                        <td><span class="status-completed">{{$auction->status}}</span></td>
                                        <td>
                                            <!-- Button to open the modal -->
                                            <button wire:click="openBidPopup({{$auction->id}})"
                                                    class="details-btn-auction"
                                                    data-toggle="modal"
                                                    data-target="#bidsModal">
                                                &rarr;
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-base custom-small-btn"
                                                    style="line-height: 0px;"><i
                                                    class="fas fa-edit"></i></button>
                                            <button
                                                type="button"
                                                class="btn btn-danger custom-small-btn"
                                                style="line-height: 0px;"
                                                data-toggle="modal"
                                                data-target="#delete_auction_popup"
                                                wire:click.prevent="confirmDelete({{ $auction->id }}, '{{ $auction->property->property_name }}')">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @livewire('site.view-selling-component')

            {{--        Bids table--}}
            <div class="container mt-5">
                <div class="card-header">
                    Bids
                </div>
                <div class="card p-3">
                    <!-- Add fixed height and overflow-y:auto to this div -->
                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Investor name</th>
                                <th scope="col">Share price</th>
                                <th scope="col">Total Share</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Buy</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userbids as $bid)
                                @if($bid->status != 'completed')
                                    @php
                                        $property = \App\Models\Property::where('id', $bid->auctions->property_id)->first();
                                    @endphp
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            {{$property->property_name}}
                                            <br><small class="text-muted">code:#{{$property->property_reg_no}}</small>
                                        </td>
                                        <td>{{$bid->user->name}}</td>
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
                                        <td>
                                            @if($bid->status == 'accepted')
                                                {{--                                                <button--}}
                                                {{--                                                    wire:click.prevent="buyAuction({{$bid->auctions_id}})"--}}
                                                {{--                                                    class="btn btn-base custom-small-btn"--}}
                                                {{--                                                    style="line-height: 0px;">--}}
                                                {{--                                                    Buy--}}
                                                {{--                                                </button>--}}
                                                <button
                                                    wire:click.prevent="openAuctionTransactionPopup({{$bid->auctions_id}})"
                                                    class="btn btn-base custom-small-btn"
                                                    data-toggle="modal" data-target="#send_funds_popup"
                                                    style="line-height: 0px;">
                                                    Buy
                                                </button>

                                            @elseif($bid->status == 'rejected')
                                                <span class="status-unpaid">rejected</span>
                                            @else
                                                Not Responded
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-base custom-small-btn"
                                                    style="line-height: 0px;"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{--        transaction table--}}
            <div class="container mt-5">
                <div class="card-header">
                    Transactions
                </div>
                <div class="card p-3">
                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Print</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transctions as $transction)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        {{$transction->property->property_name}}
                                        <br><small
                                            class="text-muted">code:#{{$transction->property->property_reg_no}}</small>
                                    </td>
                                    <td><strong>PK {{$transction->total_investment}}</strong></td>
                                    <td>{{$transction->created_at}}</td>

                                    <td>
                                        @if($transction->activity == 'buy')
                                            <span class="status-completed">{{$transction->activity}}</span>
                                        @else
                                            <span class="status-unpaid">{{$transction->activity}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="details-btn-transaction">&rarr;</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>2</td>
                                <td>
                                    Visit the Laken Valley
                                    <br><small class="text-muted">code:#B0154</small>
                                </td>
                                <td><strong>$412.50</strong></td>
                                <td>10:30 Feb 21 2023</td>
                                <td><span class="status-unpaid">sold</span></td>
                                <td>
                                    <a href="#" class="details-btn-transaction">&rarr;</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    Bathing at Noriva Beach
                                    <br><small class="text-muted">code:#B0167</small>
                                </td>
                                <td><strong>$390.50</strong></td>
                                <td>10:30 Feb 21 2023</td>
                                <td><span class="status-completed">Buy</span></td>
                                <td>
                                    <a href="#" class="details-btn-transaction">&rarr;</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        {{--    create auction popup--}}
        <div wire:ignore.self class="modal fade" id="active_investment_popup" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center position-relative">
                        <h5 class="modal-title position-absolute">Auction table</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h5>{{$property_name}}</h5>
                        </div>
                        <!-- Popup Form Start -->
                        <form wire:submit.prevent="createAuction" id="popupForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="shares">Min Price Per Share</label>
                                    <input type="number" id="shares" placeholder="Enter shares"
                                           wire:model="price_per_share"
                                           wire:input="calculateTotal">
                                    <div>
                                        @error('price_per_share')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="shares">Total share to sell</label>
                                    <label for="shares">{{$no_of_shares}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dropdown1">Number of Shares</label>
                                <select id="dropdown1" name="category" wire:model.live="shares_to_sell"
                                        wire:click="calculateTotal">
                                    @for ($share = 0; $share <= $no_of_shares; $share++)
                                        <option value="{{ $share }}">{{ $share }}</option>
                                    @endfor
                                </select>
                                <div>
                                    @error('shares_to_sell')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="totalPrice">Total Price</label>
                                <input type="number" id="totalPrice" placeholder="Total price" wire:model="total_price"
                                       value="{{ $total_price }}">
                                <div>
                                    @error('total_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex flex-row">
                                    <input type="checkbox" id="confirmAction" wire:model="confirmAction">
                                    <label for="confirmAction">I confirm that I want to make an auction of these
                                        shares</label>
                                </div>
                                <div>
                                    @error('confirmAction')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="submit-btn btn">Create Auction</button>
                        </form>
                        <!-- Popup Form End -->
                    </div>
                </div>
            </div>
        </div>


        {{--    create property add popup--}}
        <div wire:ignore.self class="modal fade" id="property_add_popup" tabindex="-1" role="dialog"
             aria-labelledby="property_add_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center position-relative">

                        <h5 class="modal-title position-absolute">Selling table</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>{{$property_name}}</h5>
                        <!-- Popup Form Start -->
                        <form wire:submit.prevent="createSellingAdd" id="popupForm">
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
                                    <input type="checkbox" id="confirmActionForAdd" wire:model="confirmActionForAdd">
                                    <label for="confirmActionForAdd">I confirm that I want to sell these shares</label>
                                </div>
                                <div>
                                    @error('confirmActionForAdd')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="submit-btn btn">Create Advertisement</button>
                        </form>
                        <!-- Popup Form End -->
                    </div>
                </div>
            </div>
        </div>


        {{--    delete auction popup--}}
        <div wire:ignore.self class="modal fade" id="delete_auction_popup" tabindex="-1" role="dialog"
             aria-labelledby="delete_auction_popup" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Auction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this auction for <strong>{{ $property_name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteAuction">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        {{--    print transactions popup--}}
        <div id="transaction-popup">
            <div class="popup-content">
                <span class="close-btn" id="closeTransactionPopup">&times;</span>
                <div id="bill-details" class="bill-details">
                    <h2>Transaction Bill</h2>
                    <p><strong>Name:</strong> <span id="transactionName"></span></p>
                    <p><strong>Amount:</strong> <span id="transactionAmount"></span></p>
                    <p><strong>Date:</strong> <span id="transactionDate"></span></p>
                    <p><strong>Activity:</strong> <span id="transactionActivity"></span></p>
                </div>
                <button id="printBill" class="print-btn">Print</button>
            </div>
        </div>


        <div wire:ignore.self class="modal fade" id="bidsModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bids for Auction #{{$auction_id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (!$bids)
                            <p>No bids available for this auction.</p>
                        @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Shares</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($bids as $bid)
                                    <tr>
                                        <td>{{ $bid->user->name }}</td>
                                        <td>{{ $bid->share_amount }}</td>
                                        <td>{{ $bid->total_price }}</td>
                                        <td>{{ ucfirst($bid->status) }}</td>
                                        <td>
                                            @if ($bid->status === 'active')
                                                <button wire:click="acceptBid({{ $bid->id }})"
                                                        class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button wire:click="rejectBid({{ $bid->id }})"
                                                        class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            @else
                                                <span class="text-muted">Action Taken</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{--    auction transactions popup--}}
        <div wire:ignore.self class="modal fade" id="send_funds_popup" tabindex="-1" role="dialog"
             aria-labelledby="send_funds_popup_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center position-relative">
                        <h5 class="modal-title position-absolute">Send Funds table</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"
                         wire:key="totalPrice-{{ $total_price }}-numShares-{{ $total_shares }}-{{ now() }}">
                        @livewire('site.stripe.payment-component',
                        [
                        'id' => $auction_id,
                        'totalPrice' => $total_price,
                        'numShares' => $total_shares,
                        'sharePrice' => $share_amount,
                        'paymentType' => 'auction'
                        ],
                        key('totalPrice-' . $total_price . '-numShares-' . $total_shares . '-' . now()))
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        // Transaction Details Popup Script
        document.querySelectorAll('.details-btn-transaction').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior

                // Open the transaction details popup
                const transactionPopup = document.getElementById('transaction-popup');
                transactionPopup.style.display = 'flex';

                // Extract data from the corresponding row
                const row = button.closest('tr'); // Get the table row
                const name = row.querySelector('td:nth-child(2)').textContent.trim(); // Transaction Name
                const amount = row.querySelector('td:nth-child(3)').textContent.trim(); // Transaction Amount
                const date = row.querySelector('td:nth-child(4)').textContent.trim(); // Transaction Date
                const activity = row.querySelector('td:nth-child(5)').textContent.trim(); // Transaction Activity

                // Populate the bill details in the popup
                document.getElementById('transactionName').textContent = name;
                document.getElementById('transactionAmount').textContent = amount;
                document.getElementById('transactionDate').textContent = date;
                document.getElementById('transactionActivity').textContent = activity;
                document.getElementById('transactionStatus').textContent = status;
            });
        });

        // Close the transaction details popup
        document.getElementById('closeTransactionPopup').addEventListener('click', () => {
            const transactionPopup = document.getElementById('transaction-popup');
            transactionPopup.style.display = 'none';
        });

        // Close the transaction popup when clicking outside of it
        document.getElementById('transaction-popup').addEventListener('click', (e) => {
            if (e.target === document.getElementById('transaction-popup')) {
                document.getElementById('transaction-popup').style.display = 'none';
            }
        });

        // Print the bill
        document.getElementById('printBill').addEventListener('click', () => {
            const billContent = document.getElementById('bill-details').innerHTML;
            const printWindow = window.open('', '_blank', 'width=600,height=400');
            printWindow.document.write(`
        <html>
            <head>
                <title>Print Bill</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
                    h2 { text-align: center; }
                    p { margin: 10px 0; }
                </style>
            </head>
            <body>

                ${billContent}
            </body>
        </html>
    `);
            printWindow.document.close();
            printWindow.print();
        });

    </script>


</div>



