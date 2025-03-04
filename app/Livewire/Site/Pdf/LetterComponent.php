<?php

namespace App\Livewire\Site\Pdf;


use App\Models\Property;
use App\Models\Transactions;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class LetterComponent extends Component
{
    public $transactionId;
    public $type; // 'buyer' or 'seller'

    public function mount($transactionId, $type)
    {
        $this->transactionId = $transactionId;
        $this->type = $type;
    }

    public function render()
    {
        $date = Carbon::now()->format('Y-m-d');
        $transaction = Transactions::where('id', $this->transactionId)->first();
        $user = User::where('id', $transaction->user_id)->first();
        $property = Property::where('id', $transaction->property_id)->first();

        if($this->type == 'buyer'){
            return view('pdf.buyer_offer_letter', compact('date', 'transaction', 'user', 'property'))->extends('layouts.site');
        }elseif ($this->type == 'seller'){
            return view('pdf.seller_offer_letter', compact('date', 'transaction', 'user', 'property'))->extends('layouts.site');
        }
    }
}

