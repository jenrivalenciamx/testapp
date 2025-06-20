
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-cart-plus"></i> Detalles venta {{$cliente}}</h3>
        <div class="card-tools">
            <!-- Conteo de productos -->
            <i class="fas fa-tshirt" title="Numero productos"></i>
            <span class="badge badge-pill bg-purple">{{$cart->count()}} </span>
            <!-- Conteo de articulos -->
            <i class="fas fa-shopping-basket ml-2" title="Numero items"></i>
            <span class="badge badge-pill bg-purple">{{$totalArticulos}} </span>

            <!-- card-body 
            <button wire:click='createSale' class="btn bg-purple ml-2">
                <i class="fas fa-cart-plus"></i>
                Crear Venta
            </button>-->

        </div>
    </div>
<!-- card-body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-image"></i></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">Iva</th>
                        <th scope="col">Isr</th>
                        <th scope="col">Ret Iva</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">...</th>
                    </tr>

                </thead>
                <tbody>
                
                   


                   @forelse ($cart as $producto )
                   
                   
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>
                            <x-image :item="$producto->associatedModel" size="60" />
                        </td>
                        <td>{{$producto->name}}</td>
                        <td>{!!$producto->associatedModel->precio!!}</td>
                        <td>
                            <!-- Botones para aumentar o disminuir la cantidad del producto en el carrito -->
                   
                            <button
                            wire:click='decrementar({{$producto->id}},{{$cliente}})' 
                            class="btn btn-primary btn-xs" 
                            wire:loading.attr='disabled'
                            wire:target='decrementar'>
                                - 
                            </button>

                            <span class="mx-1">{{$producto->quantity}}</span>

                            <button 
                            wire:click='incrementar({{$producto->id}},{{$cliente}})'
                            class="btn btn-primary btn-xs"
                            wire:loading.attr='disabled'
                            wire:target='incrementar'
                            {{$producto->quantity >= $producto->associatedModel->stock ? 'disabled' : ''}} >
                                +
                            </button>
                            
                        </td>
                        
                        <td>{{number_format($producto->price*$producto->quantity,2,'.',',')}}</td>
                        <td>{{number_format($producto->piva,2,'.',',')}}</td>
                       
                        <td>{{number_format($producto->pisr,2,'.',',')}}
                        </td>
                        <td>{{number_format(0,2,'.',',')}}</td>

                        
                        <td>{{number_format($producto->totalconimpuestos,2,'.',',')}}</td>
                        <td>
                            <!-- Boton para eliminar el producto del carrito -->
                            @if(!is_null($producto->id))
                            <button class="btn btn-danger btn-xs" title="Eliminar"
                            
                                wire:click='removerItem({{$producto->id}},{{$producto->quantity}})'>
                                
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @else

                            @endif
                        </td>

                    </tr>
                    <tr>
                       
                        
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="8">Sin Registros</td>
                    </tr>
                  
                       
                    @endforelse
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <h5>Totales:</h5>
                        </td>
                        <td>
                            <h5>
                                @if(isset($producto->id))
                                <span class="badge badge-pill badge-secondary" wire:click='removerItem({{$producto->id}},{{$producto->quantity}})'>
                                   
                                    {{number_format($subtotal_sin_impuestos,2,'.',',')}}
                                </span>
                               @endif
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    {{number_format(\Cart::totaliva(),2,'.',',')}}
                                </span>
                               
                            </h5>
                        </td>
                        <td>
                            <h5>
                               
                       
                                @if(\Cart::totaliva() >0) 
                               
                                <span class="badge badge-pill badge-secondary">
                                    
                                    {{number_format(\Cart::totalisr(),2,'.',',')}}
                              
                                </span>
                                @else
                           
                                @endif
                          
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    {{number_format(Cart::totalivaret(),2,'.',',')}}
                                </span>
                               
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    {{number_format(\Cart::totalconimpuestosi(),2,'.',',')}}
                                </span>
                               
                            </h5>                        </td>
                        <td></td>
                        
                    </tr>
                <tr>
                    <td colspan="10">
                        <strong>Total en letras:</strong>
                        {{numerosLetras(\Cart::totalconimpuestosi())}}
                    </td>
                </tr>
                    
                </tbody>
            </table>
        </div>

    </div>
<!-- end-card-body -->
</div>