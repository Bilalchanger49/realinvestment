<?php

namespace App\Livewire\Site;

use App\Models\Property;
use App\Models\PropertyImage;
use Livewire\Component;

class PropertyDetailsComponent extends Component
{

    public $property;

    public function mount($id)
    {

        $this->property = Property::where('id', $id)->first();
    }

    public function render()
    {
        $images = PropertyImage::where('property_id', $this->property->id )->get();
//        dd($images);
        $property = $this->property;
        return view('livewire.site.property-details', compact('property', 'images'))->extends('layouts.site');
    }
}
