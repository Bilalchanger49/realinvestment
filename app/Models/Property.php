<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_name', 'property_description', 'property_reg_no',
        'property_address', 'property_price', 'property_rent', 'property_share_price',
        'property_total_shares', 'property_remaining_shares', 'property_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shares()
    {
        return $this->hasMany(Shares::class);
    }
}
