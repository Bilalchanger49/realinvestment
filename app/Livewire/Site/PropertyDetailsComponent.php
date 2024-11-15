<?php

namespace App\Livewire\Site;

use App\Models\Property;
use Livewire\Component;

class PropertyDetailsComponent extends Component
{
    public $totalShares = 255;
    public $availableShares = 200;
    public $sharePrice = 255;
    public $numShares = 1;
    public $totalPrice;

    public function mount()
    {
        $this->calculateTotal(); // Initialize the total price
    }

    public function calculateTotal()
    {
        $this->totalPrice = $this->numShares * $this->sharePrice;
    }
    public function render()
    {
        $properties = Property::all();
        return view('livewire.site.property-details')->extends('layouts.site');
    }
}
