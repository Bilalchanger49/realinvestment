<?php

namespace App\Livewire\admin\Property;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateComponent extends Component
{
    use WithFileUploads;
    public $property_name;
    public $property_description;
    public $property_reg_no;
    public $property_address;
    public $property_rooms;
    public $property_kitchens;
    public $property_type;
    public $property_price;
    public $property_rent;
    public $property_images = [];
    public $rules;
    public $messages;

    public function mount()
    {
        $rules = new PropertyRequest();
        $this->rules = $rules->rulesLivewire();
        $this->messages = $rules->messagesLivewire();
        $this->rules['property_images.*'] = 'image|max:2048';
    }
    public function render()
    {
        return view('livewire.admin.property.create')->extends('layouts.auth');
    }
    public function addImage()
    {
        $this->property_images[] = null; // Add an empty slot
    }
    public function removeImage($index)
    {
        unset($this->property_images[$index]);
        $this->property_images = array_values($this->property_images);
    }
    public function createproperty(){

        $validate = $this->validate($this->rules, $this->messages);

        $noOfShares = 150;
        $rentPerYear = $this->property_rent * 12;
        $pricePerShare = $this->property_price / $noOfShares;
        $returnPercent = ($rentPerYear / $this->property_price) * 100;

        $property =  Property::create([
            'user_id' => auth()->user()->id,
            'property_name' => $this->property_name,
            'property_description'=> $this->property_description,
            'property_reg_no' => $this->property_reg_no,
            'property_address' => $this->property_address,
            'property_rooms' => $this->property_rooms,
            'property_kitchens' => $this->property_kitchens,
            'property_type' => $this->property_type,
            'property_price' => $this->property_price,
            'property_rent' => $this->property_rent,
            'property_share_price' => $pricePerShare,
            'property_total_shares' => $noOfShares,
            'property_remaining_shares' => $noOfShares,
            'property_roi' => $returnPercent,
        ]);

        foreach ($this->property_images as $image) {
            if ($image) {
                $path = $image->store('create-property', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.property.index')->with('success', 'Property created successfully.');
    }
}
