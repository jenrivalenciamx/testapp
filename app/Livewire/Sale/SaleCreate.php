<?php

namespace App\Livewire\Sale;

use App\Models\Cart;
use App\Models\ventas;
use Livewire\Component;
use App\Models\productos;
use App\Models\ventas_detalle;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;


#[Title('Ventas')]

class SaleCreate extends Component
{
    use WithPagination;

    public $search='';
    public $cant=5;
    public $totalRegistros=0;
    public $pago=0;
    public $feria_cliente=0;
    public $total_con_impuestos=0;
    
    public $updating=0;

    public $cliente=1;


    public function render()
    {
        $total_isr_sat=0;
        $total_iva_sat=0;
        $total_iva_ret_sat=0;
        $subtotal_sin_impuestos=0;
        $subtotal_con_impuestos=0;

        $iva_sat=0;
        $isr_sat=0;
        $iva_ret_sat=0;
        if($this->search!='')
        {
            $this->resetPage();

        }
        $this->totalRegistros = productos::count();
       

        
       
        $carrito=(Cart::getCart());
       
        //$temp =[];
        $i=0;
       
        foreach ($carrito as $item)
        {
           // dump("xxxx:".$item->name);
           //dd($carrito);
          
           $precio_venta=producto($item->name);
           
            $temp[$item->id]['id_sat'] =$item->id;
           
            if (tipo_persona_sat($this->cliente)==2)
            {
                $isr_sat= round(($item->quantity*$precio_venta)*$item->pisr,2);
              //  $iva_ret_sat=round((((($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100))/3)*2),2);
            }
            
            $iva_sat= round(($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100),2);
            
            $temp[$item->id]['subtotal_sin_impuestos'] =round(($item->quantity*$precio_venta),2);
            $temp[$item->id]['isr_sat'] =$isr_sat;
            $temp[$item->id]['iva_ret_sat'] =$iva_ret_sat;
            $temp[$item->id]['iva_sat'] =$iva_sat;
            $temp[$item->id]['subtotal_con_impuestos'] = $temp[$item->id]['subtotal_sin_impuestos']+ $temp[$item->id]['isr_sat']+ $temp[$item->id]['iva_sat']-$temp[$item->id]['iva_ret_sat'];
            $subtotal_sin_impuestos = $subtotal_sin_impuestos+$temp[$item->id]['subtotal_sin_impuestos'];
            $subtotal_con_impuestos = $subtotal_con_impuestos+$temp[$item->id]['subtotal_con_impuestos'];
            $total_isr_sat=$total_isr_sat+$temp[$item->id]['isr_sat'];
            $total_iva_sat=$total_iva_sat+$temp[$item->id]['iva_sat'];
            $total_iva_ret_sat=$total_iva_ret_sat+$temp[$item->id]['iva_ret_sat'];
          
            $i=$i+1;
        } 
        if($i==0)
        {
            $temp[$i]['subtotal_sin_impuestos']=0;    
            $temp[$i]['id_sat'] =0;    
            $temp[$i]['isr_sat'] =0;
            $temp[$i]['iva_ret_sat'] =0;
            $temp[$i]['iva_sat'] =0;
            $temp[$i]['subtotal_con_impuestos']=0;
            $subtotal_sin_impuestos = 0;
            $subtotal_con_impuestos = 0;
          /* $total_isr_sat=$total_isr_sat+$temp[$item->id]['isr_sat']=0;
            $total_iva_sat=$total_iva_sat+$temp[$item->id]['iva_sat']=0;
            $total_iva_ret_sat=$total_iva_ret_sat+$temp[$item->id]['iva_ret_sat']=0;

            */
            $total_isr_sat=0;
            $total_iva_sat=0;
            $total_iva_ret_=0;
        }
        if($this->updating==0)
        {
            $this->pago = \Cart::totalconimpuestosi();
            $this->feria_cliente =  $this->pago-\Cart::totalconimpuestosi();
            
        }
       
        $this->feria_cliente=number_format($this->feria_cliente,2,'.',',');
    /*
        dump($i);

        $temp[0]['id_sat']=2;
        $temp[0]['isr_sat']=1;
        $temp[1]['id_sat']=3;
        $temp[1]['isr_sat']=10;*/
        $this->total_con_impuestos=$subtotal_con_impuestos;
        
        return view('livewire.sale.sale-create',[
            'productos' => $this->productos,
            'temp' => $temp,
            'subtotal_sin_impuestos' =>$subtotal_sin_impuestos,
            'subtotal_con_impuestos'=>$subtotal_con_impuestos,
            'total_isr_sat'=>$total_isr_sat,
            'total_iva_sat'=>$total_iva_sat,
            'total_iva_ret_sat'=>$total_iva_ret_sat,
            'cart' => Cart::getCart(),
            'total' => Cart::getTotal(),
            'totalArticulos' => Cart::totalArticulos()
        ]);
        
    }
 
