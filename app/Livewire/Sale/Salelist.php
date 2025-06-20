<?php

namespace App\Livewire\Sale;

use App\Models\ventas;
use Livewire\Component;

use App\Models\productos;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Ventas')]

class Salelist extends Component
{
    use WithPagination;

    public $search='';
    public $totalRegistros=0;
    public $cant=5;

    public $totalVentas=0;
    public $dateInicio=0;
    public $dateFin=0;



    public function render()
    {   
        if($this->search!='')
        {
            $this->resetPage();
        }    
        $this->totalRegistros = ventas::count();
        $ventasQuery=ventas::where('id','like','%'.$this->search.'%'); 
            
        if($this->dateInicio && $this->dateFin)
        {
            $ventasQuery = $ventasQuery->whereBetween('fecha',[$this->dateInicio,$this->dateFin]);
            $this->totalVentas = $ventasQuery->sum('total');
        }
        else
        {
            $this->totalVentas = ventas::sum('total');
        }

        $ventas = $ventasQuery
            ->orderBy('id','desc')
            ->paginate($this->cant);

        return view('livewire.sale.salelist',["ventas"=>$ventas]);
    }

    #[On('destroySale')]
    public function destroy($id)
    {
        $venta = ventas::findOrFail($id);
       
        foreach($venta->items as $item)
        {
            productos::find($item->productos_id)->increment('stock',$item->cantidad);
            $item->delete();
        }

        $venta->delete();
        $this->dispatch('msg','venta eliminada');
    }

    #[On('setDates')]
    public function setDates($fechaInicio,$fechaFinal)
    {
      // dump($fechaInicio,$fechaFinal);
       $this->dateInicio = $fechaInicio;
       $this->dateFin = $fechaFinal;
    }
}
