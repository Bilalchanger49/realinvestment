<?php

namespace App\Livewire\Site;


use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public $notifications;
    public function render()
    {
        $images = PropertyImage::all();
        $properties = Property::all();
        return view('livewire.site.home', compact('properties', 'images'))->extends('layouts.site');
    }
}
