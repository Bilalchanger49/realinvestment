<?php

namespace App\Livewire\Site\Blogs;


use Livewire\Component;

class BlogsComponent extends Component
{
    public function render()
    {
        return view('livewire.site.blogs.blogs')->extends('layouts.site');
    }
}
