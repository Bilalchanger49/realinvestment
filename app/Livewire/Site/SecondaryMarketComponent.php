<?php


namespace App\Livewire\Site;

use App\Models\Auctions;
use App\Models\Bid;
use Livewire\Component;

class SecondaryMarketComponent extends Component
{
     public $bidPrize;
     public $totalshares;
     public $sharesToBuy;
     public $totalPrice;
     public $confirmAction;
     public $property_name;

     public $selectedAuction;
    public function OpenCreateBidPopup(int $id)
    {
        $auction = Auctions::where('id', $id)
            ->with('property')->first();
        $this->selectedAuction = $auction;
        $this->totalshares = (int) $auction->no_of_shares;
        $this->property_name = $auction->property->property_name;

    }
    public function calculateTotal()
    {
        if ($this->bidPrize < 1 || $this->sharesToBuy < 1) {
            $this->totalPrice = 0;
        }elseif ($this->sharesToBuy > $this->totalshares) {
            $this->totalPrice = 0;
        } else {
            $this->totalPrice = $this->sharesToBuy * $this->bidPrize;
        }
    }

    public function createBid()
    {

        // Validate data
        $validatedData = $this->validate([
            'bidPrize' => 'required|numeric|min:1',
            'sharesToBuy' => 'required|numeric|min:1',
            'totalPrice' => 'required|numeric|min:1',
            'confirmAction' => 'accepted',
        ]);

        // Check if the current user is the creator of the auction
        if ($this->selectedAuction->user_id === auth()->id()) {
            session()->flash('error', 'You cannot place a bid on your own auction.');
            return redirect()->route('site.secondary.market'); // Redirect back to the form
        }

        // Check if the user has already placed an active bid on the same investment
        $existingBid = Bid::where('user_id', auth()->id())
            ->where('auctions_id', $this->selectedAuction->id)
            ->where('status', 'active') // Assuming 'status' column tracks bid status
            ->first();


        if ($existingBid) {
            session()->flash('error', 'You already have an active bid on this investment.');
            return redirect()->route('site.secondary.market'); // Redirect back to the form
        }

        try {
            Bid::create([
                'user_id' => auth()->id(),
                'auctions_id' => $this->selectedAuction->id,
                'share_amount' => $validatedData['bidPrize'],
                'total_shares' => $validatedData['sharesToBuy'],
                'total_price' => $validatedData['totalPrice'],
                'end_date' => now()->addDays(7),
                'status' => 'active',
            ]);

            session()->flash('success', 'Bid created successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            session()->flash('error', 'Failed to create bid. Please try again.');
        }
        // Redirect to the desired page
        return redirect()->route('site.investor.page');
    }

    public function render()
    {

//        if (!empty(auth()->user())) {
//            $user = auth()->user();
//        }else{
//            return redirect('/login');
//        }

        $auctions = Auctions::with('property')->with('user')->get();

//        dd($auctions);
        return view('livewire.site.secondary-market', compact('auctions'))->extends('layouts.site');
    }
}
