<?php

namespace App\Livewire\Admin;

use App\Models\Bid;
use App\Models\Property_investment;
use Livewire\Component;
use Livewire\WithPagination;

class AllBidsComponent extends Component
{
    use WithPagination;

    public $userName, $propertyName, $activity, $status;

    protected $queryString = ['userName', 'propertyName', 'activity', 'status'];

    public function updating($property)
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Bid::query();

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

        if ($this->activity) {
            $query->where('activity', $this->activity);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $bids = $query->latest()->paginate(1);


        return view('livewire.admin.allbids', compact('bids'))->extends('layouts.auth');
    }
}
