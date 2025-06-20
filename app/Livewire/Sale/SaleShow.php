<?php

namespace App\Livewire\Sale;

use App\Models\ventas;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('ventas')]
class SaleShow extends Component
{
    public ventas $venta;
 

    public function render()
    {   
        return view('livewire.sale.sale-show');
    }
}
