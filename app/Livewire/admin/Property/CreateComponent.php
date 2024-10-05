<?php

namespace App\Livewire\admin\Property;

use App\Http\Requests\PropertyRequest;
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
//    public $property_total_shares;
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

//        $validate = $this->validate($this->rules, $this->messages);
//        $rentPerMonth  = $this->property_rent * 12;
//        $returnPercent = $rentPerMonth * 0.09;
//        $noOfShares = $this->property_price / $returnPercent;
//        dd($noOfShares);

        $validate = $this->validate($this->rules, $this->messages);
        $rentPerMonth  = $this->property_rent * 12;
        $returnPercent = $rentPerMonth * 0.09;
        $noOfShares = $this->property_price / $returnPercent;

        $noOfShares = round($noOfShares);

// Calculate the price of each share
        $pricePerShare = $this->property_price / $noOfShares;

        dd([
            'no_of_shares' => $noOfShares,
            'price_per_share' => $pricePerShare
        ]);


    }
}
