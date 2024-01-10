<?php

namespace App\Livewire;

use Livewire\Component;

class FactoryPost extends Component
{
    public $layout = 'layouts.app';
    public $title = '';

    public function save(){
        $dd = $this->only(['title']);
        dd($dd);
     }
    public function render()
    {
        return view('livewire.factory-post');
    }

    
}
