<?php

namespace App\Livewire\Site;

use App\Models\Property_investment;
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
//      dd($propertyInvestments[0]->property->property_name);
        return view('livewire.site.investorPage', compact('propertyInvestments', 'user'))->extends('layouts.site');
    }
}
