<?php

namespace App\Livewire\Site;

use App\Models\Property_investment;
use App\Models\Transactions;
use Livewire\Component;

class InvestorPageComponent extends Component
{
    public function render()
    {
        if (!empty(auth()->user())) {
            $user = auth()->user();
        }else{
            return redirect('/login');
        }
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

        $transctions = Transactions::where('user_id', $user->id)
            ->with('property')
            ->get();

        $overallShares = $investments->sum('total_shares');
        $overallInvestment = $investments->sum('total_investment');
        $totalProperties = $investments->count();

        return view('livewire.site.investorPage', compact('transctions', 'propertyInvestments', 'user', 'overallShares', 'overallInvestment', 'totalProperties'))->extends('layouts.site');
    }
}
