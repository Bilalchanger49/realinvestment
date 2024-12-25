<?php

namespace App\Livewire\Site;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.site.contact' )->extends('layouts.site');
    }
}
