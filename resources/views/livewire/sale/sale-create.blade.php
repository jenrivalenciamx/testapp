<div>
    <x-card cardTitle="Crear venta">
       <x-slot:cardTools>
          <a href="{{route('sales.list')}}" class="btn btn-primary btn-sm mr-2">
            <i class="fas fa-cart-plus"></i> Ir a ventas 
          </a>

          <a href="#" class="btn btn-sm btn-danger" wire:click='clear'>
            <i class="fas fa-trash"></i> Cancelar venta 
          </a>
          
       </x-slot>

 
       <x-slot:cardFooter>
            
       </x-slot>

    </x-card>
    <div class="row">
      <div class="col-md-9">
        @livewire('sale.cliente')
     
   
  </div>
   
</div>
    <div class="row">
      <div class="col-md-6">
        @include('sales.list-products')
      </div>
      <div class="col-md-6">
        @include('sales.card-pago')
    </div>
    </div>
    <div class="row">
        <div class="col-md-9">
          @include('sales.card-details')
        </div>
       
     
    </div>
    