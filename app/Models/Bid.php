<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'auctions_id', 'share_amount', 'total_shares', 'total_price', 'end_date',
        'status'];

    public function auctions()
    {
        return $this->belongsTo(Auctions::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
