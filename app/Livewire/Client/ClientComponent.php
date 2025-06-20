<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\clientes;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('clientes')]
class ClientComponent extends Component
{
        use WithPagination; 
       //Propiedades clase
       public $search='';
       public $totalRegistros=0;
       public $cantidad=5;
       //Propiedades modelo
       public $nombre;
       public $Id;
       public $identificacion;
       public $telefono;
       public $email;
       public $empresa;
       public $nit;
       public $tipo_sat;
   
    public function render()
    {
        if($this->search!='')
        {
            $this->resetPage();
        }    
        $this->totalRegistros = clientes::count();
        $clientes=clientes::where('nombre','like','%'.$this->search.'%') 
            ->orderBy('id','desc')
            ->paginate($this->cantidad);
        //$categories=categorias::all()->reverse();
       // $categories=collect();

        return view('livewire.client.client-component',['clientes'=>$clientes]);
    }

    public function create()
    {
        $this->Id=0;
        $this->clean();
        $this->dispatch('open-modal','modalClient');

    }

    public function store(){
        //dump('Crear categoria');
        $rules=[
            'nombre' =>'required|min:5|max:255|unique:clientes',
            'identificacion' =>'required|min:5|max:15|unique:clientes',
            'email' =>'max:255|email|nullable'
        ];

        $this->validate($rules);
        $cliente = new clientes();
        $cliente->nombre = $this->nombre;
        $cliente->identificacion = $this->identificacion;
        $cliente->telefono = $this->telefono;
        $cliente->email = $this->email;
        $cliente->empresa = $this->empresa;
        $cliente->nit = $this->nit;
        $cliente->tipo_sat = $this->tipo_sat;
        $cliente->save();
        
        $this->dispatch('close-modal','modalClient');
        $this->dispatch('msg','Cliente creado correctamente');
        $this->clean();
    }

    public function edit(clientes $cliente)
    {   
        $rules=[
            'nombre' =>'required|min:5|max:255',
            'identificacion' =>'required|min:5|max:15|unique:clientes',
            'email' =>'max:255|email|nullable'
        ];
        //dd($cliente);

        $this->Id= $cliente->id;
        $this->nombre=$cliente->nombre; 
        $this->identificacion=$cliente->identificacion; 
        $this->telefono=$cliente->telefono; 
        $this->email=$cliente->email; 
        $this->empresa=$cliente->empresa; 
        $this->nit=$cliente->nit; 
        $this->tipo_sat=$cliente->tipo_sat;
        //dump($category);
        $this->dispatch('open-modal','modalClient');
    }

    public function update(clientes $cliente)
    { 
       //dump($category);
       $rules=[
        'nombre' =>'required|min:5|max:255',
        'identificacion' =>'required|min:5|max:15|unique:clientes,id,'.$this->Id,
        'email' =>'max:255|email|nullable'
    ];
   
    $this->validate($rules);  
    $cliente->nombre=$this->nombre;
    $cliente->identificacion = $this->identificacion;
    $cliente->telefono = $this->telefono;
    $cliente->email = $this->email;
    $cliente->empresa = $this->empresa;
    $cliente->nit = $this->nit;
    $cliente->tipo_sat=$this->tipo_sat;
    $cliente->update();
    $this->dispatch('close-modal','modalClient');
    $this->dispatch('msg','Cliente editada correctamente');
    $this->clean(); 
    } 

    #[On('destroyClient')]
    public function destroy($id)
    { 
       // dump($id);
       $cliente = clientes::findOrfail($id);
       $cliente->delete();
       $this->dispatch('msg','Categoria a sido eliminado correctamente');
    }

    public function clean()
    {
        $this->reset(['nombre','identificacion','telefono','email','empresa','nit','tipo_sat']);
        $this->resetErrorBag();

    }
}
