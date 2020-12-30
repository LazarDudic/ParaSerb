<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class WelcomePosts extends Component
{
    public $paginate = 3;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $category = 0;

    public function seeMore()
    {
        $this->paginate += 3;
    }

    public function render()
    {
        if ($this->category != 0) {
            $posts = Post::where('category_id', $this->category)
                ->where('published_at', '<=', now())
                ->orderBy($this->sortField, $this->sortDirection)
                ->take($this->paginate)
                ->get();
        }

        $posts ??= Post::where('published_at', '<=', now())
            ->orderBy($this->sortField, $this->sortDirection)->take($this->paginate)->get();


        return view('livewire.welcome-posts', [
            'posts' => $posts,
            'categories' =>Category::all(),
        ]);
    }
}
