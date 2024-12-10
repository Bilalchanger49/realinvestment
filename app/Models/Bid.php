<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bid extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'auctions_id', 'share_amount_placed', 'end_date',
        'status'];

    public function auctions()
    {
        return $this->belongsTo(Auctions::class);
    }
}
