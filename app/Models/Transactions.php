<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_id', 'shares_owned', 'total_investment','remaining_shares',
        'share_price', 'payment_id', 'activity', 'status'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function investment()
    {
        return $this->belongsTo(PropertyInvestment::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
