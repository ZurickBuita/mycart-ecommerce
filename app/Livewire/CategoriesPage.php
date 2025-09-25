<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Categories - MyCart')]
class CategoriesPage extends Component
{
    public function render()
    {
        return view('livewire.categories-page');
    }
}
