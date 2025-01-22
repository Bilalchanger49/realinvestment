<?php

namespace App\Livewire\admin;

use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DistributeReturnsComponent extends Component
{
    public $property_id;
    public $date;
    public $amount;

    public function render()
    {
        $properties = Property::all();
        return view('livewire.admin.distributeReturns', compact('properties'))->extends('layouts.auth');
    }

    public function distributeReturns()
    {
        $validate = $this->validate([
            'property_id' => 'required|exists:properties,id',
            'date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        $propertyId = $this->property_id;
        $property = Property::findOrFail($propertyId);

        $totalRentalIncome = $this->amount;

        // Fetch all investors who own shares in this property
        $investors = DB::table('property_investments')
            ->where('property_id', $propertyId)
            ->where('status', 'holding')
            ->get();

        $totalDistributed = 0;

        foreach ($investors as $investor) {
            $investmentDate = \Carbon\Carbon::parse($investor->created_at);
            $now = \Carbon\Carbon::now();
//            $monthsHeld = $investmentDate->diffInMonths($now);
            $monthsHeld = 12;

            // Ensure the duration is within a year (12 months max)
            $monthsHeld = min($monthsHeld, 12);

            // Prorate the total rental income for the duration the investor held shares
            $proratedRentalIncome = ($totalRentalIncome / 12) * $monthsHeld;

            // Calculate the return for this investor
            $returnForInvestor = ($investor->shares_owned / $property->property_total_shares) * $proratedRentalIncome;

            // Add to total distributed amount
            $totalDistributed += $returnForInvestor;

            dd([
                'property_id' => $propertyId,
                'user_id' => $investor->user_id,
                'amount' => $returnForInvestor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            // Record the return in the `return_distributions` table
            DB::table('return_distributions')->insert([
                'property_id' => $propertyId,
                'user_id' => $investor->user_id,
                'amount' => $returnForInvestor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Calculate the remaining amount
        $remainingAmount = $totalRentalIncome - $totalDistributed;

        if ($remainingAmount > 0) {
            // Send the remaining amount to the admin (user_id 1)
            DB::table('return_distributions')->insert([
                'property_id' => $propertyId,
                'user_id' => 1, // Admin user_id
                'amount' => $remainingAmount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.distribute.returns')->with('success', 'Returns distributed successfully.');
    }


}
