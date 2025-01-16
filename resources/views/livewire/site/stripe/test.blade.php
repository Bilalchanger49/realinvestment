{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <title>Stripe Custom Checkout</title>--}}
{{--    <style>--}}
{{--        .StripeElement {--}}
{{--            background-color: white;--}}
{{--            height: 40px;--}}
{{--            padding: 10px 12px;--}}
{{--            border-radius: 4px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            box-shadow: 0 1px 3px 0 #e6ebf1;--}}
{{--            transition: box-shadow 150ms ease;--}}
{{--        }--}}

{{--        .form-group {--}}
{{--            margin-bottom: 15px;--}}
{{--        }--}}

{{--        #submit-button {--}}
{{--            margin-top: 20px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
<div>

<h1>Stripe Custom Checkout</h1>

<form id="payment-form" method="POST">
    @csrf
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

    <button id="submit-button">Pay</button>
</form>

<div id="payment-result" style="display:none;">
    <h2>Payment Successful!</h2>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('livewire:init', function () {
        // This will ensure that Stripe is initialized after the modal is shown
        $('#send_funds_popup').on('shown.bs.modal', function () {
            // Add a delay to ensure that Stripe Elements has time to render properly
            setTimeout(function () {
                // Initialize Stripe and Elements after the modal has shown
                const stripe = Stripe("{{ env('STRIPE_KEY') }}");
                const elements = stripe.elements();
                const cardElement = elements.create('card');
                cardElement.mount('#card-element'); // Mount Stripe card element
            }, 500); // Adjust delay as needed
        });
    });
    {{--const stripe = Stripe("{{ env('STRIPE_KEY') }}");--}}
    {{--const elements = stripe.elements();--}}
    {{--const cardElement = elements.create('card');--}}
    {{--cardElement.mount('#card-element');--}}

    {{--const form = document.getElementById('payment-form');--}}
    {{--form.addEventListener('submit', async (event) => {--}}
    {{--    event.preventDefault();--}}
    {{--    document.getElementById('submit-button').disabled = true;--}}

    {{--    const clientSecret = @json($intent->client_secret);--}}
    {{--    const cardholderName = document.getElementById('cardholder-name').value;--}}

    {{--    const {paymentIntent, error} = await stripe.confirmCardPayment(clientSecret, {--}}
    {{--        payment_method: {--}}
    {{--            card: cardElement,--}}
    {{--            billing_details: {--}}
    {{--                name: cardholderName,--}}
    {{--            },--}}
    {{--        }--}}

    {{--    });--}}
    {{--    // console.log(paymentIntent);--}}
    {{--    if (paymentIntent.status === 'succeeded') {--}}


    {{--        const playlistId = '{{$playlist->id}}';--}}
    {{--        const playlistSlug = '{{$playlist->playlist_slug}}';--}}
    {{--        const paymentId = paymentIntent.id;--}}


    {{--        const response = await fetch(`/payment-success/${paymentId}/${playlistId}`, {--}}
    {{--            method: 'POST',--}}
    {{--            headers: {--}}
    {{--                'Content-Type': 'application/json',--}}
    {{--                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel--}}
    {{--            }--}}
    {{--        });--}}

    {{--        console.log(response)--}}
    {{--        const data = await response.json();--}}
    {{--        if (data.success) {--}}
    {{--            alert('success')--}}
    {{--            window.location.href = `/courses/${playlistSlug}`;--}}
    {{--        } else {--}}
    {{--            alert('Something went wrong!');--}}
    {{--        }--}}
    {{--    }--}}
    {{--});--}}
</script>

</div>
{{--</html>--}}