    //Crear Venta
    #[On('createSale')]
    public function createSale()
    {

       
        $cart=Cart::getCart();
       // dump($cart);
        if(count($cart)==0)
        {   
            $this->dispatch('msg','No hay productos',"danger");
            return;
            //dump(count($cart));
        }
        if($this->pago<Cart::getTotal())
        {
            $this->pago = Cart::getTotal();
            $this->feria_cliente = 0;
        }
        DB::transaction(function(){
            $sale = new ventas();
            
            $sale->total= \Cart::totalconimpuestosi();
            $sale->pago= \Cart::totalconimpuestosi();
            $sale->clientes_id= $this->cliente;
            $sale->fecha= date('Y-m-d');
            
            $sale->save();

           // global $cart;
           $x = 0;
           $y = 0;
           
            foreach(\Cart::session(userID())->getContent() as $producto)
            {   
                $item = new ventas_detalle();
             // dd($producto);
                
                
                //$item->name = $producto->name;
                $item->precio = $producto->price;
                $item->cantidad = $producto->quantity;
              //  $item->image = $producto->associatedModel->image->url;
                $item->iva = $producto->piva;
                $item->isr = $producto->pisr;
                $item->subtotal = $producto->totalconimpuestos;
                $item->productos_id = $producto->id;
                $item->ventas_id = $sale->id;
               // $item->fecha = date('Y-m-d');
                $x = $x+$item->iva;
                $y = $y+$item->isr;
                $item->save(); 
              //   dump($item);
             //   $sale->items()->attach($item->id,['cantidad'=>$producto->quantity]);
                productos::find($producto->id)->decrement('stock',$producto->quantity);


            }

            $sale->total_iva= $x;
            $sale->total_isr= $y;
            $sale->save();
            Cart::clear();
            $this->reset(['pago','feria_cliente','cliente']);
            $this->dispatch('msg','Venta creada correctamente');

        });

    }


    #[On('client_id')]
    public function client_id($id=1)
    {
        //$cart=Cart::getCart();
        //dd($id.":".$cart);
        //dd("DOSOSOS");
        $this->cliente=$id;
        $this->updating =0;
        Cart::actualizar($id);
       // $this->dispatch("incrementoStock.{$id}")

    }

    public function updatingPago($value)
    {   
        $carrito=(Cart::getCart());
       // dd(\Cart::totalconimpuestosi());
        $this->updating =1;

      // dd($value);
       $this->feria_cliente=number_format(0,2,'.',',');
        if (is_numeric($value)) 
        {
            if ($value >=\Cart::totalconimpuestosi() ) 
            {
                $this->pago = number_format($value,2,'.',',');
                $this->feria_cliente= $this->pago-\Cart::totalconimpuestosi();
                //$this->feria_cliente = $this->pago-$this->subtotal_con_impuestos;
                $this->feria_cliente=number_format($this->feria_cliente,2,'.',',');
            }    
        }    
    }

    #[On('add-product')]
    public function addProducto(productos $producto)
    {
       // dd("151");
        $this->updating =0;
        Cart::add($producto,$this->cliente);
    }

    public function decrementar($id,$cliente)
    {
       // dd("SALECREATE:".$id.":".$cliente);
        $this->updating =0;
        Cart::decrementar($id,$cliente);
        $this->dispatch("incrementoStock.{$id}");
    }

    public function incrementar($id,$cliente)
    {
      //  dd("INCREMENTAR".":".$id.":".$cliente);
        $this->updating =0;
        Cart::incrementar($id,$cliente);
        $this->dispatch("decrementoStock.{$id}");
       // dump($id);
    }

    public function removerItem($id,$qty)
    {
        $this->updating =0;
        Cart::removerItem($id);
        $this->dispatch("devolverStock.{$id}",$qty);
    }    

    public function clear()
    {
        
        Cart::clear();
        $this->pago=0;
        $this->feria_cliente=0;
        $this->dispatch('msg','Venta Cancelada');
        $this->dispatch('refrescarProductos');
    }

    #[On('setPago')]    
    public function setPago($valor)
    {
        //\Cart::totalconimpuestosi()
       
       // dd(\Cart::totalconimpuestosi());
        $carrito=(Cart::getCart());
       // dd(\Cart::totalconimpuestosi());
      // dd($carrito);
        $this->updating=1;
        
         if($valor==0)
         {
            $valor=\Cart::totalconimpuestosi();
         }
         $this->pago = $valor;
        //\Cart::totalconimpuestosi()
        $this->feria_cliente= $this->pago-\Cart::totalconimpuestosi();
        //$this->feria_cliente=number_format($this->feria_cliente,2,'.',',');
       // dd(\Cart::totalconimpuestosi());
      // $this->pago = number_format($valor,2,'.',',');
      $this->dispatch('createSale'); 
     
    }

    #[Computed()]
    public function productos()
    {
       return productos::where('nombre','like','%'.$this->search.'%')
        ->orderBy('id','desc')
        ->paginate($this->cant);

    }
}

 function producto($valor)
{
    $resultado = DB::table('productos')->where('nombre', $valor)->first();
 
    return $resultado->precio_venta;


}