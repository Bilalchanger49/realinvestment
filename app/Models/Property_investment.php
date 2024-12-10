<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_investment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_id', 'shares_owned', 'total_investment','remaining_shares',
        'share_price', 'payment_id', 'activity', 'status'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }

    public function auctions()
    {
        return $this->hasMany(Auctions::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
