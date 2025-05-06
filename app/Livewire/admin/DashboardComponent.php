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
    public $transactionLineChart;
    public $timeFilter = 'daily'; // default: monthly


    public function mount()
    {
        $this->activeBids = Bid::where('status', 'active')->count();

        $this->propertiesSold = Transactions::where('activity', 'buy')->count();
        $this->activeAuctions = Auctions::where('status', 'active')->count();
        $this->auctionRevenue = ReturnDistributions::where('user_id', 1)->sum('amount');

        $this->transactionLineChart = [
            'labels' => [],
            'totalTransactions' => [],
            'buy' => [],
            'sold' => [],
        ];

        $this->loadChartData();

    }

    public function loadChartData()
    {

        if ($this->timeFilter === 'daily') {
            $days = range(1, 31);
            foreach ($days as $day) {
                $label = str_pad($day, 2, '0', STR_PAD_LEFT);

                $this->transactionLineChart['labels'][] = $label;

                $this->transactionLineChart['totalTransactions'][] = Transactions::whereDay('created_at', $day)->count();
                $this->transactionLineChart['buy'][] = Transactions::where('activity', 'buy')->whereDay('updated_at', $day)->count();
                $this->transactionLineChart['sold'][] = Transactions::where('activity', 'sold')->whereDay('updated_at', $day)->count();
            }
        } elseif ($this->timeFilter === 'yearly') {
            $years = Transactions::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');
            foreach ($years as $year) {
                $this->transactionLineChart['labels'][] = $year;
                $this->transactionLineChart['totalTransactions'][] = Transactions::whereYear('created_at', $year)->count();
                $this->transactionLineChart['buy'][] = Transactions::where('activity', 'buy')->whereYear('updated_at', $year)->count();
                $this->transactionLineChart['sold'][] = Transactions::where('activity', 'sold')->whereYear('updated_at', $year)->count();
            }
        } else {
            $months = range(1, 12);
            foreach ($months as $month) {
                $label = Carbon::create()->month($month)->format('M');
                $this->transactionLineChart['labels'][] = $label;

                $this->transactionLineChart['totalTransactions'][] = Transactions::whereMonth('created_at', $month)->count();
                $this->transactionLineChart['buy'][] = Transactions::where('activity', 'buy')->whereMonth('updated_at', $month)->count();
                $this->transactionLineChart['sold'][] = Transactions::where('activity', 'sold')->whereMonth('updated_at', $month)->count();
            }
        }

    }
    public function updatedTimeFilter()
    {
        $this->loadChartData(); // reload chart with new filter

//        $this->dispatch('chartDataUpdated', $this->transactionLineChart);
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.auth');
    }
}
