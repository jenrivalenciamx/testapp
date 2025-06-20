<div>
    <x-card cardTitle="Listado usuarios ({{$this->totalRegistros}})">
       <x-slot:cardTools>
          <a href="#" class="btn btn-primary" wire:click='create'>
            <i class="fas fa-plus-circle"></i> Crear Usuario
          </a>
       </x-slot>

       <x-table>
          <x-slot:thead>
             <th>ID</th>
             <th>Imagen</th>
             <th>Nombre</th>
             <th>Email</th>
             <th>Perfil</th>
             <th>Estado</th>
             <th width="3%">...</th>
             <th width="3%">...</th>
             <th width="3%">...</th>
 
          </x-slot>

          @forelse ($users as $user)
         
             <tr>
                <td>{{$user->id}}</td>
                <td>
                    <x-image :item="$user" />    
                </td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->admin ? 'Administrador' : 'Vendedor'}}</td>
                <td>{!!$user->activoLabel!!}</td>
                
                <td>
                    <a href="{{route('users.show',$user)}}" class="btn btn-success btn-sm" title="Ver">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="#" wire:click='edit({{$user->id}})' class="btn btn-primary btn-sm" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a wire:click="$dispatch('delete',{id: {{$user->id}}, eventName:'destroyUser'})" class="btn btn-danger btn-sm" title="Eliminar">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
             </tr>

             @empty

             <tr class="text-center">
                <td colspan="9">Sin registros</td>
             </tr>
              
             @endforelse
 
       </x-table>
 
       <x-slot:cardFooter>
            {{$users->links()}}

       </x-slot>
    </x-card>


 <x-modal modalId="modalUser" modalTitle="Usuarios">
    <form wire:submit={{$Id==0 ? "store" : "update($Id)"}}>
        <div class="form-row">
            <div class="form-group col-12 col-md-6">
                <label for="nombre">Nombre:</label>
                <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre" id="nombre">
                @error('nombre')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="email">Email:</label>
                <input wire:model='email' type="text" class="form-control" placeholder="Email" id="email">
                @error('email')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="password">Password:</label>
                <input wire:model='password' type="password" class="form-control" placeholder="Password" id="password">
                @error('password')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="re_password">Repetir Password:</label>
                <input wire:model='re_password' type="password" class="form-control" placeholder="Repetir Password" id="re_password">
                @error('re_password')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group form-check col-md-6">
                <div class="icheck-primary">
                    <input wire:model='admin' type="checkbox" id="admin">
                    <label class="form-checklabel" for="admin">es administrador ?</label>
                </div>

            </div>
            <div class="form-group form-check">
                <div class="icheck-primary">
                    <input wire:model='activo' type="checkbox" id="activo">
                    <label class="form-checklabel" for="activo">esta activo ?</label>
                </div>

            </div>
            <div class="form-group form-check">
                <div class="icheck-primary">
                    <input wire:model='tipo_sat' type="checkbox" id="tipo_sat">
                    <label class="form-checklabel" for="tipo_sat">Persona Fisica ?</label>
                </div>

            </div>
            <div class="form-group col-md-12">
                <label for="imagen">Imagen:</label><br>
                <input wire:model='imagen' type="file" id="imagen" accept="image/*">
 
            </div>
            <div class="form-group col-md-12">
                @if($Id>0)
                    <x-image :item="$user=App\Models\User::find($Id)" size="200" float="float-right"/>
               
                @endif 
                @if($this->imagen)
                    <img src="{{$imagen->temporaryUrl()}}" class="rounded float-left" width="200">
                @endif
            </div>      
        </div>
        
        <hr>
        <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>    
    </form>
 </x-modal>

</div>