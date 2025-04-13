<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogsManagerComponent extends Component
{
    public $blogs;


    public function mount()
    {
        $this->blogs = BlogsPosts::where('user_id', Auth::id())->latest()->get();
    }

    public function deleteBlog($id)
    {
        $blog = BlogsPosts::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $blog->delete();

        $this->blogs = BlogsPosts::where('user_id', Auth::id())->latest()->get(); // refresh
        session()->flash('message', 'Blog deleted successfully.');
    }

    public function render()
    {

        return view('livewire.site.blogs.blogsManager')->extends('layouts.site');
    }

}
