<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\clientes;
use Livewire\Attributes\Title;

#[Title('Ver Cliente')]
class ClientShow extends Component
{
    public clientes $cliente;    
    public function render()
    {
        return view('livewire.client.client-show');
    }
}
