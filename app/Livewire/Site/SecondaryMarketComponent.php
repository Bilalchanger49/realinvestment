<?php


namespace App\Livewire\Site;

use App\Models\Auctions;
use App\Models\Bid;
use App\Models\Property;
use App\Models\User;
use App\Notifications\BidConfirmedNotification;
use Livewire\Component;
use App\Notifications\AuctionResponseNotification;

class SecondaryMarketComponent extends Component
{
    public $state;

    public function save()
    {

        dump($this->state);
    }

    public function render()
    {

        return view('livewire.site.secondary-market')->extends('layouts.site');
    }
}
