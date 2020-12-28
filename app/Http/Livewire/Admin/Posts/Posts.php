<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Response;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $search;


    public function sortBy($field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function delete($postId)
    {
        abort_if(Gate::denies('admin-access'), Response::HTTP_FORBIDDEN);

        $post = Post::findOrFail($postId);
        $post->deleteImage();
        $post->delete();
        session()->flash('success', 'Post deleted.');
    }


    public function render()
    {
        if (strlen($this->search) > 1) {
            $posts = Post::search($this->search, ['title','content'])
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->paginate);
        }else {
            $posts = Post::orderBy($this->sortField, $this->sortDirection)->paginate($this->paginate);
        }

        return view('livewire.admin.posts.show-posts', [
            'posts' => $posts

        ])
            ->extends('layouts.admin', ['title' => 'Posts'])
            ->section('content');
    }
}
