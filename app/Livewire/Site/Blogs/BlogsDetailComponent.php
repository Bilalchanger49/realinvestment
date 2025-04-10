<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Livewire\Component;

class BlogsDetailComponent extends Component
{
    public $blog;

    public function mount($id)
    {
        $this->blog = BlogsPosts::with(['category', 'user'])->findOrFail($id);
    }

    public function render()
    {

        return view('livewire.site.blogs.blogsDetail')->extends('layouts.site');
    }

}
