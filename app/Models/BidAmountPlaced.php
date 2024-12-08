<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidAmountPlaced extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'bid_id', 'share_amount_placed', 'end_date',
        'status'];
}
