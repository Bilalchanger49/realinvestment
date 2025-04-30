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
        $queryblogs = BlogsPosts::select('blogs_posts.*')
            ->selectRaw('
            (select count(*) from blog_views where blog_views.blogs_post_id = blogs_posts.id and created_at >= ?) as views_last_30_days,
            (select count(*) from blog_views where blog_views.blogs_post_id = blogs_posts.id) as total_views
        ', [now()->subDays(30)])
            ->having('views_last_30_days', '>', 0)
            ->orderByDesc('views_last_30_days');
        

        if (!empty($this->search)) {
            $queryblogs->where('title', 'like', '%' . $this->search . '%');
        }

        $blogs = $queryblogs->latest()->paginate(1);


        return view('livewire.site.blogs.blogs', [
            'blogs' => $blogs,
        ])->extends('layouts.site');
    }

}
