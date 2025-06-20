<x-modal modalId="modalProduct" modalTitle="Productos" modalSize="modal-lg">
    <form wire:submit={{$Id==0 ? "store" :"update($Id)"}} >
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="name">Nombre:</label>
                <input wire:model='nombre' type="text" class="form-control" placeholder="nombre producto" id="name">
                @error('nombre')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group col-md-5">
                <label for="categoria_id">Categoria:</label>
                <select wire:model="categoria_id" id="categoria_id" class="form-control">
                    <option value="0">Seleccionar</option>
                    @foreach ($this->categorias as $categoria )
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>   
                    @endforeach 
                    
                </select>
                
                @error('categoria_id')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="descripcion">Descripcion:</label>
                <textarea wire:model='descripcion' id="descripcion" class="form-control" rows="3">

                </textarea>
                
                @error('descripcion')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="precio_compra">Precio Compra:</label>
                <input wire:model='precio_compra' min="0" step="any" type="number" class="form-control" placeholder="precio de compra" id="precio_compra">
                @error('precio_compra')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="precio_venta">Precio Venta:</label>
                <input wire:model='precio_venta' min="0" step="any" type="number" class="form-control" placeholder="precio de venta" id="precio_venta">
                @error('precio_venta')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="codigo_barras">Codigo Barras:</label>
                <input wire:model='codigo_barras' type="text" class="form-control" placeholder="codigo de barras" id="codigo_barras">
                @error('codigo_barras')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="stock">Stock:</label>
                <input wire:model='stock' min="0"  type="number" class="form-control" placeholder="stock del producto" id="stock">
                @error('stock')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="stock_minimo">Stock minimo:</label>
                <input wire:model='stock_minimo' min="0"  type="number" class="form-control" placeholder="stock minimo" id="stock_minimo">
                @error('stock_minimo')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
       
            <div class="form-group col-md-4">
                <label for="fecha_vencimiento">Stock minimo:</label>
                <input wire:model='fecha_vencimiento' type="date" class="form-control" id="fecha_vencimiento">
                @error('fecha_vencimiento')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <div class="icheck-primary">
                    <input wire:model="activo" type="checkbox" id="">
                    <label for="activo"> Activo</label>
                </div>
               
                @error('activo')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="imagen">Imagen</label>
                <input wire:model="imagen" type="file" id="imagen" accept="image/">
                @error('imagen')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                @if($Id>0)
                    <x-image :item="$product=App\Models\Productos::find($Id)" size="200" float="float-right"/>
                   
                @endif   
                @if($this->imagen)
                    <img src="{{$imagen->temporaryUrl()}}" class="rounded float-right" width="200">
                @endif    
            </div>
        </div>
        <button wire:loading.attr='disabled' class="btn btn-primary float-right">{{$Id==0 ? 'Guardar':'Editar' }}</button>
    </form>
</x-modal > 