<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [ 'user_id', 'name', 'property_description', 'reg_no', 'location', 'property_worth', 'total_shares', 'remaining_shares', 'property_image'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shares()
    {
        return $this->hasMany(Shares::class);
    }
}
