<?php

namespace App\Livewire\admin\Property;

use App\Http\Requests\PropertyRequest;
use Livewire\Component;

class CreateComponent extends Component
{
    public $property_name;
    public $property_description;
    public $property_reg_no;
    public $property_address;
    public $property_price;
    public $property_total_shares;
    public $property_image;
    public $rules;
    public $messages;
//    protected $rules = [
//        'property_name' => 'required',
//        'property_description'=> 'required',
//        'property_reg_no' => 'required',
//        'property_address' => 'required',
//        'property_price' => 'required',
//        'property_total_shares' => 'required',
//        'property_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//    ];

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
        dd($validate);
    }
}
