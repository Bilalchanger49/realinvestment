<div>
    <!-- Loading Overlay -->
    <div id="payment-loading-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(255,255,255,0.8); z-index:9999; text-align:center; padding-top:20%;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Processing...</span>
        </div>
        <h4 class="mt-3">Processing your payment, please wait...</h4>
    </div>


    <form id="payment-form" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount</label>
            <label>{{$totalPrice}}</label>
        </div>
        <div class="form-group">
            <label for="amount">Profit Amount</label>
            <label>{{$profitAmount}}</label>
        </div>
        <div class="form-group">
            <label for="amount">Price With Charges</label>
            <label>{{$priceWithCharges}}</label>
        </div>
        <div class="form-group">
            <label for="cardholder-name">Cardholder Name</label>
            <input type="text" id="cardholder-name" class="form-control" placeholder="John Doe" wire:model="cardHolderName">
            @error('cardHolderName')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="card-element">Credit or Debit Card</label>
            <div wire:ignore.self id="card-element" class="StripeElement">
                <!-- Stripe Card element will be injected here -->
            </div>
        </div>
        <button type="submit" id="submit-button" class="btn btn-primary btn-lg px-5">Pay Now</button>
    </form>


    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">


        document.addEventListener('livewire:init', function () {

            $('#send_funds_popup').on('shown.bs.modal', function () {
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
                                console.log('Error: ', result.error.message);
                                console.log('Full error object: ', result.error);

                                // Display error in the UI
                                $('#card-errors').text(result.error.message);
                            } else {
                                const paymentType = "{{ $paymentType }}"; // Passed from the server

                                if (paymentType === 'auction') {
                                    $('#payment-loading-overlay').show();
                                    Livewire.dispatch('processAuctionPayment', { token: result.token.id })
                                } else if (paymentType === 'property') {
                                    $('#payment-loading-overlay').show();
                                    Livewire.dispatch('processPropertyPayment', { token: result.token.id })
                                } else if (paymentType === 'sellingAdd') {
                                    $('#payment-loading-overlay').show();
                                    Livewire.dispatch('processSellingAddPayment', { token: result.token.id })
                                } else {
                                    console.error('Unknown payment type:', paymentType)
                                }
                            }
                        });

                    });
                }, 500);
                $('#payment-loading-overlay').hide();

            });
        });
    </script>


</div>
