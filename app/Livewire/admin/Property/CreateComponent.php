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
    public $property_total_shares;
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
        $roi  = $this->property_rent * 12;
        $no_of_shares = $this->property_price / $roi;

    }
}
