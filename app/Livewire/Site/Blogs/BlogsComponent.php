<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $queryblogs = BlogsPosts::with('category');

        if (!empty($this->search)) {
            $queryblogs->where('title', 'like', '%' . $this->search . '%');
        }

        $blogs = $queryblogs->latest()->paginate(1);

        return view('livewire.site.blogs.blogs', [
            'blogs' => $blogs,
        ])->extends('layouts.site');
    }

}
