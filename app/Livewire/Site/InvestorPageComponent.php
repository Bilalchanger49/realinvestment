<?php

namespace App\Livewire\Site;

use App\Models\Auctions;
use App\Models\Bid;
use App\Models\Property;
use App\Models\Property_investment;
use App\Models\ReturnDistributions;
use App\Models\Selling;
use App\Models\Transactions;
use App\Models\User;
use App\Notifications\AuctionConfirmedNotification;
use App\Notifications\BidConfirmedNotification;
use App\Notifications\BidResponseNotification;
use App\Notifications\NewAdvertisementNotification;
use App\Services\ProfitCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

/**
 * @method dispatchBrowserEvent(string $string)
 */
class InvestorPageComponent extends Component
{
    public $bids = [];
    public $bid;
    public $confirmAction;
    public $confirmActionForAdd;
    public $price_per_share = 0;
    public $price_per_share_for_add = 0;
    public $no_of_shares = 0;
    public $no_of_shares_for_add = 0;
    public $total_price_for_add = 0;
    public $total_price = 0;
    public $profitAmount;
    public $priceWithCharges;
    public $total_shares;
    public $share_amount;
    public $shares_to_sell = 0;
    public $shares_to_sell_for_add = 0;
    public $property_name;
    public $investmentId;

    public $auction_id;
    public $bid_id;
    public $min_bid_price;
    public $selectedAuction;
    public $totalshares;
    public $bidPrize;
    public $sharesToBuy;
    public $totalPrice;


    public $share_amount_placed;

    public $end_date;

    public $investment;
    public $activeTab = 'active-investments';

    public function mount($activeTab){
        $this->activeTab = $activeTab;
    }
    public function setActiveTab($tab){
        $this->activeTab = $tab;
    }

    public function open_active_investment_popup(int $id)
    {
        $propertyInvestment = Property_investment::where('id', $id)
            ->with('property')->first();
        $this->no_of_shares = (int)$propertyInvestment->shares_owned;
        $this->property_name = $propertyInvestment->property->property_name;
        $this->investment = $propertyInvestment;
    }

    public function open_property_add_popup(int $id)
    {
        $propertyInvestment = Property_investment::where('id', $id)
            ->with('property')->first();
        $this->no_of_shares_for_add = (int)$propertyInvestment->shares_owned;
        $this->property_name = $propertyInvestment->property->property_name;
        $this->investment = $propertyInvestment;
    }

    public function calculateTotal()
    {
        if ($this->shares_to_sell < 1 || $this->price_per_share < 1) {
            $this->total_price = 0;
        } elseif ($this->shares_to_sell > $this->no_of_shares) {
            $this->total_price = 0;
        } else {

            $this->total_price = $this->shares_to_sell * $this->price_per_share;
        }
    }

    public function calculateEditBidTotal()
    {
        if ($this->bidPrize < 1 || $this->sharesToBuy < 1) {
            $this->totalPrice = 0;
        }elseif ($this->sharesToBuy > $this->totalshares) {
            $this->totalPrice = 0;
        } else {
            $this->totalPrice = $this->sharesToBuy * $this->bidPrize;
        }
    }

    public function calculateTotalForAdd()
    {
        if ($this->shares_to_sell_for_add < 1 || $this->price_per_share_for_add < 1) {
            $this->total_price_for_add = 0;
        } elseif ($this->shares_to_sell_for_add > $this->no_of_shares_for_add) {
            $this->total_price_for_add = 0;
        } else {

            $this->total_price_for_add = $this->shares_to_sell_for_add * $this->price_per_share_for_add;
        }
    }

    public function createAuction()
    {
        //validation data
        $this->validate([
            'price_per_share' => 'required|numeric|min:1',
            'shares_to_sell' => 'required|numeric|min:1',
            'confirmAction' => 'accepted',
        ]);

        //checking if user has made an auction before for this investment
        $existingAuction = Auctions::where('property_investment_id', $this->investment->id)
            ->where('user_id', auth()->id())
            ->where('status', 'active')->first();

        if ($existingAuction) {
            return back()->withErrors(['auction' => 'You have already created an auction for these shares.']);
        }


        $auctions = Auctions::create([
            'user_id' => auth()->id(),
            'property_investment_id' => $this->investment->id,
            'property_id' => $this->investment->property->id,
            'no_of_shares' => $this->shares_to_sell,
            'share_amount_placed' => $this->price_per_share,
            'total_amount_placed' => $this->total_price,
            'remaining_shares' => $this->no_of_shares - $this->shares_to_sell,
            'status' => 'active',
        ]);
        $user = auth()->user();
        $property = Property::where('id', $auctions->property_id)->first();
        if($auctions){
            $user->notify(new AuctionConfirmedNotification($auctions->total_amount_placed, $property->property_name, $user->name));
            session()->flash('success', 'Auction created successfully.');
        }else{
            session()->flash('error', 'Auction not created due to an issue');
        }
        return redirect()->route('site.investor.page',[$activeTab = 'active-auctions']);
    }


