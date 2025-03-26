<?php

namespace App\Livewire\Site\Stripe;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Stripe\AccountLink;
use Stripe\FinancialConnections\Account;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Transfer;
use Illuminate\Http\Request;


class PayoutComponent extends Component
{
    public $amount;
    public $profitAmount;
    public $user;

    public function mount($profitAmount){
        $this->profitAmount = $profitAmount;
        $this->user = Auth::user();
    }
    public function transferfunds()
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $stripe = new StripeClient(env('STRIPE_SECRET'));


        $stripeAccountId = $this->user->stripe_account_id;
        $amountInCents = $this->amount * 100;

        $transfer = Transfer::create([
            'amount' => $amountInCents,
            'currency' => 'usd',
            'destination' => $stripeAccountId,
        ]);
        dd($transfer);
    }


    public function render()
    {
        return view('livewire.site.stripe.payout')->extends('layouts.site');
    }

    public function redirectToStripe()
    {
        $clientId = env('STRIPE_CLIENT_ID');
        $redirectUri = env('STRIPE_REDIRECT_URI');
        $state = csrf_token(); // CSRF protection

        $url = "https://connect.stripe.com/oauth/authorize?response_type=code&client_id={$clientId}&scope=read_write&state={$state}&redirect_uri={$redirectUri}";

        return redirect()->away($url);
    }

    public function handleCallback(Request $request)
    {
        $code = $request->get('code');
        $state = $request->get('state');
        // Validate state token
        if ($state !== csrf_token()) {
            return redirect('/')->with('error', 'Invalid state parameter.');
        }
        if (!$code) {
            return redirect('/')->with('error', 'Stripe authorization failed.');
        }
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\OAuth::token([
                'grant_type' => 'authorization_code',
                'code' => $code,
            ]);

            $connectedAccountId = $response->stripe_user_id;

            // Store it in database (assuming users table)
            auth()->user()->update(['stripe_account_id' => $connectedAccountId]);

            return redirect('/')->with('success', 'Stripe account connected successfully.');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Error connecting to Stripe: ' . $e->getMessage());
        }
    }


    public function unlinkStripe()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            \Stripe\OAuth::deauthorize([
                'client_id' => env('STRIPE_CLIENT_ID'),
                'stripe_user_id' => auth()->user()->stripe_account_id,
            ]);

            // Remove account ID from database
            auth()->user()->update(['stripe_account_id' => null]);

            return redirect('/')->with('success', 'Stripe account disconnected.');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Error disconnecting Stripe: ' . $e->getMessage());
        }
    }

}

