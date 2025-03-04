<?php

namespace App\Livewire\Admin;

use App\Models\Auctions;
use App\Models\Selling;
use Livewire\Component;
use Livewire\WithPagination;

class AllAdvertisementsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userName, $propertyName, $noOfShares,$shareAmount, $status;

    protected $queryString = ['userName', 'propertyName', 'activity', 'status'];

    public function updating($property)
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Selling::query();

        if ($this->propertyName) {
            $query->whereHas('property', function ($q) {
                $q->where('property_name', 'like', '%' . $this->propertyName . '%');
            });
        }

        if ($this->userName) {
            $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->userName . '%');
            });
        }
        if ($this->noOfShares) {
            $query->where('no_of_shares', $this->noOfShares);
        }

        if ($this->shareAmount) {
            $query->where('share_amount', $this->shareAmount);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $advertisements = $query->latest()->paginate(1);

//dd($advertisements);
        return view('livewire.admin.alladvertisements', compact('advertisements'))->extends('layouts.auth');
    }
}
