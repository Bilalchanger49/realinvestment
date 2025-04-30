<?php

namespace App\Livewire\Site\Blogs;

use App\Models\BlogsPosts;
use Livewire\Component;

class LatestBlogsComponent extends Component
{

    public function render()
    {

        $latestBlogs = BlogsPosts::latest('created_at')
            ->take(3)
            ->get();

        return view('livewire.site.blogs.latestBlogs', compact('latestBlogs'))->extends('layouts.site');
    }

}
