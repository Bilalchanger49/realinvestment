<?php

namespace App\Livewire\Site;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
//        $properties = Property::all();
        return view('livewire.site.contact' )->extends('layouts.site');
    }
}
