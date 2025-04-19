<div>
    <!-- banner start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">
        <div class="container">
            <div class="breadcrumb-inner">
                <div class="section-title text-center">
                    <h2 class="page-title">Investment Opportunities</h2>
                    <ul class="page-list">
                        <li><a href="index.html">Home</a></li>
                        <li>Property</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- product area start -->
    <div class="blog-page-area pd-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-search-inner bg-main">
                        <div class="row custom-gutters-20">

                            <div class="col-md-6 mt-2 mt-md-0">
                                <div class="widget-search">
                                    <div class="single-search-inner">
                                        <input wire:model.lazy="search" type="text" placeholder="Search your keyword">
                                        <button><i class="la la-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mt-2 mt-md-0 align-self-center">
                                <div class="single-select-inner">
                                    <select>
                                        <option value="1">Low to High</option>
                                        <option value="2">High to Low</option>
                                        <option value="3">Newest Listings</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="big-card-container">
                        <!-- Header with Links and Property Count -->
                        <div class="property-header d-flex justify-content-between align-items-center">
                            <div class="property-links">
                                <ul class="nav nav-tabs" id="propertyTabs">
                                    <li class="nav-item" style="cursor: pointer;">
                                        <a class="nav-link {{$activeTab === 'properties' ? 'active' : '' }}"
                                           wire:click="setActiveTab('properties')">Main
                                            Property</a>
                                    </li>
                                    <li class="nav-item" style="cursor: pointer;">
                                        <a class="nav-link {{$activeTab === 'auctions' ? 'active' : '' }}"
                                           wire:click="setActiveTab('auctions')">Auctions</a>
                                    </li>
                                    <li class="nav-item" style="cursor: pointer;">
                                        <a class="nav-link {{$activeTab === 'advertisements' ? 'active' : '' }}"
                                           wire:click="setActiveTab('advertisements')">Advertisements</a>
                                    </li>
                                </ul>
                            </div>
                            <span class="property-count">Total Properties: <strong>4</strong></span>
                        </div>

                        <div class="tab-content mt-3">
                            <!-- Main Property Section -->
                            @if($activeTab === 'properties')
                                <div>
                                    <div class="row">
                                        @foreach($properties as $property)
                                            <div class="col-lg-6">
                                                @php
                                                    /** @var string $images */
                                                    $image = $images->firstWhere('property_id', $property->id);
                                                @endphp
                                                <div class="single-product-wrap style-bottom">
                                                    <div class="thumb">
                                                        @if($image)
                                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                 alt="Property Image"></td>
                                                        @endif
                                                        <div class="product-wrap-details">
                                                            <div class="media justify-content-end">
                                                                <a class="fav-btn" href="#"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-details-inner">
                                                        @if( $property->id)
                                                            <h4>
                                                                <a href="{{ route('site.property.details', $property->id) }}">{{ $property->property_name }}</a>
                                                            </h4>
                                                        @else
                                                            <h4><a href="">{{ $property->property_name }}</a></h4>
                                                        @endif

                                                        <span
                                                            class="price"><strong>PK {{$property->property_share_price}}</strong></span>
                                                        <ul class="meta-inner">
                                                            <li><img src="assets/img/icon/location2.png" alt="Location">New
                                                                {{$property->property_address}}
                                                            </li>
                                                        </ul>
                                                        <p>{{$property->property_description}}</p>
                                                    </div>
                                                    <div class="product-meta-bottom">
                                                        <span class="price">PK {{$property->property_price}}</span>
                                                        <span>1 year ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- auctions Properties Section -->
                            @elseif($activeTab === 'auctions')
                                <div>
                                    <div class="row">
                                        @foreach($auctions as $auction)
                                            @if($auction->status == 'active')
                                                @php
                                                    /** @var string $images */
                                                    $image = $images->firstWhere('property_id', $auction->property->id);
                                                @endphp
                                                <div class="col-lg-6">
                                                    <div class="single-product-wrap style-bottom">
                                                        <div class="thumb">
                                                            @if($image)
                                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                     alt="Modern Family House">
                                                            @else
                                                                <img src="{{ asset('assets/img/other/6.png') }}"
                                                                     alt="Modern Family House">
                                                            @endif
                                                            <div class="product-wrap-details">
                                                                <div class="media justify-content-end">
                                                                    <a class="fav-btn" href="#"><i
                                                                            class="far fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-details-inner">
                                                            <h4>
                                                                <a href="{{route('site.property.details', 2)}}">{{$auction->property->property_name}}</a>
                                                            </h4>
                                                            <span
                                                                class="price"><strong>Tokens Available: {{$auction->no_of_shares}}</strong></span>
                                                            <ul class="meta-inner">
                                                                <li><img src="assets/img/icon/location2.png"
                                                                         alt="Location">
                                                                    {{$auction->property->property_address}}
                                                                </li>
                                                            </ul>
                                                            <p>{{$auction->property->property_description}}</p>
                                                            <br>
                                                            <p>Expected Annual Return: 8%</p>
                                                        </div>
                                                        <div class="product-meta-bottom">
                                                        <span
                                                            class="price">Token Price: {{$auction->share_amount_placed}}</span>
                                                            <span>
                                                            <button
                                                                wire:click.prevent="OpenCreateBidPopup({{$auction->id}})"
                                                                id="openBidPopup" class="btn btn-primary"
                                                                data-toggle="modal" data-target="#add_bid_popup">
                                                            Place Bid
                                                        </button>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <!-- advertisements Properties Section -->
                            @elseif($activeTab === 'advertisements')
                                <div>
                                    {{--                                    <div class="row" wire:key="search-{{ $search }}-{{now()}}">--}}
                                    {{--                                        @livewire('site.view-property_add-component', ['search' => $search],--}}
                                    {{--                                        key('search-' . $search. '-' . now()))--}}
                                    {{--                                    </div>--}}

                                    <div>
                                        @foreach($propertyAdds as $propertyAdd)
                                            @php
                                                /** @var string $images */
                                                $image = $images->firstWhere('property_id', $propertyAdd->property->id);
                                            @endphp
                                            <div class="col-lg-6">
                                                <div class="single-product-wrap style-bottom">
                                                    <div class="thumb">
                                                        @if($image)
                                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                 alt="Modern Family House">
                                                        @else
                                                            <img src="{{ asset('assets/img/other/6.png') }}"
                                                                 alt="Modern Family House">
                                                        @endif
                                                        <div class="product-wrap-details">
                                                            <div class="media justify-content-end">
                                                                <a class="fav-btn" href="#"><i class="far fa-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-details-inner">
                                                        <h4>
                                                            <a href="{{route('site.property.details', 2)}}">{{$propertyAdd->property->property_name}}</a>
                                                        </h4>
                                                        <span
                                                            class="price"><strong>Tokens Available: {{$propertyAdd->no_of_shares}}</strong></span>
                                                        <ul class="meta-inner">
                                                            <li><img src="assets/img/icon/location2.png" alt="Location">
                                                                {{$propertyAdd->property->property_address}}
                                                            </li>
                                                        </ul>
                                                        <p>{{$propertyAdd->property->property_description}}</p>
                                                        <br>
                                                        <p>Expected Annual Return: 8%</p>
                                                    </div>
                                                    <div class="product-meta-bottom">
                                                        <span
                                                            class="price">Token Price: {{$propertyAdd->share_amount_placed}}</span>
                                                        <span>
                                                            <button class="card__button text-decoration-none"
                                                                    wire:click.prevent="openSellingAddTransactionPopup({{$propertyAdd->id}})"
                                                                    data-toggle="modal" data-target="#send_funds_popup">Buy Now</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-area text-center mt-4 mb-5">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="la la-angle-double-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                        <i class="la la-angle-double-right"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>


                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget-category">
                            <h5 class="widget-title">Category</h5>
                            <ul>
                                <li><a href="#">Residential Properties <span>26</span></a></li>
                                <li><a href="#">Commercial Properties <span>20</span></a></li>
                                <li><a href="#">Vacation Homes <span>31</span></a></li>
                            </ul>
                        </div>
                        <div class="widget widget-place">
                            <h5 class="widget-title">Place</h5>
                            <ul>
                                <li>Karachi <span>26</span></li>
                                <li>Lahore <span>20</span></li>
                                <li>Islamabad <span>21</span></li>
                                <li>Gwadar <span>31</span></li>
                            </ul>
                        </div>
                        <div class="widget widget-news">
                            <h5 class="widget-title">Popular Feeds</h5>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/5.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Latest Trends in Real Estate Investment</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 JAN 2024</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/6.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Understanding the Benefits of Fractional
                                            Ownership</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Nov 2025</p>
                                </div>
                            </div>
                            <div class="single-news-wrap media">
                                <div class="thumb">
                                    <img src="assets/img/blog/7.png" alt="img">
                                </div>
                                <div class="media-body align-self-center">
                                    <h6><a href="blog-details.html">Top 5 Real Estate Hotspots for 2025</a></h6>
                                    <p class="date"><i class="far fa-calendar-alt"></i>25 Aug 2024</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


    {{--    sending funds popup--}}
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
                     wire:key="totalPrice-{{ $totalPrice }}-numShares-{{ $numShares }}-{{ now() }}">
                    @livewire('site.stripe.payment-component',
                    [
                    'id' => $sellingAddId,
                    'totalPrice' => $totalPrice,
                    'profitAmount' => $profitAmount,
                    'priceWithCharges' => $priceWithCharges,
                    'numShares' => $numShares,
                    'sharePrice' => $sharePrice,
                    'paymentType' => 'sellingAdd'
                    ],
                    key('totalPrice-' . $totalPrice . '-numShares-' . $numShares . '-' . now()))
                </div>
            </div>
        </div>
    </div>

    {{--    create bid popup--}}
    <div wire:ignore.self class="modal fade" id="add_bid_popup" tabindex="-1" role="dialog"
         aria-labelledby="add_bid_popup_label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center position-relative">
                    <h5 class="modal-title position-absolute">Create Bid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h5>{{$property_name}}</h5>
                    </div>
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
                                <label>{{$totalshares}}</label>
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
                                <label for="confirmAction">I confirm that I want to place bid on these shares</label>
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
    </div>
    <!-- product area end -->
</div>
