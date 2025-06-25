<?php

namespace App\Livewire\Product;

use Livewire\Component;
use App\Models\productos;
use App\Models\categorias;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Storage;

#[Title('Productos')]

class ProductComponent extends Component
{

    use WithFileUploads;
    use WithPagination;
    //Propiedades clase
    public $search='';
    public $totalRegistros=0;
    public $cantidad=5;
    //Propiedades modelo

    public $Id=0;
    public $nombre;
    public $categoria_id;
    public $descripcion;
    public $precio_compra;
    public $precio_venta;
    public $codigo_barras;
    public $stock=0;
    public $stock_minimo=10;
    public $fecha_vencimiento;
    public $activo=1;
    public $imagen;
    public $imagenModelo;

    public function render()
    {
       //$this->dispatch('open-modal','modalProduct');
        $this->totalRegistros = productos::count();
        $products=productos::where('nombre','like','%'.$this->search.'%')
            ->orderBy('id','desc')
            ->paginate($this->cantidad);
        return view('livewire.product.product-component',[
            'products' => $products   ]);
    }

    public function create()
    {
        $this->Id=0;
        $this->clean();

        $this->dispatch('open-modal','modalProduct');

    }

    #[Computed()]
    public function categorias()
    {
        return categorias::all();

    }

    public function store(){
       // dump('crear producto');

        $rules=[
            'nombre' => 'required|min:5|max:255|unique:productos',
            'descripcion' => 'max:255',
            'precio_compra' => 'numeric|nullable',
            'precio_venta' => 'required|numeric',
            'stock' => 'required|nullable',
            'stock_minimo' => 'numeric|nullable',
            'imagen' => 'image|max:1024|nullable',
            'categoria_id' => 'required|numeric',

        ];

          $this->validate($rules);
          $product = new productos();
          $customName= null;



        $product->nombre = $this->nombre;
        $product->descripcion = $this->descripcion;
        $product->precio_compra = $this->precio_compra;
        $product->precio_venta = $this->precio_venta;
        $product->stock = $this->stock;
        $product->stock_minimo = $this->stock_minimo;
        $product->codigo_barras = $this->codigo_barras;
        $product->fecha_vencimiento = $this->fecha_vencimiento;
        $product->categorias_id = $this->categoria_id;
        $product->activo = $this->activo;
        $product->save();

        if($this->imagen)
        {

            $customName='productos/'.uniqid().'.'.$this->imagen->extension();
            $this->imagen->storeAs('public',$customName);
           // dump($customName);
            $product->imagenes()->create(['url'=>$customName]);
        }


        $this->dispatch('close-modal','modalProduct');
        $this->dispatch('msg','Producto creado correctamente');
        $this->clean();

    }


    public function edit(productos $product)
    {
        //dd("121");
        $this->Id= $product->id;
        $this->nombre=$product->nombre;
        $this->descripcion=$product->descripcion;
        $this->precio_compra=$product->precio_compra;
        $this->precio_venta=$product->precio_venta;
        $this->stock=$product->stock;
        $this->stock_minimo=$product->stock_minimo;
        $this->imagenModelo=$product->imagen;
        $this->codigo_barras=$product->codigo_barras;
        $this->fecha_vencimiento=$product->fecha_vencimiento;
        $this->activo=$product->activo;
        $this->categoria_id=$product->categorias_id;
        //dump($category);
        $this->dispatch('open-modal','modalProduct');
    }


    public function update(productos $product)
    {
       //dump($category);
       $rules=[
            'nombre' => 'required|min:5|max:255|unique:productos,id,'.$this->Id,
            'descripcion' => 'max:255',
            'precio_compra' => 'numeric|nullable',
            'precio_venta' => 'required|numeric',
            'stock' => 'required|nullable',
            'stock_minimo' => 'numeric|nullable',
            'imagen' => 'image|max:1024|nullable',
            'categoria_id' => 'required|numeric',
    ];

    $this->validate($rules);
    $product->nombre = $this->nombre;
    $product->descripcion = $this->descripcion;
    $product->precio_compra = $this->precio_compra;
    $product->precio_venta = $this->precio_venta;
    $product->stock = $this->stock;
    $product->stock_minimo = $this->stock_minimo;
    $product->codigo_barras = $this->codigo_barras;
    $product->fecha_vencimiento = $this->fecha_vencimiento;
    $product->categorias_id = $this->categoria_id;
    $product->activo = $this->activo;
    $product->update();
  // if(Storage::exists('public/'.$product->imagenes->url))
   // {
        if($this->imagen)
        {
            // dump('NO'.'public/'.$product->imagenes->url);
            Storage::delete('public/'.$product->imagenes);
            $customName='productos/'.uniqid().'.'.$this->imagen->extension();
            $product->imagenes()->delete(['url'=>$customName]);
            $this->imagen->storeAs('public',$customName);
            $product->imagenes()->create(['url'=>$customName]);

        }
    //}
    else
    {
      //  if($this->imagen)
       // {
            //dump('SI'.'public/'.$product->imagenes->url.uniqid().'.'.$this->imagen->extension());

            $customName='productos/'.uniqid().'.'.$this->imagen->extension();
            $this->imagen->storeAs('public',$customName);
            $product->imagenes()->create(['url'=>$customName]);
        //}

    }



    $this->dispatch('close-modal','modalProduct');
    $this->dispatch('msg','Producto editado correctamente');
    $this->clean();
    }

    #[On('destroyProduct')]
    public function destroy($id)
    {
       // dump($id);
       $product = productos::findOrfail($id);


           if($product->imagenes!=null)
           {
              // dump($product->imagenes->url);
               Storage::delete('public/'.$product->imagenes->url);
               //Storage::delete($product->imagenes->url);
               // dump($product->imagenes->url);
               $customName=$product->imagenes->url;

               $product->imagenes()->delete(['url'=>$customName]);

           }



       $product->delete();
       $this->dispatch('msg','Producto a sido eliminado correctamente');
    }


   // Metodo encargado de limpieza
    public function clean(){
        $this->reset(['Id','nombre','imagen','descripcion','precio_compra',
        'precio_venta','stock','stock_minimo','codigo_barras',
        'fecha_vencimiento','activo','categoria_id']);
        $this->resetErrorBag();
    }

}
