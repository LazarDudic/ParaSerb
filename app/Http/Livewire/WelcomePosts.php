<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class WelcomePosts extends Component
{
    public $paginate = 3;
    public $sortDirection = 'desc';
    public $category = 0;
    public $posts;

    public function seeMore()
    {
        $this->paginate += 6;
    }

    public function sort()
    {
        if ($this->category != 0) {
            $this->posts = Post::orderBy('created_at', $this->sortDirection)
                ->where('category_id', $this->category)
                ->where('published_at', '<=', now())
                ->take($this->paginate)
                ->get();
        } else {
            $this->posts = Post::where('published_at', '<=', now())
                ->orderBy('created_at', $this->sortDirection)
                ->take($this->paginate)
                ->get();
        }
    }

    public function render()
    {
        $this->sort();
        return view('livewire.welcome-posts', [
            'posts' => $this->posts,
            'categories' =>Category::all(),
        ]);
    }
}
