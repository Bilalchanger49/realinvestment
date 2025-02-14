<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnDistributions extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'property_investment_id', 'property_id', 'amount'];


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function investments()
    {
        return $this->hasMany(Property_investment::class);
    }
}
