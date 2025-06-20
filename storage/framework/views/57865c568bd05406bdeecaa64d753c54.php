<div>
    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['cardTitle' => 'Crear venta']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cardTitle' => 'Crear venta']); ?>
        <?php $__env->slot('cardTools', null, []); ?> 
          <a href="<?php echo e(route('sales.list')); ?>" class="btn btn-primary btn-sm mr-2">
            <i class="fas fa-cart-plus"></i> Ir a ventas 
          </a>

          <a href="#" class="btn btn-sm btn-danger" wire:click='clear'>
            <i class="fas fa-trash"></i> Cancelar venta 
          </a>
          
        <?php $__env->endSlot(); ?>

 
        <?php $__env->slot('cardFooter', null, []); ?> 
            
        <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
    <div class="row">
      <div class="col-md-9">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sale.cliente');

$__html = app('livewire')->mount($__name, $__params, 'lw-3344872479-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
     
   
  </div>
   
</div>
    <div class="row">
      <div class="col-md-6">
        <?php echo $__env->make('sales.list-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <div class="col-md-6">
        <?php echo $__env->make('sales.card-pago', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>
    <div class="row">
        <div class="col-md-9">
          <?php echo $__env->make('sales.card-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
       
     
    </div>
    <?php /**PATH /var/www/testapp/resources/views/livewire/sale/sale-create.blade.php ENDPATH**/ ?>