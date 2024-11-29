<?php

namespace App\Livewire\Site;

use App\Models\Property;
use Livewire\Component;

class PropertyDetailsComponent extends Component
{
    public $totalShares;
    public $availableShares;
    public $sharePrice;
    public $numShares = 1;
    public $totalPrice;

    public $property;

    public function mount($id)
    {
        $this->property = Property::where('id', $id)->first();
        $this->calculateTotal();
        $this->totalPrice = $this->property->property_price;
        $this->sharePrice = $this->property->property_share_price;
        $this->totalShares = $this->property->property_total_shares;
        $this->availableShares = $this->property->property_remaining_shares;
    }

    public function calculateTotal()
    {
        if($this->numShares < 1){
            $this->totalPrice = 0;
        }else{
            $this->totalPrice = $this->numShares * $this->sharePrice;
        }
    }
    public function render()
    {
        $property = $this->property;
        return view('livewire.site.property-details', compact('property'))->extends('layouts.site');
    }
}
