<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{

    public $name;
    public $slug;


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ]);
    }

    public function StoreCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category Has Been Add Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
