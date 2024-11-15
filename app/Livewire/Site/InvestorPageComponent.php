<?php

namespace App\Livewire\Site;

use Livewire\Component;

class InvestorPageComponent extends Component
{
    public function render()
    {
        return view('livewire.site.investorPage' )->extends('layouts.site');
    }
}
