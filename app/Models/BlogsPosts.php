<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsPosts extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','thumbnail', 'title', 'category_id', 'content'];

    public function category()
    {
        return $this->belongsTo(BlogsCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }
}
