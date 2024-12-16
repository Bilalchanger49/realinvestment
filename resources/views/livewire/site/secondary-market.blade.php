<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Secondary-Market</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Secondary Market</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog-page- Start -->
    <div class="blog-page-area pd-top-90">
        <div class="container">
            <!-- Property Search Bar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-search-inner bg-main">
                        <div class="row custom-gutters-20">
                            <!-- Number of Properties in Secondary Market -->
                            <div class="col-md-3 align-self-center">
                                <h5>21 Investment Picks</h5> <!-- Updated text for secondary market -->
                            </div>

                            <!-- Search Bar -->
                            <div class="col-md-6 mt-2 mt-md-0">
                                <div class="widget-search">
                                    <div class="single-search-inner">
                                        <input type="text" placeholder="Search for investment properties">
                                        <button><i class="la la-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- Sort By Dropdown -->
                            <div class="col-md-3 mt-2 mt-md-0 align-self-center">
                                <div class="single-select-inner">
                                    <select>
                                        <option value="1">Sort By Price</option>
                                        <!-- Changed to sort by price for real estate -->
                                        <option value="2">Sort By Location</option> <!-- Changed to sort by location -->
                                        <option value="3">Sort By Return Potential</option>
                                        <!-- Changed to sort by investment potential -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 0 layer starts -->
            <div class="row g-4">
                @foreach($auctions as $auction)
                    <div class="col-md-6 col-lg-4">
                        <div class="card__article position-relative">
                            <!-- Keeping the same image -->
                            <img src="assets/img/banner/2.png" alt="Vancouver Mountains, Canada"
                                 class="card__img rounded-3 w-100">
                            <div class="card__data position-absolute bg-white shadow rounded-3">
                                <span
                                    class="card__description d-block text-muted small mb-1">{{$auction->property->property_address}}</span>
                                <h2 class="card__title">{{$auction->property->property_name}}</h2>
                                <span
                                    class="card__token-price d-block text-muted small mb-1">Token Price: {{$auction->share_amount_placed}}</span>
                                <span
                                    class="card__tokens-available d-block text-muted small mb-1">Tokens Available: {{$auction->no_of_shares}}</span>
                                <span class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                                <span
                                    class="card__owner d-block text-muted small mb-1">Owner: {{$auction->user->name}}</span>
                                <div>
                                    <button
                                        wire:click.prevent="OpenCreateBidPopup({{$auction->id}})"
                                        id="openBidPopup" class="btn btn-primary "
                                        data-toggle="modal" data-target="#add_bid_popup">
                                        Place Bid
                                    </button>
{{--                                    <a href="#" class="card__button text-decoration-none">Place Bid</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- 0 layer ends -->
            <!-- First Row of Cards -->
            <div class="row g-4 mt-5">
                <div class="col-md-6 col-lg-4">
                    <div class="card__article position-relative">
                        <!-- Keeping the same image -->
                        <img src="assets/img/banner/2.png" alt="Vancouver Mountains, Canada"
                             class="card__img rounded-3 w-100">
                        <div class="card__data position-absolute bg-white shadow rounded-3">
                            <span class="card__description d-block text-muted small mb-1">Downtown, City</span>
                            <h2 class="card__title">High-Yield Residential Property</h2>
                            <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                            <span
                                class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                            <span
                                class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                            <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                            <div>
                                <a href="#" class="card__button text-decoration-none">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card__article position-relative">
                        <img src="assets/img/banner/2.png" alt="Poon Hill, Nepal" class="card__img rounded-3 w-100">
                        <div class="card__data position-absolute bg-white shadow rounded-3">
                            <span class="card__description d-block text-muted small mb-1">Poon Hill, Nepal</span>
                            <h2 class="card__title">Starry Night</h2>
                            <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                            <span
                                class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                            <span
                                class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                            <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                            <div>
                                <a href="#" class="card__button text-decoration-none">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card__article position-relative">
                        <img src="assets/img/banner/2.png" alt="Bojcin Forest, Serbia"
                             class="card__img rounded-3 w-100">
                        <div class="card__data position-absolute bg-white shadow rounded-3">
                            <span class="card__description d-block text-muted small mb-1">Bojcin Forest, Serbia</span>
                            <h2 class="card__title">Path Of Peace</h2>
                            <span class="card__token-price d-block text-muted small mb-1">Token Price: $50</span>
                            <span
                                class="card__tokens-available d-block text-muted small mb-1">Tokens Available: 200</span>
                            <span
                                class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                            <span class="card__owner d-block text-muted small mb-1">Owner: John Doe</span>
                            <div>
                                <a href="#" class="card__button text-decoration-none">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="pagination-area text-center mt-10 mb-5" style="margin-top: 50px">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="la la-angle-double-right"></i></a></li>
        </ul>
    </div>

    {{--    create auction popup--}}
    <div wire:ignore.self class="popup" id="add_bid_popup" tabindex="-1" role="dialog"
         aria-labelledby="add_bid_popup_label" aria-hidden="true">
        <div class="popup-content">
            <div class="modal-header">
                <h2> new property</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Popup Form Start -->
                <form wire:submit.prevent="createBid" id="popupForm">
                    <div class="form-row">

                        <div class="form-group">
                            <label for="bidPrize">Bid for single Share</label>
                            <input type="number" id="bidPrize" placeholder="Enter shares Prize"
                                   wire:model="bidPrize"
                                   wire:input="calculateTotal">
                            <div>
                                @error('bidPrize')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="totalshares">Total share to sell</label>
                            <label >{{$totalshares}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sharesToBuy">Number of Shares</label>
                        <select id="sharesToBuy" name="sharesToBuy" wire:model.live="sharesToBuy"
                                wire:click="calculateTotal">
                            @for ($share = 0; $share <= $totalshares; $share++)
                                <option value="{{ $share }}">{{ $share }}</option>
                            @endfor
                        </select>

                        <div>@error('sharesToBuy') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="totalPrice">Total Price</label>
                        <input type="number" id="totalPrice" placeholder="Total price" wire:model="totalPrice"
                               value="{{ $totalPrice }}">
                        <div>@error('totalPrice') <span class="text-danger">{{ $message }}</span> @enderror
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


                    <button type="submit" class="submit-btn btn">Place Bid</button>
                </form>
                <!-- Popup Form End -->

            </div>
        </div>
    </div>

    <script>
        // Get elements
        const open_investment_popup = document.getElementById('openBidPopup');
        const close_investment_popup = document.getElementById('closePopup');
        const active_investment_popup = document.getElementById('add_bid_popup');

        // Open popup
        open_investment_popup.addEventListener('click', () => {
            active_investment_popup.style.display = 'flex';
        });

        // Close popup
        close_investment_popup.addEventListener('click', () => {
            active_investment_popup.style.display = 'none';
        });

        // Close popup when clicking outside of it
        active_investment_popup.addEventListener('click', (e) => {
            if (e.target === active_investment_popup) {
                active_investment_popup.style.display = 'none';
            }
        });



    </script>

</div>
