<?php

namespace App\Livewire\Site;


use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
//        dd('')
        return view('livewire.site.about')->extends('layouts.site');
    }
}
