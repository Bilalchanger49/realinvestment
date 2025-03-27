<?php

namespace App\Livewire\Site;

use App\Models\Property_investment;
use App\Models\PropertyImage;
use App\Models\Selling;
use App\Models\Transactions;
use App\Services\ProfitCalculationService;
use Livewire\Component;

class ViewPropertyAddComponent extends Component
{
    public $sellingAddId;
    public $numShares;
    public $totalPrice;
    public $sharePrice;
    public $profitAmount;
    public $priceWithCharges;
    public $search = '';

    public function mount($search)
    {
        $this->search = $search;
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

    public function render()
    {
        $images = PropertyImage::all();
        $queryAdvertisement = Selling::where('status', 'active')->with('property')->with('user');

        if (!empty($this->search)) {
            $queryAdvertisement->whereHas('property', function ($query) {
                $query->where('property_name', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.site.viewPropertyAdd', [
            'propertyAdds' => $queryAdvertisement->get(),
            'images' => $images
        ])->extends('layouts.site');
    }
}
