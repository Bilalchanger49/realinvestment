<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsCategory;
use App\Models\BlogsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlogsComponent extends Component
{
    use WithFileUploads;

    public $title, $category_id, $content, $thumbnail;
    public $categories;



    public function mount()
    {
        $this->categories = BlogsCategory::all();
    }

    public function save()
    {

        $validator = $this->validate([
            'title' => 'required|string|max:255',
//            'category_id' => 'required|exists:categories,id',
            'category_id' => 'nullable',
            'content' => 'nullable',

        ]);

//        dd($validator['title']);
        $thumbnailPath = null;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('blogs-thumbnails', 'public');
        }

        BlogsPosts::create([
            'user_id' => 1,
            'title' => $validator['title'],
            'category_id' => 1,
            'content' => $validator['content'],
            'thumbnail' => $thumbnailPath,
        ]);

        session()->flash('success', 'Blog created successfully.');
        $this->reset(['title', 'category_id', 'content']);
        $this->dispatch('resetSummernote');
        return redirect()->route('site.blogs');
    }
    public function render()
    {
        return view('livewire.site.blogs.createBlogs')->extends('layouts.site');
    }

}
