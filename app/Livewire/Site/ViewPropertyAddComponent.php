<?php

namespace App\Livewire\Site;

use App\Models\Property_investment;
use App\Models\Selling;
use App\Models\Transactions;
use Livewire\Component;

class ViewPropertyAddComponent extends Component
{
    public function buyProperty($id)
    {
        $buyer = auth()->user();
        if (!$buyer) {
            return redirect('/login');
        }

        $propertyAdd = Selling::where('id', $id)
            ->with('property')->first();

        if ($propertyAdd->user_id === $buyer->id) {
            session()->flash('error', 'You cannot place a bid on your own auction.');
            return redirect()->route('site.secondary.market'); // Redirect back to the form
        }

        if (!$propertyAdd || $propertyAdd->status != 'active') {
            session()->flash('error', 'This auction is not active or does not exist.');
            return redirect()->route('site.secondary.market');
        }


        $sellerInvestment = Property_investment::where('id', $propertyAdd->property_investment_id)->first();
        if (!$sellerInvestment || $sellerInvestment->shares_owned < $propertyAdd->no_of_shares) {
            session()->flash('error', 'Seller does not have enough shares to complete this transaction.');
            return redirect()->route('site.secondary.market');
        }

        // Deduct shares from the seller
        $sellerInvestment->shares_owned -= $propertyAdd->no_of_shares;
        $sellerInvestment->save();

        $buyerInvestment = Property_investment::where('user_id', $buyer->id)
            ->where('property_id', $propertyAdd->property_id)
            ->where('status', 'active')
            ->first();

        if ($buyerInvestment) {
            $buyerInvestment->shares_owned += $propertyAdd->no_of_shares;
            $buyerInvestment->share_price += $propertyAdd->share_amount;
            $buyerInvestment->total_investment += $propertyAdd->total_amount;
            $buyerInvestment->save();
        } else {

            Property_investment::create([
                'user_id' => $buyer->id,
                'property_id' => $propertyAdd->property_id,
                'shares_owned' => $propertyAdd->no_of_shares,
                'remaining_shares' => $propertyAdd->property->property_remaining_shares,
                'share_price' => $propertyAdd->share_amount,
                'payment_id' => 0, // Update if integrated with a payment system
                'activity' => 'buy',
                'status' => 'holding',
                'total_investment' => $propertyAdd->total_amount,
            ]);
        }

        $propertyAdd->status = 'completed';
        $propertyAdd->save();

        Transactions::create([
            'user_id' => $buyer->id,
            'property_id' => $propertyAdd->property_id,
            'shares_owned' => $propertyAdd->no_of_shares,
            'total_investment' => $propertyAdd->total_amount,
            'remaining_shares' => $propertyAdd->property->property_remaining_shares,
            'share_price' => $propertyAdd->share_amount,
            'payment_id' => 0,
            'activity' => 'buy',
            'status' => 'active',
        ]);

        Transactions::create([
            'user_id' => $propertyAdd->user_id,
            'property_id' => $propertyAdd->property_id,
            'shares_owned' => $propertyAdd->no_of_shares,
            'total_investment' => $propertyAdd->total_amount,
            'remaining_shares' => $propertyAdd->property->property_remaining_shares,
            'share_price' => $propertyAdd->share_amount,
            'payment_id' => 0,
            'activity' => 'sold',
            'status' => 'active',
        ]);

        return redirect()->route('site.investor.page');
    }

    public function render()
    {
        if (!empty(auth()->user())) {
            $user = auth()->user();
        } else {
            return redirect('/login');
        }

        $propertyAdds = Selling::where('status', 'active')
            ->with('property')
            ->with('user')->get();

        return view('livewire.site.viewPropertyAdd', compact('propertyAdds'))->extends('layouts.site');
    }
}
