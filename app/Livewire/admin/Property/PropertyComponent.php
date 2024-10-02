<?php

namespace App\Livewire\admin\Property;

use Livewire\Component;

class PropertyComponent extends Component
{
    public function render()
    {
//        dd('');
        return view('livewire.admin.property.index')->extends('layouts.auth');
    }
}
