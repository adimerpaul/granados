<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddProduct extends Component
{
    public $categories;
    public $measures;

    public function mount($categories, $measures)
    {
        $this->categories = $categories;
        $this->measures = $measures;
    }
    
    public function render()
    {
        return view('livewire.add-product');
    }
}
