<?php

namespace App\Livewire\Site\Blogs;


use App\Models\BlogsPosts;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class BlogCommentsComponent extends Component
{
    public $post;
    public $replyText = [];

    public $newComment = '';
    public $comments;


    public function mount(BlogsPosts $post)
    {
        $this->post = $post;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::where('blogs_post_id', $this->post->id)
            ->whereNull('parent_id')
            ->with(['replies.user', 'user'])
            ->latest()
            ->get();
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'blogs_post_id' => $this->post->id,
            'body' => $this->newComment,
            'parent_id' => null,
        ]);

        $this->newComment = '';
        $this->loadComments();
    }

    public function replyTo($parentId)
    {
        $this->validate([
            'replyText.' . $parentId => 'required|string'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'blogs_post_id' => $this->post->id,
            'body' => $this->replyText[$parentId],
            'parent_id' => $parentId,
        ]);

        $this->replyText[$parentId] = '';
        $this->loadComments();
    }

    public function render()
    {
        $comments = Comment::where('blogs_post_id', $this->post->id)->get();

        return view('livewire.site.blogs.blogComment', compact('comments'));
    }
}
