<div>
    <style>
        :root {
            --main-color: #5ba600;
            --heading-color: #0d1741;
            --paragraph-color: #565872;
            --heading-font: "Rubik", sans-serif;
            --body-font: "Rubik", sans-serif;
            --body-font-size: 16px;
            --line-height30: 1.7;
        }

        body {
            font-family: var(--body-font);
            background-color: #f8f9fa;
            color: var(--paragraph-color);
        }

        .payout-container {
            max-width: 50vw;
            max-height: 75vh;
            margin: 50px auto;
            background: white;
            padding: 0px 30px;
            border-radius: 19px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 4px solid var(--main-color);
        }

        .payout-header {
            font-size: 24px;
            font-weight: bold;
            color: var(--heading-color);
            text-align: center;
        }

        .stripe-box {
            background-color: #6772e5;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 8px;
            margin-bottom: 10px;
            text-decoration: none;
            display: block;
            transition: background 0.3s;
        }

        .stripe-box:hover {
            background-color: #5469d4;
        }

        .stripe-text {
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 600;
            color: var(--heading-color);
        }
        input:focus, select:focus {
            border-color: var(--main-color) !important;
            box-shadow: 0 0 5px var(--main-color) !important;
            outline: none !important;
        }

        .withdraw-btn {
            background-color: var(--main-color);
            color: white;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .withdraw-btn:hover {
            background-color: #4c8d00;
        }
    </style>
{{--    <!-- breadcrumb start -->--}}
{{--    <div class="breadcrumb-area bg-overlay-2" style="background-image:url('assets/img/other/6.png')">--}}
{{--        <div class="container">--}}
{{--            <div class="breadcrumb-inner">--}}
{{--                <div class="section-title text-center">--}}
{{--                    <h2 class="page-title">Investor Details</h2>--}}
{{--                    <ul class="page-list">--}}
{{--                        <li><a href="index.html">Home</a></li>--}}
{{--                        <li>Investor Details</li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb end -->--}}
{{--    <div>--}}
{{--        <h2>Payout Request</h2>--}}
{{--        <form wire:submit.prevent="transferfunds">--}}
{{--            <input type="number" wire:model="amount" placeholder="Enter amount" class="form-control">--}}
{{--            <button type="submit" class="btn btn-primary mt-2">Request Payout</button>--}}
{{--        </form>--}}

{{--        @if(session()->has('success'))--}}
{{--            <div class="alert alert-success mt-2">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if(session()->has('error'))--}}
{{--            <div class="alert alert-danger mt-2">--}}
{{--                {{ session('error') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <script>--}}
{{--            Livewire.on('redirectTo', url => {--}}
{{--                window.location.href = url;--}}
{{--            });--}}
{{--        </script>--}}
{{--    </div>--}}
                <div class="modal-header justify-content-center position-relative">
                    <h2 class="payout-header">Withdraw Funds</h2>
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" >&times;</span>
                    </button>
                </div>

                <a href="https://stripe.com" target="_blank" class="stripe-box">
                    Linked with Stripe
                </a>
                <p class="stripe-text">Secure transactions powered by Stripe</p>

                <form id="payout-form" wire:submit.prevent="transferfunds">
                    <div class="mb-3">
                        <label class="form-label">User Name:</label>
                        <span id="user-name">{{$user->name}}</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Available Balance:</label>
                        <span id="balance">PK {{$profitAmount}}</span>
                    </div>

                    <div class="mb-3">
                        <label for="amount"  class="form-label">Amount ($)</label>
                        <input type="number" wire:model="amount" id="amount" class="form-control" min="1" placeholder="Enter withdrawal amount">
                    </div>

                    <button type="submit" class="withdraw-btn">Withdraw</button>
                </form>
</div>
