<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function publishOrUnpublish($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post->published_at == null) {
            $post->published_at = now();
            $post->save();
        } else {
            $post->published_at = null;
            $post->save();
        }

    }

    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

    }

    public function delete($postId)
    {
        $post = Post::findOrFail($postId);
        $post->deleteImage();
        $post->delete();
        session()->flash('success', 'Post deleted.');
    }


    public function render()
    {

        return view('livewire.admin.posts.show-posts', [
            'posts' => Post::orderBy($this->sortField, $this->sortDirection)->paginate($this->paginate)

        ])
            ->extends('layouts.admin', ['title' => 'Posts'])
            ->section('content');
        ;
    }
}
