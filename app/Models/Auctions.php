<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_investment_id', 'property_id', 'no_of_shares', 'share_amount_placed',
        'total_amount_placed', 'share_amount_accepted', 'total_amount_accepted', 'end_date',
        'remaining_shares', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function investments()
    {
        return $this->hasMany(Property_investment::class);
    }


    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

}
