<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use App\Models\productos;
use Livewire\Attributes\On;

class ProductRow extends Component
{

    public productos $producto;
    public $stock;
    public $stockLabel;

    protected function getListeners()
    {
        return [
            "decrementoStock.{$this->producto->id}"=>"decrementoStock",
            "incrementoStock.{$this->producto->id}"=>"incrementoStock",
            "refrescarProductos"=>"mount",
            "devolverStock.{$this->producto->id}"=>"devolverStock"
        ];
    }

    public function render()
    {   
        $this->stockLabel= $this->stockLabel();
        return view('livewire.sale.product-row');
    }

    public function mount()
    {
        $this->stock= $this->producto->stock;
    }


    public function addProducto(productos $producto)
    {

        if($this->stock==0)
        {
            return;
        }
        $this->dispatch('add-product',$producto);  
        $this->stock--;  
    }

    
    public function decrementoStock(){
        echo("ZZZZZZ");
        $this->stock--;

    }

    public function incrementoStock(){
        echo("XXXX");
        if($this->stock==$this->producto->stock-1)
        {
            return;
        }
        $this->stock++;

    }


    public function devolverStock($qty)
    {
        $this->stock=$this->stock+$qty;
        return;
        
    }

    public function stockLabel()
    {
        if($this->stock<=$this->producto->stock_minimo)
        {
            return '<span class="badge badge-pill badge-danger">'.$this->stock.'</span>';
        }
        else
        {
            return '<span class="badge badge-pill badge-success">'.$this->stock.'</span>';
        }
    }    

}
