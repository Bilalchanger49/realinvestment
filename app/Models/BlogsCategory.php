<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsCategory extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(BlogsPosts::class)->whereNull('parent_id')->latest();
    }
}
