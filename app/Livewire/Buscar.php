<?php

namespace App\Livewire;

use App\Models\productos;
use Livewire\Component;

class Buscar extends Component
{
    public $buscar;
    public function render()
    {     
        if($this->buscar)
        {
            $products = productos::where('nombre','like','%'.$this->buscar.'%')->take(5)->get();
        }
        else
        {
            $products = collect();      
        }


        
        return view('livewire.buscar',['products'=>$products]);
    }
}
