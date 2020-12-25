<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Livewire\Component;

/**
 * Class PublishPost
 * @package App\Http\Livewire\Admin\Posts
 */
class PublishPost extends Component
{
    public $post;
    public $showDateInput = false;
    public $publishDate;
    public $published;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->getPublishDate();
    }

    public function getPublishDate()
    {
        if ($this->post->published_at) {
            $this->publishDate = (new DateTime($this->post->published_at))->format("Y-m-d\TH:i:s");
        } else {
            $this->publishDate = null;
        }

        $this->isPostPublished(); // Refresh $published on each update
    }

    public function isPostPublished()
    {
        if ($this->publishDate != null && $this->publishDate <= $this->getCurrentTime()) {
            $this->published = true;
        } else {
            $this->published = false;
        }

    }

    /**
     * Set a publish date and time
     * @param Request $request
     */
    public function publishDate()
    {
        $data = $this->validate([
            'publishDate' => 'required'
        ]);
        $this->post->published_at = date("Y-m-d H:i:s", strtotime($this->publishDate));
        $this->post->save();
        $this->getPublishDate();
        $this->showDateInput();
    }


    /**
     * Set post to be published or unpublished
     */
    public function publishOrUnpublish()
    {
        if ($this->publishDate == null || $this->publishDate > $this->getCurrentTime()) {
            $this->post->published_at = date("Y-m-d H:i:s");
            $this->post->save();

        } else {
            $this->post->published_at = null;
            $this->post->save();
        }
        $this->getPublishDate(); // Refresh $publishDate and $published
    }

    /**
     * Show DateTime box
     */
    public function showDateInput()
    {
        $this->showDateInput = $this->showDateInput ? false : true;
    }

    public function getCurrentTime()
    {
        return (new DateTime())->format("Y-m-d\TH:i:s");
    }


    public function render()
    {
        return view('livewire.admin.posts.publish-post', [
            'post' => Post::find($this->post->id)->get()
        ]);
    }
}
