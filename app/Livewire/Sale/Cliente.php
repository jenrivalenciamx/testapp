<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use App\Models\clientes;
use Livewire\Attributes\On;

class Cliente extends Component
{
    public $Id=0;  
    public $client=1;
    public $nombreCte;  

     //Propiedades modelo
     public $nombre;

     public $identificacion;
     public $telefono;
     public $email;
     public $empresa;
     public $nit;
     public $tipo_sat;

    public function render()
    {
        return view('livewire.sale.cliente',[
            "clients"=>clientes::all()
        ]);
    }

    #[On('client_id')]
    public function client_id($id=1)
    {
       
        $this->client=$id;
        $this->nombreCte($id);
    }

    public function mount()
    {
        $this->nombreCte();
    }

    public function nombreCte($id=1)
    {
        $buscarCte=clientes::find($id);
        $this->nombreCte = $buscarCte->nombre;
    }    

    public function store(){
        //dump('Crear categoria');
        $rules=[
            'nombre' =>'required|min:5|max:255|unique:clientes',
            'identificacion' =>'required|min:5|max:15|unique:clientes',
            'email' =>'max:255|email|nullable'
        ];
       // dump($this);
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
        $this->dispatch('client_id',$cliente->id);
       
        $this->clean();
    }

    public function edit(clientes $cliente)
    {   
        $rules=[
            'nombre' =>'required|min:5|max:255',
            'identificacion' =>'required|min:5|max:15|unique:clientes',
            'email' =>'max:255|email|nullable'
        ];


        $this->Id= $cliente->id;
        $this->nombre=$cliente->nombre; 
        $this->identificacion=$cliente->identificacion; 
        $this->telefono=$cliente->telefono; 
        $this->email=$cliente->email; 
        $this->empresa=$cliente->empresa; 
        $this->nit=$cliente->nit; 
        $this->tipo_sat=$cliente->tipo_sat;
        
        $this->dispatch('open-modal','modalClient');
    }



    public function openModal()
    {
        $this->dispatch('open-modal','modalClient');
    }

    public function clean()
    {
        $this->reset(['nombre','identificacion','telefono','email','empresa','nit','tipo_sat']);
        $this->resetErrorBag();

    }
}
