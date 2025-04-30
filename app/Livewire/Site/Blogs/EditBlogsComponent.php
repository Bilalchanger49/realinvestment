<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlogsComponent extends Component
{
    use WithFileUploads;

    public $blog;
    public $title, $content;
    public $newThumbnail;

    public function mount($id)
    {
        $this->blog = BlogsPosts::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $this->title = $this->blog->title;
        $this->content = $this->blog->content;
    }

    public function update()
    {
        $thumbnailPath = $this->blog->thumbnail;
        $validator = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'newThumbnail' => 'nullable|image|max:2048',
        ]);


        if ($this->newThumbnail) {
            $thumbnailPath = $this->newThumbnail->store('blogs-thumbnails', 'public');
            $this->blog->thumbnail = $thumbnailPath;
        }

        $this->blog->update([
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $thumbnailPath,
        ]);


        session()->flash('message', 'Blog updated successfully.');
        return redirect()->route('site.blogs');
    }

    public function render()
    {
        return view('livewire.site.blogs.editBlogs')->extends('layouts.site');
    }

}
