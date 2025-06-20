
<x-modal modalId="modalClient" modalTitle="Clientes">
    <form wire:submit={{$Id==0 ? "store" : "update($Id)"}}>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="nombre">Nombre:</label>
                <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre" id="nombre">
                @error('nombre')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            
            <div class="form-group col-md-6">
                <label for="identificacion">Identificacion:</label>
                <input wire:model='identificacion' type="text" class="form-control" placeholder="identificacion" id="identificacion">
                @error('identificacion')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input wire:model='email' type="email" class="form-control" placeholder="Email" id="email">
                @error('email')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="telefono">Telefono:</label>
                <input wire:model='telefono' type="text" class="form-control" placeholder="Telefono" id="telefono">
                @error('telefono')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="empresa">Empresa:</label>
                <input wire:model='empresa' type="text" class="form-control" placeholder="Empresa" id="empresa">
                @error('empresa')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="nit">Nit:</label>
                <input wire:model='nit' type="text" class="form-control" placeholder="Nit" id="nit">
                @error('nit')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

           
            <div class="form-group col-6">
                <label for="tipo_sat">Tipo_Persona:</label>
               
                <select class="form-control" id="tipo_sat">               
                    @if($Id !=null)
                        <option value="1" {{ ( $cliente->tipo_sat  == '1') ? 'selected' : '' }}>Fisica</option>
                        <option value="2" {{ ( $cliente->tipo_sat  == '2') ? 'selected' : '' }}>Moral</option>
                    @else    
                        <option value="1">Fisica</option>
                        <option value="2">Moral</option>
                    @endif
                
                 </select>
                @error('tipo_sat')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            
        </div>
        
        <hr>
        <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>    
    </form>
 </x-modal>
