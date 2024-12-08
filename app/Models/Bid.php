<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_id', 'no_of_shares', 'share_amount_placed',
        'total_amount_placed', 'share_amount_accepted', 'total_amount_accepted', 'end_date',
        'remaining_shares', 'status'];
}
