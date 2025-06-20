<x-card title="Ver venta">
    <x-slot:cardTools>

        <a href="{{route('sales.list')}}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>


    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Cliente</h5>
                <div class="card-body">
                    {{-- card datos cliente --}}
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center" style="font-size: 4rem">
                            <i class="fas fa-user-circle" ></i>
                        </div>

                        <h3 class="profile-username text-center my-3"></h3>

                        <ul class="list-group  mb-3">
                            <li class="list-group-item">
                                <b>Documento</b> 
                                <a class="float-right">
                                    {{$venta->clientes->nombre}}
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Telefono</b> 
                                <a class="float-right">
                                    {{$venta->clientes->telefono}}   
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> 
                                <a class="float-right">
                                    {{$venta->clientes->email}}  
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Empresa</b> 
                                <a class="float-right">
                                    {{$venta->clientes->empresa}}  
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>NIT</b> <a class="float-right">
                                    {{$venta->clientes->nit}}     
                                </a>
                            </li>
            
                          <li class="list-group-item">
                            <b>Creado</b> 
                            <a class="float-right">
                                {{$venta->clientes->created_at}}  
                            </a>
                        </li>
                    </ul>

                    <a href="{{route('clients.show',$venta->clientes)}}" class="btn btn-primary btn-block"><b>Ver</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- end card datos cliente --}}
        </div>
    </div>

</div>
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Factura: <b>FV-{{$venta->id}}</b> </h3>
          <div class="card-tools">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <i class="fas fa-tshirt" title="Numero productos"></i> 
            <span class="badge badge-pill badge-primary mr-2">
                {{$venta->items->count()}}
            </span>
            <i class="fas fa-shopping-basket" title="Numero items"></i>
            <span class="badge badge-pill badge-primary mr-2">
                {{$venta->items->sum('cantidad')}}
            </span>
            <i class="fas fa-clock" title="Fecha y hora de creacion"></i>
            {{$venta->clientes->created_at}}  
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped text-center">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-image"></i></th>
                        <th scope="col">Producto</th>
                        <th scope="col">P. Venta</th>
                        
                        <th scope="col" width="15%">Qty</th>
                        <th scope="col">Impuestos</th>
                        <th scope="col">Sub total</th>

                    </tr>

                </thead>
                <tbody>
                    
                    @forelse ($venta->items as $producto)
              
                   
                    <tr>
                        <th scope="row">{{++$loop->index}}</th>
                        <td>
                          
                         
                            <x-image :item="$product=App\Models\productos::find($producto->productos_id)" size="50" float="float-center"/>
                    

                            
                        </td>
                        <td>
                            {{$producto->productos->nombre}}  
                          </td>
                          <td>{{money($producto->precio)}}</td>
                          <td>
                            <span class="badge badge-pill badge-primary">
                                {{$producto->cantidad}}
                            </span>
                        </td>
                        <td>{{number_format($producto->iva-$producto->isr,2)}}</td>
                        
                       

                        <td>
                            {{number_format($producto->subtotal,2)}}
                        </td>


                    </tr>

                    @empty

                    <tr>
                        <td colspan="10">Sin Registros</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="5"></td>
                        <td><h5>Total:</h5></td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    {{number_format($venta->total,2)}}
                                </span>
                              </h5>
                          </td>

                      </tr>
                      <tr>

                        <td colspan="7">
                         <strong>Total en letras:</strong> 
                         {{numerosLetras($venta->total)}}
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
 </div>
 <!-- /.card-body -->

</div>
<!-- /.card -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Vendedor</h3>
      <div class="card-tools">

      </div>
      <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-hover table-sm table-striped text-center">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><i class="fas fa-image"></i></th>
                <th scope="col">Nombre</th>
                <th scope="col">Perfil</th>
                <th scope="col">Email</th>
                <th scope="col">...</th>

            </tr>

        </thead>
        <tbody>
            
            <tr>
             
                <th scope="row">{{userID()}}</th>
                <td>
                    
                    <x-image :item="App\Models\User::find(userID())"/>

                </td>
                
                <td>{{$venta->user->nombre}}</td>
                <td>{{$venta->user->admin ? 'Administrador' : 'Vendedor'}}</td>

                <td>{{$venta->user->email}}</td>
                <td>
                <a href="{{route('users.show',$venta->user)}}">
                    <span class="badge badge-pill badge-primary">
                        <i class="far fa-eye"></i>
                    </span>
                    
                </a>
                </td>


        </tr>

    </tbody>
</table>
</div>
<!-- /.card-body -->

</div>
<!-- /.card -->

</div>
</div>


<x-slot:cardFooter>

</x-slot>

</x-card>   



