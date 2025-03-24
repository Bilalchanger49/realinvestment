<div>
    <div class="row g-4 mt-5" style="justify-content: flex-start">
        @foreach($propertyAdds as $propertyAdd)
        <div class="col-md-6 col-lg-4 mt-5">
            <div class="card__article position-relative">
                <!-- Keeping the same image -->
                <img src="{{asset('storage/' . $propertyAdd->property->property_image)}}" alt="img"
                style="width: 100%; height: 250px; object-fit: cover; border-radius: 1.5rem; transition: transform 0.5s ease-in-out;">
{{--                <img src="assets/img/banner/2.png" alt="Vancouver Mountains, Canada"--}}
{{--                     class="card__img rounded-3 w-100">--}}
                <div class="card__data position-absolute bg-white shadow rounded-3">
                    <span class="card__description d-block text-muted small mb-1">
                        {{$propertyAdd->property->property_address}}</span>
                    <h2 class="card__title">{{$propertyAdd->property->property_name}}</h2>
                    <span class="card__token-price d-block text-muted small mb-1">
                        Token Price: {{$propertyAdd->share_amount}}</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">
                        Tokens Available: {{$propertyAdd->no_of_shares}}</span>
                    <span
                        class="card__tokens-available d-block text-muted small mb-1">
                        Total Price: {{$propertyAdd->total_amount}}</span>
                    <span
                        class="card__expected-return d-block text-muted small mb-1">Expected Annual Return: 8%</span>
                    <span class="card__owner d-block text-muted small mb-1">
                        Owner: {{$propertyAdd->user->name}}</span>
                    <div>
{{--                        <a href="#" class="card__button text-decoration-none"--}}
{{--                           wire:click="buyProperty({{$propertyAdd->id}})"--}}
{{--                        >Buy Now</a>--}}
                        <a href="#" class="card__button text-decoration-none"
                           wire:click.prevent="openSellingAddTransactionPopup({{$propertyAdd->id}})"
                           data-toggle="modal" data-target="#send_funds_popup">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container ">
    <div class="row justify-content-center">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="updated-product-wrap">
                <div class="updated-thumb">
                    <img src="assets/img/project/10.png" alt="High-Yield Residential Property" />
                </div>
                <div class="updated-content">
                    <span>Downtown, City</span>
                    <h3 class="updated-title">High-Yield Residential </h3>
                    <p class="updated-desc">
                        Token Price: $50 <br>
                        Tokens Available: 200 <br>
                        Expected Annual Return: 8% <br>
                        Owner: John Doe
                    </p>
                    <button class="updated-btn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="updated-product-wrap">
                <div class="updated-thumb">
                    <img src="assets/img/project/11.png" alt="Family House" />
                </div>
                <div class="updated-content">
                    <span>Suburban Area</span>
                    <h3 class="updated-title">Family House</h3>
                    <p class="updated-desc">
                        Token Price: $75 <br>
                        Tokens Available: 150 <br>
                        Expected Annual Return: 7.5% <br>
                        Owner: Jane Smith
                    </p>
                    <button class="updated-btn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="updated-product-wrap">
                <div class="updated-thumb">
                    <img src="assets/img/project/12.png" alt="Luxury Apartment" />
                </div>
                <div class="updated-content">
                    <span>City Center</span>
                    <h3 class="updated-title">Luxury Apartment</h3>
                    <p class="updated-desc">
                        Token Price: $100 <br>
                        Tokens Available: 120 <br>
                        Expected Annual Return: 9% <br>
                        Owner: Michael Johnson
                    </p>
                    <button class="updated-btn">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <div class="modal-body" wire:key="totalPrice-{{ $totalPrice }}-numShares-{{ $numShares }}-{{ now() }}">
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
                    key('totalPrice-' . $totalPrice . '-numShares-' . $numShares .  '-' . now()))
                </div>
            </div>
        </div>
    </div>
</div>
