<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsCategory;
use App\Models\BlogsPosts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlogsComponent extends Component
{
    use WithFileUploads;

    public $blog;
    public $title, $content, $category_id, $categories;
    public $newThumbnail;

    public function mount($id)
    {
        $this->blog = BlogsPosts::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $this->title = $this->blog->title;
        $this->content = $this->blog->content;
        $this->category_id = $this->blog->category_id;
        $this->categories = BlogsCategory::all();
    }

    public function update()
    {
        $thumbnailPath = $this->blog->thumbnail;
        $validator = $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'nullable',
            'newThumbnail' => 'nullable|image|max:2048',
        ]);

        if ($this->newThumbnail) {
            $thumbnailPath = $this->newThumbnail->store('blogs-thumbnails', 'public');
            $this->blog->thumbnail = $thumbnailPath;
        }

        $this->blog->update([
            'title' => $this->title,
            'content' => $this->content,
            'category_id' => $this->category_id,
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
