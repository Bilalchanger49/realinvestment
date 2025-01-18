<?php

namespace App\Services;

use App\Models\Auctions;
use App\Models\Bid;
use App\Models\Property;
use App\Models\Property_investment;
use App\Models\Selling;
use App\Models\Transactions;

class BuyPropertyService
{
    public function buyProperty($numShares, $propertyId, $totalPrice, $sharePrice, $token)
    {
//        dd('inside buy property');
        if (!empty(auth()->user()->id)) {
            $userId = auth()->user()->id;
        } else {
            return redirect('/login');
        }

        $property = Property::where('id', $propertyId)->first();
        $numOfShares = $numShares;
        $remainingShares = $property->property_remaining_shares - $numShares;
        $totalInvestment = $totalPrice;
//        $sharePrice = $sharePrice;
        $paymentId = $token;
        $status = 'holding';
        $activity = 'buy';


        $existingInvestment = Property_investment::where('user_id', $userId)
            ->where('property_id', $propertyId)
            ->where('status', 'holding')
            ->first();

        if ($existingInvestment) {
            $existingInvestment->update([
                'shares_owned' => $existingInvestment->shares_owned + $numOfShares,
                'total_investment' => $existingInvestment->total_investment + $totalInvestment,
            ]);

            Transactions::create([
                'user_id' => $userId,
                'property_id' => $propertyId,
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
                'property_id' => $propertyId,
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
                'property_id' => $propertyId,
                'shares_owned' => $numOfShares,
                'total_investment' => $totalInvestment,
                'remaining_shares' => $remainingShares,
                'share_price' => $sharePrice,
                'payment_id' => $paymentId,
                'activity' => $activity,
                'status' => $status,
            ]);
        }

        $property->update([
            'property_remaining_shares' => $remainingShares,
        ]);

        session()->flash('success', 'Investment successful!');
        return redirect()->route('site.property.details', ['id' => $propertyId]);
    }

    public function buyAuction($auctionId, $token)
    {
        // Fetch the auction details
        $auction = Auctions::where('id', $auctionId)->first();
        $paymentId = $token;

        if (!$auction || $auction->status != 'active') {
            session()->flash('error', 'This auction is not active or does not exist.');
            return;
        }

        // Fetch the accepted bid for this auction
        $bid = Bid::where('auctions_id', $auctionId)
            ->where('status', 'accepted')
            ->first();

        if (!$bid) {
            session()->flash('error', 'No accepted bid found for this auction.');
            return;
        }

        // Fetch the buyer (current user)
        $buyer = auth()->user();
        if (!$buyer) {
            return redirect('/login');
        }

        // Fetch the seller's property investment
        $sellerInvestment = Property_investment::where('id', $auction->property_investment_id)->first();
        if (!$sellerInvestment || $sellerInvestment->shares_owned < $bid->total_shares) {
            session()->flash('error', 'Seller does not have enough shares to complete this transaction.');
            return;
        }

        // Deduct shares from the seller
        $sellerInvestment->shares_owned -= $bid->total_shares;
        $sellerInvestment->save();

        // Update the buyer's property investment or create a new one
        $buyerInvestment = Property_investment::where('user_id', $buyer->id)
            ->where('property_id', $auction->property_id)
            ->first();

        if ($buyerInvestment) {
            $buyerInvestment->shares_owned += $bid->total_shares;
            $buyerInvestment->share_price += $bid->share_amount;
            $buyerInvestment->total_investment += $bid->total_price;
            $buyerInvestment->save();
        } else {
            Property_investment::create([
                'user_id' => $buyer->id,
                'property_id' => $auction->property_id,
                'shares_owned' => $bid->total_shares,
                'remaining_shares' => $auction->no_of_shares - $bid->total_shares,
                'share_price' => $bid->share_amount,
                'payment_id' => $paymentId, // Update if integrated with a payment system
                'activity' => 'buy',
                'status' => 'holding',
                'total_investment' => $bid->total_price,
            ]);
        }

        // Update the number of shares in the auction
        $auction->no_of_shares -= $bid->total_shares;

        // Mark the auction as completed if all shares are sold
        if ($auction->no_of_shares <= 0) {
            $auction->status = 'completed';
        }

        $auction->save();

        // Mark the bid as completed
        $bid->status = 'completed';
        $bid->save();

        // Log the transaction
        Transactions::create([
            'user_id' => $buyer->id,
            'property_id' => $auction->property_id,
            'shares_owned' => $bid->total_shares,
            'total_investment' => $bid->total_price,
            'remaining_shares' => $sellerInvestment->shares_owned,
            'share_price' => $bid->share_amount,
            'payment_id' => $paymentId,
            'activity' => 'buy',
            'status' => 'active',
        ]);

        Transactions::create([
            'user_id' => $auction->user_id,
            'property_id' => $auction->property_id,
            'shares_owned' => $bid->total_shares,
            'total_investment' => $bid->total_price,
            'remaining_shares' => $sellerInvestment->shares_owned,
            'share_price' => $bid->share_amount,
            'payment_id' => $paymentId,
            'activity' => 'sold',
            'status' => 'active',
        ]);

        // Flash success message
        session()->flash('success', 'Shares successfully transferred.');
        return redirect()->route('site.investor.page');
    }

    public function buyPropertyByAdd($id, $token)
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
                'payment_id' => $token, // Update if integrated with a payment system
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
            'payment_id' => $token,
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
            'payment_id' => $token,
            'activity' => 'sold',
            'status' => 'active',
        ]);
        session()->flash('success', 'shares transferred successfully.');
        return redirect()->route('site.investor.page');
    }
}
