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
                            <img src="assets/img/agent/default user.jpeg" style="border-radius: 100%"
                                 class="card-img-top" alt="...">
                        </div>
                        <div class="card-body investor-profile-card-body">
                            <div class="text-section">
                                <h5 class="card-title"><strong>Furqan</strong></h5>
                                <h6 class="card-title"><strong>furqan@gmail.com</strong></h6>
                                <div>
                                    <div class="card-text">
                                        <div class="card-text d-flex">
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-coins" style="color: #5ba600;"></i>
                                                <strong>5</strong> properties
                                            </p>
                                            <p class="me-3">
                                                <i class="fa fa-solid fa-money" style="color: #5ba600;"></i>
                                                <strong>15</strong> shares
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
                                    <p>Total Income<strong> $1500</strong></p>
                                    <p>Pending <strong> $1200</strong></p>
                                </div>
                                <button class="btn btn-base ">View Profile</button>
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
                    <div class="table-responsive">
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
                                <th scope="col">status</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($propertyInvestments as $propertyInvestment)
                                @if($propertyInvestment->status == 'holding')
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
                                        <td>
                                            <button
                                                wire:click.prevent="open_active_investment_popup({{$propertyInvestment->id}})"
                                                type="button" class="details-btn-investment openPopup"
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
                    <div class="table-responsive">
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
                                <th scope="col">status</th>
                                <th scope="col">Bids</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($auctions as $auction)
                                @if($auction->status == 'active')
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
                                        <td><strong>0</strong></td>
                                        <td><strong>0</strong></td>

                                        <td><span class="status-completed">{{$auction->status}}</span></td>
                                        <td>
                                            <button
                                                type="button" class="details-btn-investment openPopup">
                                                &rarr;
                                            </button>
                                        </td>
                                        <td>
    <button type="button" class="btn btn-base custom-small-btn"><i class="fas fa-edit"></i></button>
    <button 
        type="button" 
        class="btn btn-danger custom-small-btn" 
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

            {{--        transaction table--}}
            <div class="container mt-5">
                <div class="card-header">
                    Transactions
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Status</th>
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
                                    <td><span class="status-completed">{{$transction->activity}}</span></td>
                                    <td><span class="status-completed">{{$transction->status}}</span></td>
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
                                <td><span class="status-cancelled">not holding</span></td>
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
                                <td><span class="status-completed">holding</span></td>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>{{$property_name}}</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Popup Form Start -->
                        <form wire:submit.prevent="createAuction" id="popupForm">
                            <div class="form-row">

                                <div class="form-group">
                                    <label for="shares">Price Per Share</label>
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

                                <div>@error('shares_to_sell') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="totalPrice">Total Price</label>
                                <input type="number" id="totalPrice" placeholder="Total price" wire:model="total_price"
                                       value="{{ $total_price }}">
                                <div>@error('total_price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex flex-row">
                                    <input type="checkbox" id="confirmAction" wire:model="confirmAction">
                                    <label for="confirmAction">I confirm that I want to sell these shares</label>
                                </div>
                                <div>@error('confirmAction') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <button type="submit" class="submit-btn btn">Sell</button>
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
                    <p><strong>Status:</strong> <span id="transactionStatus"></span></p>
                </div>
                <button id="printBill" class="print-btn">Print</button>
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
                const status = row.querySelector('td:nth-child(6)').textContent.trim(); // Transaction Status

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



