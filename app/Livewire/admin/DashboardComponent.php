<?php

namespace App\Livewire\admin;

use App\Models\Property;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.auth');
    }
}
