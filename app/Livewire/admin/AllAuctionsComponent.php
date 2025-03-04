<?php

namespace App\Livewire\Admin;

use App\Models\Auctions;
use Livewire\Component;
use Livewire\WithPagination;

class AllAuctionsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userName, $propertyName, $activity,$noOfShares, $status;

    protected $queryString = ['userName', 'propertyName', 'noOfShares', 'activity', 'status'];

    public function updating($property)
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Auctions::query();

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

        if ($this->activity) {
            $query->where('activity', $this->activity);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $auctions = $query->latest()->paginate(1);
//dd($auctions);

        return view('livewire.admin.allauctions', compact('auctions'))->extends('layouts.auth');
    }
}
