<?php

namespace App\Livewire\admin\Property;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;
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
    public $property_rooms;
    public $property_kitchens;
    public $property_type;
    public $property_price;
    public $property_rent;
    public $property_share_price;
    public $property_total_shares;
    public $property_remaining_shares;
    public $property_images = [];
    public $existingImages = [];
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
        $this->property_rooms = $this->property->property_rooms;
        $this->property_kitchens = $this->property->property_kitchens;
        $this->property_type = $this->property->property_type;
        $this->property_price = $this->property->property_price;
        $this->property_rent = $this->property->property_rent;
        $this->property_share_price = $this->property->property_share_price;
        $this->property_total_shares = $this->property->property_total_shares;
        $this->property_remaining_shares = $this->property->property_remaining_shares;
        $this->rules['property_images.*'] = 'image|max:2048';

        $this->existingImages = PropertyImage::where('property_id', $this->property->id)->get();

    }


    public function render()
    {
        return view('livewire.admin.property.edit' )->extends('layouts.auth');
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

    public function deleteExistingImage($imageId)
    {
        $image = PropertyImage::where('id', $imageId)->first();
        if ($image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
            $this->existingImages = PropertyImage::where('property_id', $this->property->id)->get();
        }
    }
    public function updateProperty()
    {
        $validate = $this->validate($this->rules, $this->messages);
        $rentPerMonth  = $this->property_rent * 12;
        $returnPercent = $rentPerMonth * 0.09;
        $noOfShares = $this->property_price / $returnPercent;

        $noOfShares = round($noOfShares);

        $pricePerShare = $this->property_price / $noOfShares;

        $this->property->update([
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
            'property_share_price' => $this->property_share_price,
            'property_total_shares' => $this->property_total_shares,
            'property_remaining_shares' => $this->property_remaining_shares,
        ]);

        foreach ($this->property_images as $image) {
            if ($image) {
                $path = $image->store('create-property', 'public');
                PropertyImage::create([
                    'property_id' => $this->property->id,
                    'image_path' => $path,
                ]);
            }
        }

        session()->flash('success', 'Property updated successfully.');
        return redirect()->route('admin.property.index');
    }

}
