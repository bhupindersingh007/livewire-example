<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag;

class TagForm extends Component
{
    public $name;
    public $message;

    public function submit()
    {
          Tag::create(['name' => $this->name]);
          $this->name = '';
          $this->message = 'Tag Created';
    }

    public function render()
    {
        return view('livewire.tag-form');
    }
}
