<?php

namespace App\Livewire\admin;

use App\Models\Auctions;
use App\Models\Bid;
use App\Models\Property;
use App\Models\ReturnDistributions;
use App\Models\Transactions;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $activeBids, $propertiesSold, $activeAuctions, $auctionRevenue;
    public $biddingLineChartData;
    public $propertyTypeChartData;
    public $monthlyChartData;

    public function mount()
    {
        $this->activeBids = Bid::where('status', 'active')->count();

        $this->propertiesSold = Transactions::where('activity', 'buy')->count();
        $this->activeAuctions = Auctions::where('status', 'active')->count();
        $this->auctionRevenue = ReturnDistributions::where('user_id', 1)->sum('amount');

        $this->monthlyChartData = [
            'labels' => ["Jan", "Feb", "Mar"],
            'bids' => [45, 60, 55],
            'sold' => [30, 45, 50],
            'profit' => [15, 25, 20],
        ];

        $this->propertyTypeChartData = [
            'labels' => ['Residential', 'Commercial', 'Land'],
            'data' => [45, 35, 20],
        ];

        $this->biddingLineChartData = [
            'labels' => ["04 Jan", "05 Jan", "06 Jan"],
            'totalBids' => [6, 10, 8],
            'winningBids' => [10, 6, 12],
        ];



//        $this->monthlyChartData = [
//            'labels' => [],
//            'bids' => [],
//            'sold' => [],
//            'profit' => [],
//        ];
//
//        $months = range(1, 12); // Jan to Dec
//        foreach ($months as $month) {
//            $label = Carbon::create()->month($month)->format('M');
//            $this->monthlyChartData['labels'][] = $label;
//
//            // Total Bids in this month
//            $bids = Bid::whereMonth('created_at', $month)->count();
//            $this->monthlyChartData['bids'][] = $bids;
//
//            // Sold Properties in this month
//            $sold = Transactions::where('activity', 'buy')->whereMonth('updated_at', $month)->count();
//            $this->monthlyChartData['sold'][] = $sold;
//
//            // Profit for sold properties (example: 10% of price)
//            $profit = ReturnDistributions::where('user_id', 1)->whereMonth('updated_at', $month)->sum(DB::raw('amount * 0.1'));
//            $this->monthlyChartData['profit'][] = round($profit, 2);
//        }

    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.auth');
    }
}
