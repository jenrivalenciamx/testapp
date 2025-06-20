<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-wallet"></i> Pagar y Crear Venta </h3>

        <div class="card-tools d-flex justify-content-center align-self-center">

            <span class="mr-2">Total: <b><?php echo e(number_format(\Cart::totalconimpuestosi(),2,'.',',')); ?></b></span>

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sale.currency',['total'=>$total]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3812461743-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            
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

                    <input type="number" wire:model.live="pago" class="form-control" id="pago"   min="<?php echo e(number_format(\Cart::totalconimpuestosi(),2,'.',',')); ?>">

                </div>
                <p> <?php echo e(numerosLetras($pago)); ?></p>
            </div>
            <div class="col-6">
                <label for="pago">Devuelve:</label>
                <div class="input-group ">

                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input type="number" wire:model.live="feria_cliente"  class="form-control" min="<?php echo e(number_format(0,2,'.',',')); ?>" readonly">


                </div>
                <p><?php echo e(numerosLetras($feria_cliente)); ?></p>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/testapp/resources/views/sales/card-pago.blade.php ENDPATH**/ ?>