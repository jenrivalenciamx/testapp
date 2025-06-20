<?php

namespace App\Livewire\Shop;

use App\Models\Shop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;


#[Title('Tiendas')]
class ShopComponent extends Component
{
    use WithFileUploads;
    public $shop;
    public $nombre;
    public $slogan;
    public $telefono;
    public $email;
    public $direccion;
    public $ciudad;
    public $imagen;
    public $imagenModelo;

    public function render()
    {
        $shop = Shop::first();
        return view('livewire.shop.shop-component');
    }


    public function mount()
    {
        $this->shop = Shop::first();
    }

    public function edit()
    {
        $this->clean();
        $this->nombre = $this->shop->nombre;
        $this->slogan = $this->shop->slogan;
        $this->telefono = $this->shop->telefono;
        $this->email = $this->shop->email;
        $this->direccion = $this->shop->direccion;
        $this->ciudad = $this->shop->ciudad;
        $this->dispatch('open-modal','modalShop');

    }

    public function update()
    {
        $rules = [
            'nombre'=>'required|min:5|max:255',
            'slogan'=>'max:255|nullable',
            'telefono'=>'max:255|nullable',
            'email'=>'email|nullable',
            'direccion'=>'max:255|nullable',
            'ciudad'=>'max:255|nullable',
            'imagen'=>'image|max:1024|nullable',
        ];
        $this->validate($rules);
        $this->shop->nombre=$this->nombre;
        $this->shop->slogan=$this->slogan;
        $this->shop->telefono=$this->telefono;
        $this->shop->email=$this->email;
        $this->shop->direccion=$this->direccion;
        $this->shop->ciudad=$this->ciudad;

        $this->shop->update();


        if($this->imagen)
        {
           //  dump('SI'.'public/'.$this->shop->imagenes->url);   
            Storage::delete('public/'.$this->shop->imagenes);
            $this->shop->imagenes()->delete();

            $customName='shop/'.uniqid().'.'.$this->imagen->extension();

            $this->imagen->storeAs('public',$customName);
            $this->shop->imagenes()->create(['url'=>$customName]);
  
        }    

        $this->dispatch('close-modal','modalShop');
        $this->dispatch('msg','Datos Actualizados');
        $this->clean();
        $this->mount();
   /*
        else
        {

            
            dump('NO '.'public/'.$user->imagenes->url);  
            dump('uniqid '.'public/'.uniqid());  
            dump('extension '.'public/'.$this->imagen->extension());  
            
            $customName='users/'.uniqid().'.'.$this->imagen->extension();
            $this->imagen->storeAs('public',$customName);
            $user->imagenes()->create(['url'=>$customName]); 

        }
*/
    }

    public function clean()
    {
        $this->reset(['nombre','slogan','telefono','email','direccion','ciudad','imagen','imagenModelo'
        ]);
        $this->resetErrorBag();
    }

}
