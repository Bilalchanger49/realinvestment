<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use App\Models\BlogViews;
use Carbon\Carbon;
use Livewire\Component;

class BlogsDetailComponent extends Component
{
    public $blog;

    public function mount($id)
    {
        $this->blog = BlogsPosts::findOrFail($id);
    }

    public function render()
    {

        $alreadyViewed = BlogViews::where('blogs_post_id', $this->blog->id)
            ->where('ip_address', request()->ip())
            ->where('created_at', '>=', now()->subDay())
            ->exists();

        if (!$alreadyViewed) {
            BlogViews::create([
                'blogs_post_id' => $this->blog->id,
                'ip_address' => request()->ip(),
            ]);
        }

        return view('livewire.site.blogs.blogsDetail')->extends('layouts.site');
    }

}
