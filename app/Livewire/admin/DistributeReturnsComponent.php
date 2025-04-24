<?php

namespace App\Livewire\admin;

use App\Models\Property;
use App\Models\User;
use App\Notifications\DividendDistributedNotification;
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

//        $this->amount = $validate['amount'] * 12;
        $this->amount = $validate['amount'];

        $propertyId = $this->property_id;
        $property = Property::findOrFail($propertyId);

        $totalRentalIncome = $this->amount;

        // Fetch all investors who own shares in this property
        $investments = DB::table('property_investments')
            ->where('property_id', $propertyId)
            ->where('status', 'holding')
            ->get();

        $totalDistributed = 0;

        foreach ($investments as $investment) {
            $investmentDate = \Carbon\Carbon::parse($investment->created_at);
            $now = \Carbon\Carbon::now();
//          $monthsHeld = $investmentDate->diffInMonths($now);
            $monthsHeld = 12;

            // Ensure the duration is within a year (12 months max)
            $monthsHeld = min($monthsHeld, 12);
            $proratedRentalIncome = ($totalRentalIncome / 12) * $monthsHeld;
            $returnForInvestor = ($investment->shares_owned / $property->property_total_shares) * $proratedRentalIncome;

            $existingReturn = DB::table('return_distributions')
                ->where('property_id', $propertyId)
                ->where('user_id', $investment->user_id)
                ->where('property_investment_id', $investment->id)
                ->first();

            // Add to total distributed amount
            $totalDistributed += $returnForInvestor;

            if ($existingReturn) {
                DB::table('return_distributions')
                    ->where('id', $existingReturn->id)
                    ->update([
                        'amount' => $existingReturn->amount + $returnForInvestor,
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('return_distributions')->insert([
                    'property_id' => $propertyId,
                    'user_id' => $investment->user_id,
                    'property_investment_id' => $this->property_id,
                    'amount' => $returnForInvestor,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Send notification to the investor
            $user = User::find($investment->user_id);
            if ($user) {
                $user->notify(new DividendDistributedNotification($returnForInvestor, $property->name, $user->name));
            }
        }

        // Calculate the remaining amount
        $remainingAmount = $totalRentalIncome - $totalDistributed;

        if ($remainingAmount > 0) {

            $adminExist = DB::table('return_distributions')
                ->where('user_id', 1)
                ->first();
            if ($adminExist) {
                DB::table('return_distributions')
                    ->where('id', $adminExist->id)
                    ->update([
                        'amount' => $adminExist->amount + $remainingAmount,
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('return_distributions')->insert([
                    'property_id' => $propertyId,
                    'user_id' => 1,
                    'amount' => $remainingAmount,
                    'property_investment_id' => $this->property_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        }


        return redirect()->route('dashboard')->with('success', 'Returns distributed successfully.');
    }


}
