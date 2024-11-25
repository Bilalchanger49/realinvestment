<?php


namespace App\Livewire\Site;

use Livewire\Component;

class SecondaryMarketComponent extends Component
{
    public function render()
    {
        return view('livewire.site.secondary-market')->extends('layouts.site');
    }
}
