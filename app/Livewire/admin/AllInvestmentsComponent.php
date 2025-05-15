<?php

namespace App\Livewire\Admin;

use App\Models\Property_investment;
use Livewire\Component;
use Livewire\WithPagination;

class AllInvestmentsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userName, $propertyName, $sharesOwned, $activity, $status;

    protected $queryString = ['userName', 'propertyName', 'sharesOwned', 'activity', 'status'];

    public function updating($property)
    {
        $this->resetPage(); // Reset pagination when filtering
    }

    public function render()
    {
        $query = Property_investment::query();

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

        if ($this->sharesOwned) {
            $query->whereHas('user', function ($q) {
                $q->where('shares_owned', 'like', '%' . $this->sharesOwned . '%');
            });
        }

        if ($this->activity) {
            $query->where('activity', $this->activity);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $investments = $query->latest()->paginate(4);

//dd($investments);
        return view('livewire.admin.allinvestments', compact('investments'))->extends('layouts.auth');
    }
}
