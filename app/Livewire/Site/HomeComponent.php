<?php

namespace App\Livewire\Site;


use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
//        dd('')
        return view('livewire.site.home')->extends('layouts.site');
    }
}
