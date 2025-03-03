<?php

namespace App\Livewire\Admin;

use App\Models\Transactions;
use Livewire\Component;
use Livewire\WithPagination;

class AllTransactionComponent extends Component
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
        $query = Transactions::query();

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

        $transactions = $query->latest()->paginate(1);


        return view('livewire.admin.alltransaction', compact('transactions'))->extends('layouts.auth');
    }
}
