<div class="col-lg-4">
    <aside class="sidebar-area">
        <div class="widget widget-category">
            <form wire:submit.prevent="calculateTotal" method="POST">
                <div class="d-flex justify-content-between align-items-center" style="border-bottom: 1px solid black;">
                    <label>Total Shares</label>
                    <p class="mb-0 text-right">{{ $totalShares }}</p>
                </div>

                <div class="mt-2 d-flex justify-content-between align-items-center"
                     style="border-bottom: 1px solid black;">
                    <label>Available Shares</label>
                    <p class="mb-0 text-right">{{ $availableShares }}</p>
                </div>

                <div class="mt-2 d-flex justify-content-between align-items-center"
                     style="border-bottom: 1px solid black;">
                    <label>Share Price</label>
                    <p id="sharePrice" class="mb-0 text-right">{{ $sharePrice }}</p>
                </div>

                <!-- Input to select the number of shares -->
                <div class="mt-3">
                    <label for="numShares">Number of Shares to Buy:</label>

                    <input type="number" id="numShares" name="numShares" class="form-control" min="1"
                           max="{{ $availableShares }}"
                           wire:model="numShares"
                           wire:input="calculateTotal">
                </div>

                <!-- Display the total price -->
                <div class="mt-3 d-flex justify-content-between align-items-center"
                     style="border-bottom: 1px solid black;">
                    <label>Shares Total Price</label>
                    <p id="totalPrice" class="mb-0 text-right">{{ $totalPrice }}</p>
                </div>
                <div class="mt-3 d-flex justify-content-between align-items-center"
                     style="border-bottom: 1px solid black;">
                    <label>Real Investment Profit</label>
                    <p id="totalPrice" class="mb-0 text-right">{{ $profitAmount }}</p>
                </div>
                <div class="mt-3 d-flex justify-content-between align-items-center"
                     style="border-bottom: 1px solid black;">
                    <label>Total Price</label>
                    <p id="totalPrice" class="mb-0 text-right">{{ $priceWithCharges }}</p>
                </div>

                <!-- Buy button -->

                <div class="mt-3 text-center">
                    <div class="btn-wrap">
                        @if(Auth::user())
                        <button
                            id="openPopup" class="btn btn-base w-md-auto w-50"
                            data-toggle="modal" data-target="#send_funds_popup">
                            Buy
                        </button>
                        @else
                            <p><a href="{{route('login')}}">Login to Buy</a></p>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </aside>

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
                    'id' => $property->id,
                    'totalPrice' => $totalPrice,
                    'profitAmount' => $profitAmount,
                    'priceWithCharges' => $priceWithCharges,
                    'numShares' => $numShares,
                    'sharePrice' => $sharePrice,
                    'paymentType' => 'property'
                    ],
                    key('totalPrice-' . $totalPrice . '-numShares-' . $numShares .  '-' . now()))
                </div>

            </div>
        </div>
    </div>
</div>
