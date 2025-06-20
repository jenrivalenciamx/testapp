<?php

namespace App\Livewire\Product;

use Livewire\Component;

use App\Models\productos;
use Livewire\Attributes\Title;

#[Title('Ver producto')]
class ProductShow extends Component
{
    public productos $product;

    public function render()
    {
        return view('livewire.product.product-show');
    }
}
