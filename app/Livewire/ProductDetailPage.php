<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Product Detail - MyCart')]
class ProductDetailPage extends Component
{
    public function render()
    {
        return view('livewire.product-detail-page');
    }
}
