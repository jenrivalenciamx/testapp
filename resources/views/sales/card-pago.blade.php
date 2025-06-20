<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-wallet"></i> Pagar y Crear Venta </h3>

        <div class="card-tools d-flex justify-content-center align-self-center">

            <span class="mr-2">Total: <b>{{number_format(\Cart::totalconimpuestosi(),2,'.',',')}}</b></span>

            @livewire('sale.currency',['total'=>$total])
            
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <label for="pago">Pago:</label>
                <div class="input-group ">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>

                    <input type="number" wire:model.live="pago" class="form-control" id="pago"   min="{{number_format(\Cart::totalconimpuestosi(),2,'.',',')}}">

                </div>
                <p> {{numerosLetras($pago)}}</p>
            </div>
            <div class="col-6">
                <label for="pago">Devuelve:</label>
                <div class="input-group ">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input type="number" wire:model.live="feria_cliente"  class="form-control" min="{{number_format(0,2,'.',',')}}" readonly">


                </div>
                <p>{{numerosLetras($feria_cliente)}}</p>
            </div>
        </div>
    </div>
</div>