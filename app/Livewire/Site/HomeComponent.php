<?php

namespace App\Livewire\Site;


use App\Models\Property;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $properties = Property::all();
        return view('livewire.site.home', compact('properties'))->extends('layouts.site');
    }
}
