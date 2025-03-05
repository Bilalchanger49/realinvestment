<?php

namespace App\Livewire\Site\Stripe;

use App\Livewire\Site\BuyPropertyComponent;
use App\Services\BuyPropertyService;
use Livewire\Component;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;

class PaymentComponent extends Component
{
    public $paymentType;
    public $propertyId;
    public $sellingAddId;

    public $auctionId;
    public $totalPrice;
    public $numShares;
    public $amount;
    public $sharePrice;

    public $cardNumber;
    public $cardExpiryMonth;
    public $cardExpiryYear;
    public $cardCVC;

    public $paymentToken; // Token from the frontend

    protected $listeners = [
        'processPropertyPayment',
        'processAuctionPayment',
        'processSellingAddPayment'
    ];

    protected $rules = [
        'cardNumber' => 'required|regex:/^[0-9]{16}$/', // Matches a 16-digit card number
        'cardExpiryMonth' => 'required|numeric|between:1,12',
        'cardExpiryYear' => 'required|numeric|digits:4',
        'cardCVC' => 'required|numeric|digits:3',
    ];
    public function mount($id, $totalPrice, $numShares, $sharePrice, $paymentType)
    {
        $this->paymentType = $paymentType;
        $this->propertyId = $id;
        $this->auctionId = $id;
        $this->sellingAddId = $id;
        $this->totalPrice = $totalPrice;
        $this->numShares = $numShares;
        $this->sharePrice = $sharePrice;
        $this->amount = $totalPrice;
    }

    public function processPropertyPayment($token)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Use the token to create a charge
            $charge = Charge::create([
                'amount' => $this->totalPrice * 100, // Convert to cents
                'currency' => 'pkr',
                'source' => $token, // The token received from the frontend
                'description' => "Purchase of {$this->numShares} shares for property ID {$this->propertyId}",
                'receipt_email' => Auth::user()->email,
            ]);

            $buyPropertyService = new BuyPropertyService();
            $buyPropertyService->buyProperty($this->numShares, $this->propertyId, $this->totalPrice, $this->sharePrice, $token);
            session()->flash('success', 'Payment successful!');
            return redirect()->route('site.investor.page');
        } catch (\Exception $e) {
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
            return redirect()->route('site.home');
        }
    }

    public function processAuctionPayment($token)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
//dd($this->totalPrice *100);
        try {
            // Use the token to create a charge
            $charge = Charge::create([
                'amount' => $this->totalPrice * 100, // Convert to cents
                'currency' => 'pkr',
                'source' => $token, // The token received from the frontend
                'description' => "Purchase of {$this->numShares} shares for property ID {$this->auctionId}",
                'receipt_email' => Auth::user()->email,
            ]);

            $buyPropertyService = new BuyPropertyService();

            $buyPropertyService->buyAuction($this->auctionId, $token);
            session()->flash('success', 'Payment successful!');
            return redirect()->route('site.investor.page');
        } catch (\Exception $e) {
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
            return redirect()->route('site.home');
        }
    }

    public function processSellingAddPayment($token)
    {
//
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Use the token to create a charge
            $charge = Charge::create([
                'amount' => $this->totalPrice * 100,
                'currency' => 'pkr',
                'source' => $token, // The token received from the frontend
                'description' => "Purchase of {$this->numShares} shares for property ID {$this->sellingAddId}",
                'receipt_email' => Auth::user()->email,
            ]);


            $buyPropertyService = new BuyPropertyService();
            $buyPropertyService->buyPropertyByAdd($this->sellingAddId, $token);
            session()->flash('success', 'Payment successful!');
            return redirect()->route('site.investor.page');
        } catch (\Exception $e) {
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
            return redirect()->route('site.home');
        }
    }
    public function render()
    {
        return view('livewire.site.stripe.payment')->extends('layouts.site');
    }
}

