<x-card cardTitle="Detalles cliente">
    <x-slot:cardTools>
       <a href="{{route('clients')}}" class="btn btn-primary">
        <i class="fas fa-hand-point-left"></i>Regresar
 
       </a>  
    </x-slot>    
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
               

                    <h2 class="profile-username text-center">{{$cliente->nombre}}</h2>
                    
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Identificacion</b> <a class="float-right">{{$cliente->identificacion}}</a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$cliente->email}}</a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Telefono</b> <a class="float-right">{{$cliente->telefono}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Empresa</b> <a class="float-right">{{$cliente->empresa }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nit</b> <a class="float-right">{{$cliente->nit }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo_sat</b> <a class="float-right">{{$cliente->tipo_sat }}</a>
                        </li>
                        
                    </ul>
                    
                </div>
            
            </div>
        </div>
        <div class="col-md-8">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th> 
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio venta</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    
                   {{-- @foreach ($category->products as $product )
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <x-image :item="$product" />    
                        </td>
                        <td>{{$product->nombre}}</td>
                        <td>{!! $product->precio !!}</td>
                        <td>{!! $product->stockLabel !!}</td>
                    </tr>  
                    @endforeach
                    --}}
                   
                </tbody>
            </table>    
        </div>
    </div>
</x-card>