<div>
    @foreach($propertyAdds as $propertyAdd)
        @php
            /** @var string $images */
            $image = $images->firstWhere('property_id', $propertyAdd->property->id);
        @endphp
        <div class="col-lg-6">
            <div class="single-product-wrap style-bottom">
                <div class="thumb">
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                         alt="Modern Family House">
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
                    <span class="price">Token Price: {{$propertyAdd->share_amount_placed}}</span>
                    <span>
                        <button class="card__button text-decoration-none"
                                wire:click.prevent="openSellingAddTransactionPopup({{$propertyAdd->id}})"
                                data-toggle="modal" data-target="#send_funds_popup">Buy Now</button>
                    </span>
                </div>
            </div>
        </div>
    @endforeach


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
                    key('totalPrice-' . $totalPrice . '-numShares-' . $numShares . '-' . now()))
                </div>
            </div>
        </div>
    </div>
</div>
