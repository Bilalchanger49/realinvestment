<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlogsComponent extends Component
{
    use WithFileUploads;

    public $title, $content, $thumbnail;



    public function save()
    {

        $validator = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'thumbnail' => 'required'
        ]);

        $thumbnailPath = null;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('blogs-thumbnails', 'public');
        }

        BlogsPosts::create([
            'user_id' => Auth::user()->id,
            'title' => $validator['title'],
            'content' => $validator['content'],
            'thumbnail' => $thumbnailPath,
        ]);

        session()->flash('success', 'Blog created successfully.');
        $this->reset(['title', 'content']);
        $this->dispatch('resetSummernote');
        return redirect()->route('site.blogs');
    }
    public function render()
    {
        return view('livewire.site.blogs.createBlogs')->extends('layouts.site');
    }

}
