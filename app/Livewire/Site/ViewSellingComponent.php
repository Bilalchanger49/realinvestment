<?php

namespace App\Livewire\Site;

use App\Models\Selling;
use Livewire\Component;

class ViewSellingComponent extends Component
{
    public $sellingAdd_id;
    public $property_name;

    public function confirmSellingAddDelete($id, $propertyName)
    {
        $this->sellingAdd_id = $id;
        $this->property_name = $propertyName;
        
    }
    public function deleteSellingAdd()
    {
        // Find and delete the auction
        $sellingAdds = Selling::where('id', $this->sellingAdd_id)->first();
        if ($sellingAdds) {
            $sellingAdds->delete();
            // Flash success message
            session()->flash('success', 'Selling Advertisement deleted successfully.');
        } else {
            session()->flash('error', 'Selling Advertisement not found.');
        }

        return redirect()->route('site.investor.page');
    }
    public function render()
    {
        $propertyAdds = Selling::where('status','active')->with('property')->get();

        return view('livewire.site.viewSelling', compact('propertyAdds') )->extends('layouts.site');
    }
}
