<?php

namespace App\Livewire\Site;

use Livewire\Component;

class PropertyDetailsComponent extends Component
{
    public function render()
    {
//        $properties = Property::all();
        return view('livewire.site.property-details' )->extends('layouts.site');
    }
}
