<?php

namespace App\Livewire\admin\Property;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateComponent extends Component
{
    use WithFileUploads;
    public $property_name;
    public $property_description;
    public $property_reg_no;
    public $property_address;
    public $property_price;
    public $property_rent;
    public $property_image;
    public $rules;
    public $messages;

    public function mount()
    {
        $rules = new PropertyRequest();
        $this->rules = $rules->rulesLivewire();
        $this->messages = $rules->messagesLivewire();
    }
    public function render()
    {
        return view('livewire.admin.property.create')->extends('layouts.auth');
    }
    public function createproperty(){

        $validate = $this->validate($this->rules, $this->messages);
        $rentPerMonth  = $this->property_rent * 12;
        $returnPercent = $rentPerMonth * 0.09;
        $noOfShares = $this->property_price / $returnPercent;

        $noOfShares = round($noOfShares);

// Calculate the price of each share
        $pricePerShare = $this->property_price / $noOfShares;

        if ($this->property_image) {
            $file = $this->property_image;
            $path = $file->store('create-property', 'public');
        }

        Property::create([
            'user_id' => auth()->user()->id,
            'property_name' => $this->property_name,
            'property_description'=> $this->property_description,
            'property_reg_no' => $this->property_reg_no,
            'property_address' => $this->property_address,
            'property_price' => $this->property_price,
            'property_rent' => $this->property_rent,
            'property_share_price' => $pricePerShare,
            'property_remaining_shares' => $noOfShares,
            'property_image' => $path,
        ]);

        return redirect()->route('admin.property.index')->with('success', 'Property created successfully.');
    }
}
