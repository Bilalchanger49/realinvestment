<?php

namespace App\Livewire\Site;

use Livewire\Component;

class AllPropertiesComponent extends Component
{
    public function render()
    {
//        $properties = Property::all();
        return view('livewire.site.allProperties' )->extends('layouts.site');
    }
}
