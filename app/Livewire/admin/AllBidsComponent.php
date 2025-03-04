<?php

namespace App\Livewire\Admin;

use App\Models\Bid;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class AllBidsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userName, $propertyName,$sharePrice, $totalPrice, $totalShares, $status;

    protected $queryString = ['userName', 'propertyName', 'sharePrice', 'totalPrice', 'totalShares', 'status'];

    public function updating($property)
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Bid::query()->with(['user', 'auctions.property']); // Ensure relationships are loaded

        if ($this->propertyName) {
            $query->whereHas('auctions.property', function ($q) {
                $q->where('property_name', 'like', '%' . $this->propertyName . '%');
            });
        }

        if ($this->userName) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->userName . '%');
            });
        }
        if ($this->sharePrice) {
            $query->where('share_amount', '>=', $this->sharePrice);
        }

        if ($this->totalPrice) {
            $query->where('total_price', '>=', $this->totalPrice);
        }

        if ($this->totalShares) {
            $query->where('total_shares', '>=', $this->totalShares);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $bids = $query->latest()->paginate(10);
//dd($bids);
        return view('livewire.admin.allbids', compact('bids'))->extends('layouts.auth');
    }
}
