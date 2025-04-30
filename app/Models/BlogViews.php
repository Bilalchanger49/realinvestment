<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogViews extends Model
{
    use HasFactory;
    protected $fillable = ['blogs_post_id', 'ip_address'];

    public function post()
    {
        return $this->belongsTo(BlogsPosts::class);
    }

}
