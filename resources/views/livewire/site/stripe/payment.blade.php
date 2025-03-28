
<div>

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