    public function deleteAuction()
    {
        // Find and delete the auction
        $auction = Auctions::where('id', $this->auction_id)->first();
        if ($auction) {
            $auction->delete();
            // Flash success message
            session()->flash('success', 'Auction deleted successfully.');
        } else {
            session()->flash('error', 'Auction not found.');
        }

        return redirect()->route('site.investor.page',[$activeTab = 'active-auctions']);
    }

    public function deleteBid()
    {
        // Find and delete the $bid
        $bid = Bid::where('id', $this->bid_id)->first();
        if ($bid) {
            $bid->delete();
            // Flash success message
            session()->flash('success', 'Bid deleted successfully.');
        } else {
            session()->flash('error', 'Bid not found.');
        }

        return redirect()->route('site.investor.page',[$activeTab = 'active-bids']);
    }

    public function confirmDelete($id, $propertyName)
    {
        $this->auction_id = $id;
        $this->property_name = $propertyName;
    }

    public function confirmBidDelete($id, $auction_id)
    {
        $this->bid_id = $id;
        $auction = Auctions::where('id', $auction_id)->first();
        $property = Property::where('id', $auction->property_id)->first();
        $this->property_name = $property->property_name;
    }

    public function openBidPopup($auctionId)
    {
        $this->auction_id = $auctionId;
        $this->bids = Bid::where('auctions_id', $auctionId)
            ->with('user') // To load user details
            ->get();
    }

    public function openAuctionTransactionPopup($auctionId)
    {
        $bid = Bid::findOrFail($auctionId);

        $this->auction_id = $auctionId;
        $this->total_price = $bid->total_price;
        $this->total_shares = $bid->total_shares;
        $this->share_amount = $bid->share_amount;

        $profitCalculationService = new ProfitCalculationService();
        $this->profitAmount = $profitCalculationService->calculateProfit($this->total_price);
        $this->priceWithCharges = $this->total_price + $this->profitAmount;
    }


    public function acceptBid($bidId)
    {
        $bid = Bid::where('id', $bidId)->first();
        $auction = Auctions::where('id', $bid->auctions_id)->first();


        if ($bid) {
            $bid->status = 'accepted';
            $bid->save();
            $bidCreator = User::find($bid->user_id);
            $auctionCreator = User::find($auction->user_id);
            $property = Property::find($auction->property_id);
            $response = 'accepted';

            if ($bidCreator) {
                $bidCreator->notify(new BidResponseNotification($property->property_name, $response, $bidCreator->name, $auctionCreator->name,$bid->total_price));
                session()->flash('success', 'Bid accepted successfully.');
            } else {
                session()->flash('error', 'User not found for notification.');
            }
        }
    }

    public function rejectBid($bidId)
    {
        $bid = Bid::find($bidId);
        $auction = Auctions::where('id', $bid->auctions_id)->first();

        if ($bid) {
            $bid->status = 'rejected';
            $bid->save();
            $bidCreator = User::find($bid->user_id);
            $auctionCreator = User::find($auction->user_id);
            $property = Property::find($auction->property_id);
            $response = 'rejected';

            if ($bidCreator) {
                $bidCreator->notify(new BidResponseNotification($property->property_name, $response, $bidCreator->name, $auctionCreator->name,$bid->total_price));
                session()->flash('error', 'Bid rejected successfully.');
            } else {
                session()->flash('error', 'User not found for notification.');
            }
        }
    }

    public function createSellingAdd()
    {

        $this->validate([
            'price_per_share_for_add' => 'required|numeric|min:1',
            'shares_to_sell_for_add' => 'required|numeric|min:1',
            'confirmActionForAdd' => 'accepted',
        ]);

        $existingAdd = Selling::where('property_investment_id', $this->investment->id)
            ->where('user_id', auth()->id())
            ->where('status', 'active')->first();

        if ($existingAdd) {
            session()->flash('error', 'you have already created an add for this investment.');
            return redirect()->route('site.investor.page',[$activeTab = 'advertisements']);
        }

        $propertyAdd = Selling::create([
            'user_id' => auth()->id(),
            'property_investment_id' => $this->investment->id,
            'property_id' => $this->investment->property->id,
            'no_of_shares' => $this->shares_to_sell_for_add,
            'share_amount' => $this->price_per_share_for_add,
            'total_amount' => $this->total_price_for_add,
            'remaining_shares' => $this->no_of_shares_for_add - $this->shares_to_sell_for_add,
            'status' => 'active',
        ]);

        $seller = User::find($propertyAdd->user_id);
        $Amount = $propertyAdd->total_amount;
        $property = Property::where('id', $propertyAdd->property_id)->first();
        if($seller){
            $seller->notify(new NewAdvertisementNotification($Amount, $property->property_name, $seller->name));
            session()->flash('success', 'Advertisement created successfully.');
        }else{
            session()->flash('error', 'Advertisement not created due to an issue');
        }

//        session()->flash('success', 'Advertisement successfully created.');
        return redirect()->route('site.investor.page',[$activeTab = 'advertisements']);
    }

