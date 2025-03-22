<?php

namespace App\Livewire\Site;

use App\Models\Property;
use App\Models\Property_investment;
use App\Models\Transactions;
use App\Services\ProfitCalculationService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Stripe\Stripe;
use Stripe\Charge;


class BuyPropertyComponent extends Component
{
    public $totalShares;
    public $availableShares;
    public $sharePrice;
    public $numShares = 0;
    public $totalPrice = 0;
    public $property;
    public $profitAmount = 0;
    public $priceWithCharges = 0;

    public function mount($id)
    {
        $this->property = Property::where('id', $id)->first();
        $this->calculateTotal();
//        $this->totalPrice = $this->property->property_share_price;
        $this->sharePrice = $this->property->property_share_price;
        $this->totalShares = $this->property->property_total_shares;
        $this->availableShares = $this->property->property_remaining_shares;
    }

    public function render()
    {
        return view('livewire.site.buy-property')->extends('layouts.site');
    }


    public function buyProperty()
    {
        if (!empty(auth()->user()->id)) {
            $userId = auth()->user()->id;
        } else {
            return redirect('/login');
        }

        $propertyid = $this->property->id;
        $numOfShares = $this->numShares;
        $remainingShares = $this->property->property_remaining_shares - $this->numShares;
        $totalInvestment = $this->totalPrice;
        $sharePrice = $this->sharePrice;
        $paymentId = uniqid(); // Generate a unique payment ID
        $status = 'holding';
        $activity = 'buy';


        $existingInvestment = Property_investment::where('user_id', $userId)
            ->where('property_id', $propertyid)
            ->where('status', 'holding')
            ->first();

        if ($existingInvestment) {
            $existingInvestment->update([
                'shares_owned' => $existingInvestment->shares_owned + $numOfShares,
                'total_investment' => $existingInvestment->total_investment + $totalInvestment,
            ]);

            Transactions::create([
                'user_id' => $userId,
                'property_id' => $propertyid,
                'shares_owned' => $numOfShares,
                'total_investment' => $totalInvestment,
                'remaining_shares' => $remainingShares,
                'share_price' => $sharePrice,
                'payment_id' => $paymentId,
                'activity' => $activity,
                'status' => $status,
            ]);
        } else {
            Property_investment::create([
                'user_id' => $userId,
                'property_id' => $propertyid,
                'shares_owned' => $numOfShares,
                'total_investment' => $totalInvestment,
                'remaining_shares' => $remainingShares,
                'share_price' => $sharePrice,
                'payment_id' => $paymentId,
                'activity' => $activity,
                'status' => $status,
            ]);

            Transactions::create([
                'user_id' => $userId,
                'property_id' => $propertyid,
                'shares_owned' => $numOfShares,
                'total_investment' => $totalInvestment,
                'remaining_shares' => $remainingShares,
                'share_price' => $sharePrice,
                'payment_id' => $paymentId,
                'activity' => $activity,
                'status' => $status,
            ]);
        }

        $this->property->update([
            'property_remaining_shares' => $remainingShares,
        ]);

        session()->flash('success', 'Investment successful!');
        return redirect()->route('site.property.details', ['id' => $propertyid]);
    }

    public function calculateTotal()
    {
        if ($this->numShares < 1) {
            $this->totalPrice = 0;
            $this->profitAmount = 0;
            $this->priceWithCharges = 0;
        } else {
            $this->totalPrice = $this->numShares * $this->sharePrice;
            $profitCalculationService = new ProfitCalculationService();
            $this->profitAmount = $profitCalculationService->calculateProfit($this->totalPrice);
            $this->priceWithCharges = $this->totalPrice + $this->profitAmount;
        }
    }
}
