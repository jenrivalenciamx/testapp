<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class Currency extends Component
{

    #[Reactive]    
    public $total;
    public $valores =[];
    public $subtotal_con_impuestos=0;
  

    public function render()
    {

        return view('livewire.sale.currency');
    }

    public function mount()
    {
        $this->valores=[
            10,20,50,100,200,500,1000
        ];

    }

    public function setPago($valor)
    {
        
        $this->dispatch('setPago',$valor);
        $this->dispatch('close-modal','modalCurrency');

    }


    public function openModal()
    {
        $this->dispatch('open-modal','modalCurrency');
    }
}
