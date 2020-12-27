<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $paginate = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    private $categories;
    private $sortByPostCountCalled = false;

    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

        if ($field == 'post_count') {
            $this->sortByPostCount();
        } else {
            $this->categories = Category::orderBy($this->sortField, $this->sortDirection)->paginate($this->paginate);
        }
    }

    public function sortByPostCount()
    {
        $this->categories = Category::leftJoin('posts','categories.id','=','posts.category_id')->
            selectRaw('categories.*, count(posts.category_id) AS `count`')->
            groupBy('category_id')->
            orderBy('count',$this->sortDirection)->
            paginate($this->paginate);

        $this->sortByPostCountCalled = true;
    }

    public function delete($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
    }


    public function render()
    {
        if ($this->sortField == 'post_count' && !$this->sortByPostCountCalled) { $this->sortByPostCount(); }

        $this->categories ??= Category::orderBy($this->sortField, $this->sortDirection)->paginate($this->paginate);

        return view('livewire.admin.categories.show-categories', [
            'categories' => $this->categories
        ])
            ->extends('layouts.admin', ['title' => 'Categories'])
            ->section('content');;
    }
}
