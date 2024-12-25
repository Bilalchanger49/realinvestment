<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

>>>>>>> 2ba86e434b05d99ced21aada9a13efa0cd48f3a9
    protected $fillable = ['user_id', 'property_investment_id', 'property_id', 'no_of_shares', 'share_amount_placed',
        'total_amount_placed', 'remaining_shares', 'status'];

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
        return $this->belongsTo(Property_investment::class);
    }


    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

}
