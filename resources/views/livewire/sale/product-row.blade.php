<tr>
    <td>{{$producto->id}}</td>
    <td>
        <x-image :item="$producto" size="60"/>
    </td>
    <td>{{$producto->nombre}}</td>
    <td>{!!$producto->precio!!}</td>
    <td>{!!$stockLabel!!}</td> 
    <td>
        
        <button
            wire:click="addProducto({{$producto->id}})"
            class="btn btn-primary btn-sm"
            wire:loading.attr='disabled'
            wire:target='addProducto'
            title="Agregar">
            <i class="fas fa-plus-circle"></i>
        </button>
    </td>    

</tr>