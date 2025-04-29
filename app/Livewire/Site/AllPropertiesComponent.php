<?php

namespace App\Livewire\Site;

use App\Models\Auctions;
use App\Models\Bid;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Selling;
use App\Models\User;
use App\Notifications\AuctionResponseNotification;
use App\Notifications\BidConfirmedNotification;
use App\Services\ProfitCalculationService;
use Livewire\Component;
use Livewire\WithPagination;

class AllPropertiesComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $bidPrize;
    public $totalshares;
    public $sharesToBuy;
    public $totalPrice;
    public $confirmAction;
    public $property_name;

    public $selectedAuction;

    public $sellingAddId;
    public $numShares;
    public $sharePrice;
    public $profitAmount;
    public $priceWithCharges;
    public $min_bid_price;

    public $activeTab = 'properties';

    public function setActiveTab($tab){
        $this->activeTab = $tab;
    }
    public function openSellingAddTransactionPopup($sellingAddId)
    {
        $sellingAdd = Selling::where('id', $sellingAddId)->first();
        $this->sellingAddId = $sellingAdd->id;
        $this->totalPrice = $sellingAdd->total_amount;
        $this->numShares = $sellingAdd->no_of_share;
        $this->sharePrice = $sellingAdd->share_amount;

        $profitCalculationService = new ProfitCalculationService();
        $this->profitAmount = $profitCalculationService->calculateProfit($this->totalPrice);
        $this->priceWithCharges = $this->totalPrice + $this->profitAmount;
    }
    public function OpenCreateBidPopup(int $id)
    {
        $auction = Auctions::where('id', $id)
            ->with('property')->first();
        $this->min_bid_price = Bid::where('auctions_id', $auction->id)->max('share_amount') +1;
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
            'bidPrize' => "required|numeric|min:$this->min_bid_price",
            'sharesToBuy' => 'required|numeric|min:1',
            'totalPrice' => 'required|numeric|min:1',
            'confirmAction' => 'accepted',
        ]);

        // Check if the current user is the creator of the auction
        if ($this->selectedAuction->user_id === auth()->id()) {
            session()->flash('error', 'You cannot place a bid on your own auction.');
            return redirect()->route('site.property.all'); // Redirect back to the form
        }

        // Check if the user has already placed an active bid on the same investment
        $existingBid = Bid::where('user_id', auth()->id())
            ->where('auctions_id', $this->selectedAuction->id)
            ->where('status', 'active') // Assuming 'status' column tracks bid status
            ->first();


        if ($existingBid) {
            session()->flash('error', 'You already have an active bid on this investment.');
            return redirect()->route('site.property.all'); // Redirect back to the form
        }

        try {
            // Create a bid and refresh to get model instance
            $bid = Bid::create([
                'user_id' => auth()->id(),
                'auctions_id' => $this->selectedAuction->id,
                'share_amount' => $validatedData['bidPrize'],
                'total_shares' => $validatedData['sharesToBuy'],
                'total_price' => $validatedData['totalPrice'],
                'end_date' => now()->addDays(7),
                'status' => 'active',
            ])->fresh(); // Ensures we get the model instance

            // Ensure user exists
            $user = User::find($bid->user_id);
            $auctionCreator = User::find($this->selectedAuction->user_id);
            $property = Property::find($this->selectedAuction->property_id);


            if ($user) {
                $user->notify(new BidConfirmedNotification($property->property_name, $bid->share_amount, $user->name));
                $auctionCreator->notify(
                    new AuctionResponseNotification($property->property_name, $bid->share_amount,
                        $user->name, $this->selectedAuction->user_id));
                session()->flash('success', 'Bid created successfully!');
            } else {
                session()->flash('error', 'User not found for notification.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to create bid: ' . $e->getMessage());
//            \Log::error('Bid creation failed', ['error' => $e]);
        }

        // Redirect to the desired page
        return redirect()->route('site.investor.page',[$activeTab = 'active-bids']);
    }

    public function render()
    {
        $images = PropertyImage::all();
        $queryProperties = Property::query();
        $queryAuctions = Auctions::with('property', 'user');

        if (!empty($this->search)) {
                $queryProperties->where('property_name', 'like', '%' . $this->search . '%');

                $queryAuctions->whereHas('property', function ($query) {
                    $query->where('property_name', 'like', '%' . $this->search . '%');
                });
        }

        $queryAdvertisement = Selling::where('status', 'active')->with('property')->with('user');

        if (!empty($this->search)) {
            $queryAdvertisement->whereHas('property', function ($query) {
                $query->where('property_name', 'like', '%' . $this->search . '%');
            });
        }

        $properties = $queryProperties->latest()->paginate(1);
        $auctions = $queryAuctions->latest()->paginate(1);
        $advertisements = $queryAdvertisement->latest()->paginate(1);

        return view('livewire.site.allProperties', [
            'propertyAdds' => $advertisements,
            'properties' => $properties,
            'auctions' => $auctions,
            'images' => $images
        ])->extends('layouts.site');
    }

}