    public function OpenEditBidPopup(int $id)
    {
        $this->bid = Bid::where('id', $id)->first();
        $auction = Auctions::where('id', $this->bid->auctions_id)
            ->with('property')->first();
        $this->min_bid_price = Bid::where('auctions_id', $auction->id)->max('share_amount') + 1;
        $this->selectedAuction = $auction;
        $this->totalshares = (int) $auction->no_of_shares;
        $this->property_name = $auction->property->property_name;
        $this->bidPrize = $this->bid->share_amount;
        $this->sharesToBuy = $this->bid->total_shares;
        $this->totalPrice = $this->bid->total_price;
    }

    public function updateBid()
    {
        // Validate updated data
        $validatedData = $this->validate([
            'bidPrize' => "required|numeric|min:$this->min_bid_price",
            'sharesToBuy' => 'required|numeric|min:1',
            'totalPrice' => 'required|numeric|min:1',
            'confirmAction' => 'accepted',
        ]);


        // Retrieve the bid to update (you should already have it set, e.g., $this->editingBid)
        $bid = Bid::where('id', $this->bid->id)
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->with('auctions')
            ->first();

        if (!$bid) {
            session()->flash('error', 'Bid not found or cannot be updated.');
            return redirect()->route('site.property.all');
        }

        // Check if the auction still belongs to the same auction object
        if ($bid->auctions->user_id === auth()->id()) {
            session()->flash('error', 'You cannot edit a bid on your own auction.');
            return redirect()->route('site.property.all');
        }

        try {
            // Update the bid
            $bid->update([
                'share_amount' => $validatedData['bidPrize'],
                'total_shares' => $validatedData['sharesToBuy'],
                'total_price' => $validatedData['totalPrice'],
                'updated_at' => now(),
            ]);

            $user = User::find($bid->user_id);
//            $auctionCreator = User::find($bid->auction->user_id);
//            $property = Property::find($bid->auction->property_id);

            if ($user) {
//                $user->notify(new BidConfirmedNotification($property->property_name, $bid->share_amount, $user->name));
//                $auctionCreator->notify(
//                    new AuctionResponseNotification($property->property_name, $bid->share_amount,
//                        $user->name, $bid->auction->user_id));
                session()->flash('success', 'Bid updated successfully!');
            } else {
                session()->flash('error', 'User not found for notification.');
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update bid: ' . $e->getMessage());
        }

        return redirect()->route('site.investor.page', [$activeTab = 'active-bids']);
    }

    public function render()
    {
        if (!empty(auth()->user())) {
            $user = auth()->user();
        } else {
            return redirect('/login');
        }

        //all investments
        $propertyInvestments = Property_investment::where('user_id', $user->id)
            ->with('property')->get();
        $investments = Property_investment::selectRaw('
            property_id,
            SUM(shares_owned) as total_shares,
            COUNT(DISTINCT property_id) as total_properties,
            SUM(total_investment) as total_investment
        ')
            ->where('user_id', $user->id)
            ->groupBy('property_id')
            ->with('property')
            ->get();


        //all transactions
        $transctions = Transactions::where('user_id', $user->id)
            ->with('property')
            ->get();


        // total sums for profile
        $overallShares = $investments->sum('total_shares');
        $overallInvestment = $investments->sum('total_investment');
        $totalProperties = $investments->count();

        //Auctions
        $auctions = Auctions::where('user_id', $user->id)
            ->with('property')
            ->get();

        $userbids = Bid::where('user_id', $user->id)
            ->with('auctions')
            ->with('user')
            ->get();

        $returndistribution = ReturnDistributions::where('user_id', $user->id)->sum('amount');;
//        dd($returndistribution);
        return view('livewire.site.investorPage', compact('returndistribution', 'userbids', 'auctions', 'transctions', 'propertyInvestments', 'user', 'overallShares', 'overallInvestment', 'totalProperties'))->extends('layouts.site');
    }

}

