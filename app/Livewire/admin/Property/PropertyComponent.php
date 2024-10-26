<?php

namespace App\Livewire\admin\Property;

use App\Models\Property;
use Livewire\Component;

class PropertyComponent extends Component
{
    public function render()
    {
        $properties = Property::all();
        return view('livewire.admin.property.index',compact('properties') )->extends('layouts.auth');
    }
}
