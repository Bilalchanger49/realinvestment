<?php

namespace App\Livewire\Admin\Blogs\Categories;

use App\Models\BlogsCategory;
use Livewire\Component;


class CreateCategoryComponent extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function save()
    {
        $this->validate();

        BlogsCategory::create(['name' => $this->name]);

        session()->flash('success', 'Category Created!');
        return redirect()->route('admin.category');
    }
    public function render(){

        return view('livewire.admin.blogs.categories.create')->extends('layouts.auth');
    }

}
