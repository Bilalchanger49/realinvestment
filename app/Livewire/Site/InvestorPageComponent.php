<?php

namespace App\Livewire\Site;

use App\Models\Auctions;
use App\Models\Property_investment;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class InvestorPageComponent extends Component
{
    public $confirmAction;
    public $price_per_share = 0;
    public $no_of_shares = 0;
    public $total_price = 0;
    public $shares_to_sell = 0;
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
        $this->no_of_shares = (int) $propertyInvestment->shares_owned;
        $this->property_name = $propertyInvestment->property->property_name;

        $this->investment = $propertyInvestment;

    }

    public function calculateTotal()
    {
        if ($this->shares_to_sell < 1 || $this->price_per_share < 1) {
            $this->total_price = 0;
        }elseif ($this->shares_to_sell > $this->no_of_shares) {
            $this->total_price = 0;
        } else {

            $this->total_price = $this->shares_to_sell * $this->price_per_share;
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
            ->where('user_id', auth()->id())->first();

        //auction exist then user will be sent back and asked to edit the previous auction
        if ($existingAuction) {
            dd('auction already exist');
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

        return redirect()->route('site.investor.page');
    }

    public function deleteAuction()
    {
//        if (!$this->auction_id) {
//            session()->flash('error', 'No auction selected for deletion.');
//            return;
//        }



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

    /**
     * Method to load auction data for deletion.
     */
    public function confirmDelete($id, $propertyName)
    {
        $this->auction_id = $id;
        $this->property_name = $propertyName;
    }

    public function render()
    {
        if (!empty(auth()->user())) {
            $user = auth()->user();
        }else{
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

//        dd($auctions);

        return view('livewire.site.investorPage', compact('auctions', 'transctions', 'propertyInvestments', 'user', 'overallShares', 'overallInvestment', 'totalProperties'))->extends('layouts.site');
    }


}

