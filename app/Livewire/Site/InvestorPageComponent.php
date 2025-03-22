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


    public $share_amount_placed;

    public $end_date;

    public $investment;

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
//        dd('open_property_add_popup');
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
        return redirect()->route('site.investor.page');
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

        return redirect()->route('site.investor.page');
    }

    public function confirmDelete($id, $propertyName)
    {
        $this->auction_id = $id;
        $this->property_name = $propertyName;
    }

    public function openBidPopup($auctionId)
    {
        $this->auction_id = $auctionId;
        $this->bids = Bid::where('auctions_id', $auctionId)
            ->with('user') // To load user details
            ->get();
    }

//    public function openAuctionTransactionPopup($auctionId, $total_shares, $total_price, $share_amount)
//    {
//        dd('openAuctionTransactionPopup');
//        $this->auction_id = $auctionId;
//        $this->total_price = $total_price;
//        $this->total_shares = $total_shares;
//        $this->share_amount = $share_amount;
//    }
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

//    public function buyAuction($auctionId)
//    {
//        // Fetch the auction details
//        $auction = Auctions::where('id', $auctionId)->first();
//
//        if (!$auction || $auction->status != 'active') {
//            session()->flash('error', 'This auction is not active or does not exist.');
//            return;
//        }
//
//        // Fetch the accepted bid for this auction
//        $bid = Bid::where('auctions_id', $auctionId)
//            ->where('status', 'accepted')
//            ->first();
//
//        if (!$bid) {
//            session()->flash('error', 'No accepted bid found for this auction.');
//            return;
//        }
//
//        // Fetch the buyer (current user)
//        $buyer = auth()->user();
//        if (!$buyer) {
//            return redirect('/login');
//        }
//
//        // Fetch the seller's property investment
//        $sellerInvestment = Property_investment::where('id', $auction->property_investment_id)->first();
//        if (!$sellerInvestment || $sellerInvestment->shares_owned < $bid->total_shares) {
//            session()->flash('error', 'Seller does not have enough shares to complete this transaction.');
//            return;
//        }
//
//        // Deduct shares from the seller
//        $sellerInvestment->shares_owned -= $bid->total_shares;
//        $sellerInvestment->save();
//
//        // Update the buyer's property investment or create a new one
//        $buyerInvestment = Property_investment::where('user_id', $buyer->id)
//            ->where('property_id', $auction->property_id)
//            ->first();
//
//        if ($buyerInvestment) {
//            $buyerInvestment->shares_owned += $bid->total_shares;
//            $buyerInvestment->share_price += $bid->share_amount;
//            $buyerInvestment->total_investment += $bid->total_price;
//            $buyerInvestment->save();
//        } else {
//            Property_investment::create([
//                'user_id' => $buyer->id,
//                'property_id' => $auction->property_id,
//                'shares_owned' => $bid->total_shares,
//                'remaining_shares' => $auction->no_of_shares - $bid->total_shares,
//                'share_price' => $bid->share_amount,
//                'payment_id' => 0, // Update if integrated with a payment system
//                'activity' => 'buy',
//                'status' => 'holding',
//                'total_investment' => $bid->total_price,
//            ]);
//        }
//
//        // Update the number of shares in the auction
//        $auction->no_of_shares -= $bid->total_shares;
//
//        // Mark the auction as completed if all shares are sold
//        if ($auction->no_of_shares <= 0) {
//            $auction->status = 'completed';
//        }
//
//        $auction->save();
//
//        // Mark the bid as completed
//        $bid->status = 'completed';
//        $bid->save();
//
//        // Log the transaction
//        Transactions::create([
//            'user_id' => $buyer->id,
//            'property_id' => $auction->property_id,
//            'shares_owned' => $bid->total_shares,
//            'total_investment' => $bid->total_price,
//            'remaining_shares' => $sellerInvestment->shares_owned,
//            'share_price' => $bid->share_amount,
//            'payment_id' => 0,
//            'activity' => 'buy',
//            'status' => 'active',
//        ]);
//
//        Transactions::create([
//            'user_id' => $auction->user_id,
//            'property_id' => $auction->property_id,
//            'shares_owned' => $bid->total_shares,
//            'total_investment' => $bid->total_price,
//            'remaining_shares' => $sellerInvestment->shares_owned,
//            'share_price' => $bid->share_amount,
//            'payment_id' => 0,
//            'activity' => 'sold',
//            'status' => 'active',
//        ]);
//
//        // Flash success message
//        session()->flash('success', 'Shares successfully transferred.');
//        return redirect()->route('site.investor.page');
//    }

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
            return redirect()->route('site.investor.page');
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
        return redirect()->route('site.investor.page');
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

        $returndistribution = ReturnDistributions::where('user_id', $user->id)->first();
//        dd($returndistribution->amount);
        return view('livewire.site.investorPage', compact('returndistribution', 'userbids', 'auctions', 'transctions', 'propertyInvestments', 'user', 'overallShares', 'overallInvestment', 'totalProperties'))->extends('layouts.site');
    }

}

