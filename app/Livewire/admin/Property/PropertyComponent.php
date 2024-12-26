<?php

namespace App\Livewire\admin\Property;

use App\Models\Property;
use Livewire\Component;

class PropertyComponent extends Component
{
    public $deleteId;

    protected $listeners = ['confirmDelete'];

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }
    public function deleteProperty()
    {
        $property = Property::find($this->deleteId);

        if ($property) {
            $property->delete();
            session()->flash('success', 'Property deleted successfully.');
        } else {
            session()->flash('error', 'Property not found.');
        }

        $this->deleteId = null; // Reset deleteId
    }
    public function render()
    {
        $properties = Property::all();
        return view('livewire.admin.property.index',compact('properties') )->extends('layouts.auth');
    }
}
