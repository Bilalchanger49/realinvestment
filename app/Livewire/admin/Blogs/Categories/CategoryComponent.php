<?php

namespace App\Livewire\Admin\Blogs\Categories;

use App\Models\BlogsCategory;
use Livewire\Component;


class CategoryComponent extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = BlogsCategory::latest()->get();
    }
    public function delete($id)
    {
        $category = BlogsCategory::findOrFail($id);
        $category->delete();
        session()->flash('success', 'Category deleted successfully.');
        return redirect()->route('admin.category');
    }
    public function render(){

        return view('livewire.admin.blogs.categories.index')->extends('layouts.auth');
    }

}
