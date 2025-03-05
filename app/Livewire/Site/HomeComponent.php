<?php

namespace App\Livewire\Site;


use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public $notifications;
    public function render()
    {
        $properties = Property::all();
        return view('livewire.site.home', compact('properties'))->extends('layouts.site');
    }
}
