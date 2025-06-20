<?php

namespace App\Livewire\Category;

use Override;
use Livewire\Component;
use App\Models\categorias;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Categorias')]
class CategoryComponent extends Component
{   
    use WithPagination;
    //Propiedades clase
    public $search='';
    public $totalRegistros=0;
    public $cantidad=5;
    //Propiedades modelo
    public $name;
    public $Id;

    public function render()
    {
        if($this->search!='')
        {
            $this->resetPage();
        }    
        $this->totalRegistros = categorias::count();
        $categories=categorias::where('nombre','like','%'.$this->search.'%') 
            ->orderBy('id','desc')
            ->paginate($this->cantidad);
        //$categories=categorias::all()->reverse();
       // $categories=collect();
        return view('livewire.category.category-component',[
         'categories' => $categories  
    ]);
    }

    public function mount(){
        

    }

    public function create()
    {
        $this->Id=0;
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal','modalCategory');

    }

    public function store(){
        //dump('Crear categoria');
        $rules=[
            'name' =>'required|min:5|max:255|unique:categorias'
        ];
        $messages = [
            'name.required'=> 'El nombre es requerido',
            'name.min'=> 'El nombre debe tener minimo 5 caracteres',
            'name.max'=> 'El nombre no debe superar los 255 caracteres',
            'name.unique'=> 'El nombre de la categoria ya existe'
        ];
        $this->validate($rules,$messages);
        $category = new categorias();
        $category->nombre = $this->name;
        $category->save();
        
        $this->dispatch('close-modal','modalCategory');
        $this->dispatch('msg','Categoria creada correctamente');
        $this->reset(['name']);
    }

    public function edit(categorias $category)
    {   
        $this->Id= $category->id;
        $this->name=$category->nombre; 
        //dump($category);
        $this->dispatch('open-modal','modalCategory');
    }

    public function update(categorias $category)
    { 
       //dump($category);
       $rules=[
        'name' =>'required|min:5|max:255|unique:categorias,id,'.$this->Id
    ];
    $messages = [
        'name.required'=> 'El nombre es requerido',
        'name.min'=> 'El nombre debe tener minimo 5 caracteres',
        'name.max'=> 'El nombre no debe superar los 255 caracteres',
        'name.unique'=> 'El nombre de la categoria ya existe'
    ];
    $this->validate($rules,$messages);  
    $category->nombre=$this->name;
    $category->update();
    $this->dispatch('close-modal','modalCategory');
    $this->dispatch('msg','Categoria editada correctamente');
    $this->reset(['name']); 
    } 
    
    #[On('destroyCategory')]
    public function destroy($id)
    { 
       // dump($id);
       $category = categorias::findOrfail($id);
       $category->delete();
       $this->dispatch('msg','Categoria a sido eliminado correctamente');
    }


}
