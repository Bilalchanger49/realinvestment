<?php

namespace App\Livewire\Site;

use App\Models\Property_investment;
use App\Models\Selling;
use Livewire\Component;

class ViewSellingComponent extends Component
{
    public $sellingAdd_id;
    public $advertisement;
    public $property_name;
    public $confirmActionForEdit;
    public $price_per_share_for_add;
    public $no_of_shares_for_add;
    public $total_price_for_add;
    public $investment;
    public $shares_to_sell_for_add;

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

        return redirect()->route('site.investor.page', [$activeTab = 'advertisements']);
    }

    public function openAdvertisementEditPopup(int $id)
    {
        $this->advertisement = Selling::where('id', $id)
            ->where('status', 'active')->first();

        $propertyInvestment = Property_investment::where('id',  $this->advertisement->property_investment_id)
            ->with('property')->first();
        $this->no_of_shares_for_add = (int)$propertyInvestment->shares_owned;
        $this->property_name = $propertyInvestment->property->property_name;
        $this->investment = $propertyInvestment;

        $this->price_per_share_for_add =  $this->advertisement->share_amount;
        $this->shares_to_sell_for_add =  $this->advertisement->no_of_shares;
        $this->total_price_for_add =  $this->advertisement->total_amount;

    }


    public function calculateTotalForAdd()
    {
        if ($this->shares_to_sell_for_add < 1 || $this->price_per_share_for_add < 1) {
            $this->total_price_for_add = 0;
        } elseif ($this->shares_to_sell_for_add > $this->no_of_shares_for_add) {
            $this->total_price_for_add = 0;
        } else {

            $this->total_price_for_add = $this->shares_to_sell_for_add * $this->price_per_share_for_add;
        }
    }


    public function updateSellingAdd()
    {
        $this->validate([
            'price_per_share_for_add' => 'required|numeric|min:1',
            'shares_to_sell_for_add' => 'required|numeric|min:1',
            'confirmActionForEdit' => 'accepted',
        ]);


        // Find the ad to update — assuming $this->editingAdd holds the ad ID or object
        $sellingAdd = Selling::where('id', $this->advertisement->id)
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();



        if (!$sellingAdd) {
            session()->flash('error', 'Advertisement not found or cannot be edited.');
            return redirect()->route('site.investor.page', [$activeTab = 'advertisements']);
        }


        try {
            // Update the ad
            $sellingAdd->update([
                'no_of_shares' => $this->shares_to_sell_for_add,
                'share_amount' => $this->price_per_share_for_add,
                'total_amount' => $this->total_price_for_add,
                'remaining_shares' => $this->no_of_shares_for_add - $this->shares_to_sell_for_add,
                'updated_at' => now(),
            ]);

            session()->flash('success', 'Advertisement updated successfully.');

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update advertisement: ' . $e->getMessage());
        }

        return redirect()->route('site.investor.page', [$activeTab = 'advertisements']);
    }

    public function render()
    {
        $propertyAdds = Selling::where('status', 'active')->with('property')->get();

        return view('livewire.site.viewSelling', compact('propertyAdds'))->extends('layouts.site');
    }
}
