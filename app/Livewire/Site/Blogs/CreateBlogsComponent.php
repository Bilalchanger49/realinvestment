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



    public function save()
    {

        $validator = $this->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:blogs_categories,id',
            'content' => 'nullable',

        ]);

        $thumbnailPath = null;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('blogs-thumbnails', 'public');
        }

        BlogsPosts::create([
            'user_id' => Auth::user()->id,
            'title' => $validator['title'],
            'category_id' => $validator['category_id'],
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
        $categories = BlogsCategory::all();
        return view('livewire.site.blogs.createBlogs', compact('categories'))->extends('layouts.site');
    }

}
