<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;

class AddGalery extends Component
{
    public $addGalery = false;
    public $photoCount = 3;
    public $oldGalery = null;
    public $post;

    public function mount($post = null)
    {
        $this->post = $post;

        if($post) {
            if($post->galery) {
                $this->addGalery = true;
                $this->oldGalery = json_decode($post->galery);
            }
        }

        if(old('galery')) {
            $this->addGalery = true;
            $this->oldGalery = old('galery');
        }    
    }

    public function toggleGalery()
    {
        $this->addGalery = !$this->addGalery;
    }

    public function addInput()
    {
        if ($this->oldGalery) {
            array_push($this->oldGalery, "");
        } else {
            $this->photoCount++;
        }    
    }

    public function removeInput()
    {  
        if ($this->oldGalery) {
            array_pop($this->oldGalery);
        } else {
            if($this->photoCount > 1) {
                $this->photoCount--;
            }   
        }
    }

    public function render()
    {
        return view('livewire.admin.posts.add-galery');
    }
}
