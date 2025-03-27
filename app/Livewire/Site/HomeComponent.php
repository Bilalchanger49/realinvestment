<?php

namespace App\Livewire\Site;


use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Selling;
use App\Services\ProfitCalculationService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public $notifications;
    public $sellingAddId;
    public $numShares;
    public $totalPrice;
    public $sharePrice;
    public $profitAmount;
    public $priceWithCharges;

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

    public function render()
    {
        $images = PropertyImage::all();
        $properties = Property::all();
        $advertisements = Selling::where('status', 'active')->with('property')->with('user')->get();
        return view('livewire.site.home', compact('advertisements', 'properties', 'images'))->extends('layouts.site');
    }
}
