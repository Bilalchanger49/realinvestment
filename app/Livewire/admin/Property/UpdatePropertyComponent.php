<?php

namespace App\Livewire\admin\Property;

use App\Models\Property;
use Livewire\Component;
use App\Http\Requests\PropertyRequest;
use Livewire\WithFileUploads;

class UpdatePropertyComponent extends Component
{
    use WithFileUploads;

    public $property;
    public $property_name;
    public $property_description;
    public $property_reg_no;
    public $property_address;
    public $property_price;
    public $property_rent;
    public $property_share_price;
    public $property_total_shares;
    public $property_remaining_shares;
    public $property_image;
    public $rules;
    public $messages;

    public function mount($id)
    {
        $rules = new PropertyRequest();
        $this->rules = $rules->rulesLivewire();
        $this->messages = $rules->messagesLivewire();
        $this->property = Property::findOrFail($id); // This will throw an error if no property is found

        $this->property_name = $this->property->property_name;
        $this->property_description = $this->property->property_description;
        $this->property_reg_no = $this->property->property_reg_no;
        $this->property_address = $this->property->property_address;
        $this->property_price = $this->property->property_price;
        $this->property_rent = $this->property->property_rent;
        $this->property_share_price = $this->property->property_share_price;
        $this->property_total_shares = $this->property->property_total_shares;
        $this->property_remaining_shares = $this->property->property_remaining_shares;
    }


    public function render()
    {
        return view('livewire.admin.property.edit' )->extends('layouts.auth');
    }

    public function updateProperty()
    {
        $validate = $this->validate($this->rules, $this->messages);
        $rentPerMonth  = $this->property_rent * 12;
        $returnPercent = $rentPerMonth * 0.09;
        $noOfShares = $this->property_price / $returnPercent;

        $noOfShares = round($noOfShares);

// Calculate the price of each share
        $pricePerShare = $this->property_price / $noOfShares;

        // Update property details


        // Handle image upload if a new one is provided
        if ($this->property_image) {
            $file = $this->property_image;
            $path = $file->store('create-property', 'public');
        }

        $this->property->update([
            'user_id' => auth()->user()->id,
            'property_name' => $this->property_name,
            'property_description'=> $this->property_description,
            'property_reg_no' => $this->property_reg_no,
            'property_address' => $this->property_address,
            'property_price' => $this->property_price,
            'property_rent' => $this->property_rent,
            'property_share_price' => $this->property_share_price,
            'property_total_shares' => $this->property_total_shares,
            'property_remaining_shares' => $this->property_remaining_shares,
            'property_image' => $path,
        ]);

        session()->flash('success', 'Property updated successfully.');
        return redirect()->route('admin.property.index');
    }

}
