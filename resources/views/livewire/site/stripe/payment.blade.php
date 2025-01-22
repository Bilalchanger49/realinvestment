{{--<div>--}}
{{--    <div class="container py-5 ">--}}
{{--        <div class="row justify-content-center">--}}

{{--            <form wire:submit.prevent="makePayment">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="amount">Total Amount:</label>--}}
{{--                    <input type="text" wire:model="amount"--}}
{{--                           class="form-control" id="amount"--}}
{{--                           placeholder="Enter Amount">--}}
{{--                    @error('amount')--}}
{{--                    <p><span class='text-danger'>{{$errors->first('amount')}}</span></p>--}}
{{--                    @enderror--}}

{{--                </div>--}}


{{--                <div class="form-group">--}}
{{--                    <label for="cardNumber">Card Number:</label>--}}
{{--                    <input type="text" wire:model="cardNumber" class="form-control" id="cardNumber"--}}
{{--                           placeholder="Enter Card Number">--}}
{{--                    @error('cardNumber')--}}
{{--                    <p><span class='text-danger'>{{$errors->first('cardNumber')}}</span></p>--}}
{{--                    @enderror--}}
{{--                </div>--}}


{{--                <div class="form-group">--}}
{{--                    <label for="cardExpiry">Expiration Date:</label>--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="col-md-6 mb-2">--}}
{{--                            <select class="form-control" wire:model="cardExpiryMonth" id="cardExpiryMonth">--}}
{{--                                <option value="" selected disabled>Month</option>--}}
{{--                                <option value="01">01</option>--}}
{{--                                <option value="02">02</option>--}}
{{--                                <option value="03">03</option>--}}
{{--                                <option value="04">04</option>--}}
{{--                                <option value="05">05</option>--}}
{{--                                <option value="06">06</option>--}}
{{--                                <option value="07">07</option>--}}
{{--                                <option value="08">08</option>--}}
{{--                                <option value="09">09</option>--}}
{{--                                <option value="10">10</option>--}}
{{--                                <option value="11">11</option>--}}
{{--                                <option value="12">12</option>--}}
{{--                            </select>--}}
{{--                            @error('cardExpiryMonth')--}}
{{--                            <p><span class='text-danger'>{{$errors->first('cardExpiryMonth')}}</span></p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <select class="form-control" wire:model="cardExpiryYear" id="cardExpiryYear">--}}
{{--                                <option value="" selected disabled>Year</option>--}}
{{--                                @php--}}
{{--                                    $currentYear = date('Y');--}}
{{--                                    $futureYears = 10;--}}
{{--                                @endphp--}}
{{--                                @for ($i = 0; $i <= $futureYears; $i++)--}}
{{--                                    <option value="{{ $currentYear + $i }}">{{ $currentYear + $i }}</option>--}}
{{--                                @endfor--}}
{{--                            </select>--}}
{{--                            @error('cardExpiryYear')--}}
{{--                            <p><span class='text-danger'>{{$errors->first('cardExpiryYear')}}</span></p>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="cardCVC">CVC:</label>--}}
{{--                    <input type="text" wire:model="cardCVC" class="form-control" id="cardCVC" placeholder="CVC">--}}
{{--                    @error('cardCVC')--}}
{{--                    <p><span class='text-danger'>{{$errors->first('cardCVC')}}</span></p>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="text-center mt-3">--}}
{{--                    <button type="submit" class="btn btn-primary btn-lg px-5">Pay Now</button>--}}
{{--                </div>--}}
{{--            </form>--}}


{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div>

    <form id="payment-form" method="POST">

        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
{{--            {{dump($propertyId)}}--}}
            <label>{{$totalPrice}}</label>
        </div>

        <div class="form-group">
            <label for="cardholder-name">Cardholder Name</label>
            <input type="text" id="cardholder-name" class="form-control" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="card-element">Credit or Debit Card</label>
            <div id="card-element" class="StripeElement">
                <!-- Stripe Card element will be injected here -->
            </div>
        </div>
        <button type="submit" id="submit-button" class="btn btn-primary btn-lg px-5">Pay Now</button>
{{--        <button type="submit" id="submit-button">Pay</button>--}}
    </form>

</div>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        document.addEventListener('livewire:init', function () {
            // This will ensure that Stripe is initialized after the modal is shown
            $('#send_funds_popup').on('shown.bs.modal', function () {
                // Add a delay to ensure that Stripe Elements has time to render properly
                setTimeout(function () {
                    // Initialize Stripe and Elements after the modal has shown
                    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
                    const elements = stripe.elements()
                    const cardElement = elements.create('card');
                    cardElement.mount('#card-element'); // Mount Stripe card element

                    $('#payment-form').on('submit', function (event) {
                        event.preventDefault(); // Prevent form submission
                        stripe.createToken(cardElement).then(function (result) {
                            if (result.error) {
                                // Log the specific error message and the entire error object for debugging
                                console.log('Error: ', result.error.message);
                                console.log('Full error object: ', result.error);

                                // Display error in the UI
                                $('#card-errors').text(result.error.message);
                            } else {
                                const paymentType = "{{ $paymentType }}"; // Passed from the server

                                if (paymentType === 'auction') {
                                    Livewire.dispatch('processAuctionPayment', { token: result.token.id })
                                } else if (paymentType === 'property') {
                                    console.log(paymentType)
                                    Livewire.dispatch('processPropertyPayment', { token: result.token.id })
                                } else if (paymentType === 'sellingAdd') {
                                    console.log(paymentType)
                                    Livewire.dispatch('processSellingAddPayment', { token: result.token.id })
                                } else {
                                    console.error('Unknown payment type:', paymentType)
                                }
                                // Livewire.dispatch('processPayment', { token: result.token.id })
                            }
                        });

                    });
                }, 500); // Adjust delay as needed
            });
        });
    </script>

