<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;

    public $perPage = 6;

    public function render()
    {
        return view('livewire.site.blogs.blogs', [
            'blogs' => BlogsPosts::with('category')->latest()->paginate($this->perPage)
        ])->extends('layouts.site');
//        return view('livewire.site.blogs.blogs')->extends('layouts.site');
    }

}
