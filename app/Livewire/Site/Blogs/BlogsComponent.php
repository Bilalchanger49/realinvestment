<?php

namespace App\Livewire\Site\Blogs;


use Livewire\Component;

class BlogsComponent extends Component
{
    public $signature;

    public function submit()
    {
        dd($this->signature);
        \Storage::put('signatures/signature.png', base64_decode(Str::of($this->signature)->after(',')));
    }

    public function render()
    {
        return view('livewire.site.blogs.blogs')->extends('layouts.site');
    }

}
