<?php

namespace App\Models;



class Cart 
{
    public static function add(productos $producto,$cliente){

        $items = Cart::getCart();
        $cantidad = 1;
        $isr_sat=0;
        if (!$items->isEmpty()) 
        {
            
            $carrito=(Cart::getCart());
            foreach ($carrito as $item)
            {
                if($producto->id == $item->id)
                {
                    $cantidad=$item->quantity +1;
                    
                }
                
            }    
       }

         //   $cantidad = 0;

      
        
       // return 0; 


       

        // add the product to cart
       //$tes=test($producto->id,$producto->precio_venta);
       // $temp=test($producto->id,$producto->precio_venta);
      //  dd(tipo_persona_sat($cliente));

       if (tipo_persona_sat($cliente)==2)
       {
           $isr_sat= round(($cantidad *$producto->precio_venta)*(.0125),2);
         //  $iva_ret_sat=round((((($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100))/3)*2),2);
       }
       $iva_retsat=0;
       $iva_sat= round(($cantidad*$producto->precio_venta)*(porcentaje_iva_sat()/100),2);
       $total_con_impuestos = (($cantidad*$producto->precio_venta)-$isr_sat+$iva_sat)-$iva_retsat;
     //  dd($total_con_impuestos);
       //dump($producto);
        \Cart::session(userID())->add(array(
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio_venta,
            'quantity' => +1,
            'piva'=> $iva_sat,
            'pisr'=> $isr_sat,
            'pivaret'=> $iva_retsat,
            'totalconimpuestos'=> $total_con_impuestos,
            'attributes' => array(),
            'associatedModel' => $producto
        ));

        
      //  dd(\Cart::totalconimpuestos());
      //  print_r($producto);
        //\Cart::getTotal();
//\Cart::getSubTotal();
//\Cart::getSubTotalWithoutConditions();
    //   dd(\Cart::getTotal());
       // dump($producto->id);
    }

    public static function getCart()
    {
        $cart=\Cart::session(userID())->getContent();
        return $cart->sort();
    }

    public static function getTotal()
    {
        return \Cart::session(userID())->getTotal();
    }

    public static function actualizar($cliente)
    {
        $carrito=(Cart::getCart());
      // dd($carrito);
        
       
       $isr_sat= 0;
        foreach ($carrito as $item)
        {
          
            if (tipo_persona_sat($cliente)==2)
            {
                $isr_sat= round((($item->quantity+1)*$item->price)*(.0125),2);
         
            }
           
            $iva_sat= round((($item->quantity)*$item->price)*(porcentaje_iva_sat()/100),2);
            $total_con_impuestos = ($item->price*($item->quantity))-$isr_sat+$iva_sat;
           
             \Cart::session(userID())->update($item->id,[
            'quantity'=> +0,
            'piva'=> $iva_sat,
            'pisr'=> $isr_sat,
            'totalconimpuestos'=> $total_con_impuestos,
            ]);
            
            
           
        }
        
      
       
        
    }    


    public static function decrementar($id,$cliente)
    {

       // dd("DECRMENTAR 102:".$cliente.":".$id.":".tipo_persona_sat($cliente));
        $carrito=(Cart::getCart());
        $isr_sat= 0;
        foreach ($carrito as $item)
        {
            
            if($id == $item->id)
            {

            if($item->quantity > 1)
            {

               
            if (tipo_persona_sat($cliente)==2)
            {
                $isr_sat= round((($item->quantity-1)*$item->price)*(.0125),2);
          //  $iva_ret_sat=round((((($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100))/3)*2),2);
            }
         //   dd("DECRMENTAR 108:".$cliente.":".$id.":".tipo_persona_sat($cliente).":".$isr_sat);
            $iva_sat= round((($item->quantity-1)*$item->price)*(porcentaje_iva_sat()/100),2);
            $total_con_impuestos = ($item->price*($item->quantity-1))-$isr_sat+$iva_sat;
            
            return \Cart::session(userID())->update($id,[
            'quantity'=> -1,
            'piva'=> $iva_sat,
            'pisr'=> $isr_sat,
            'totalconimpuestos'=> $total_con_impuestos,
            ]);
            
            }
            }
           
        }
    }

    public static function incrementar($id,$cliente)
    {
        $carrito=(Cart::getCart());
        //dd($cliente);
        
       
       $isr_sat= 0;
        foreach ($carrito as $item)
        {
            
            if (tipo_persona_sat($cliente)==2)
            {
                $isr_sat= round((($item->quantity+1)*$item->price)*(.0125),2);
          //  $iva_ret_sat=round((((($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100))/3)*2),2);
            }
           
            $iva_sat= round((($item->quantity+1)*$item->price)*(porcentaje_iva_sat()/100),2);
            $total_con_impuestos = ($item->price*($item->quantity+1))-$isr_sat+$iva_sat;
          //  dd("INCREMENTAR 143 ".":".$id.":".$cliente);
            return \Cart::session(userID())->update($id,[
            'quantity'=> +1,
            'piva'=> $iva_sat,
            'pisr'=> $isr_sat,
            'totalconimpuestos'=> $total_con_impuestos,
            ]);
            
            
           
        }
        
      
       
        
    }

    public static function removerItem ($id)
    {
        return \Cart::session(userID())->remove($id);
    }

    public static function clear()
    {
        return \Cart::session(userID())->clear();
    }

    public static function totalArticulos()
    {
        return \Cart::session(userID())->getTotalQuantity();
    }

    

    

}

 function incrementar2($producto)
    {

        dd($producto);
        if (tipo_persona_sat()==1)
        {
            $isr_sat= round((($producto->quantity+1)*$producto->precio_venta)*(.0125),2);
          //  $iva_ret_sat=round((((($item->quantity*$precio_venta)*(porcentaje_iva_sat()/100))/3)*2),2);
        }
        
        $iva_sat= round((($producto->quantity+1)*$producto->precio_venta)*(porcentaje_iva_sat()/100),2);
        $total_con_impuestos = $producto->precio_venta+$isr_sat+$iva_sat;

        return \Cart::session(userID())->update($id,[
            'quantity'=> +1,
            'piva'=> $iva_sat,
            'pisr'=> $isr_sat,
            'totalconimpuestos'=> $total_con_impuestos,
    ]);
    }


 function test($id,$precio)
    {
        $total_isr_sat=0;
        $total_iva_sat=0;
        $total_iva_ret_sat=0;
        $subtotal_sin_impuestos=0;
        $subtotal_con_impuestos=0;

        $iva_sat=0;
        $isr_sat=0;
        $iva_ret_sat=0;
        
  
            if (tipo_persona_sat()==1)
            {
                $isr_sat= round((1*$precio)*.0125,2);
                $iva_ret_sat=round(((((1*$precio)*(porcentaje_iva_sat()/100))/3)*2),2);
            }
            
            $iva_sat= round((1*$precio)*(porcentaje_iva_sat()/100),2);
            
            $subtotal_con_impuestos =round((1*$precio),2)+$iva_sat+$isr_sat-$iva_ret_sat;
           
        

        return   $subtotal_con_impuestos;
    }