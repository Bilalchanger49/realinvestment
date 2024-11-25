<?php

namespace App\Livewire\Site;

use Livewire\Component;

class FaqComponent extends Component
{
    public function render()
    {
        return view('livewire.site.faq' )->extends('layouts.site');
    }
}
