<div>
    <button wire:click="openModal" class="btn bg-purple btn-xs">
        <i class="far fa-keyboard"></i>
    </button>
        
        <!-- Modal moneda -->
        <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['modalId' => 'modalCurrency','modalTitle' => 'Pago','style' => 'color: black !importan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['modalId' => 'modalCurrency','modalTitle' => 'Pago','style' => 'color: black !importan']); ?>
        <div class="d-flex justify-content-center align-items-center flex-wrap">
      
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->valores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button wire:click="setPago(<?php echo e($valor); ?>)" type="button" class="btn btn-success m-1" <?php echo e($valor <=$total ? 'disabled': ''); ?>>
                    <?php echo e(number_format($valor,2,'.','')); ?>

                </button>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
           

            <button wire:click="setPago(<?php echo e(\Cart::totalconimpuestosi()); ?>)" type="button" class="btn btn-success m-1">Exacto</button>

        </div>
    
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
        
</div><?php /**PATH /var/www/testapp/resources/views/livewire/sale/currency.blade.php ENDPATH**/ ?>