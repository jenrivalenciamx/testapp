<div>
    <form>
      <div class="input-group">
          <input wire:model.live='buscar' type="search" class="form-control" placeholder="Buscar Producto...">
          <div class="input-group-append">
              <button class="btn btn-default" wire:click.prevent>
                  <i class="fa fa-search"></i>
              </button>
          </div>
      </div>
  </form>
  <ul class="list-group" id="list-search">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <h5>
                    <a href="<?php echo e(route('products.show',$product)); ?>" class="text-white">
                    <?php if (isset($component)) { $__componentOriginal22d447e3f5aafc93b8447b54b36ee789 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image','data' => ['item' => $product,'size' => '50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'size' => '50']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22d447e3f5aafc93b8447b54b36ee789)): ?>
<?php $attributes = $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789; ?>
<?php unset($__attributesOriginal22d447e3f5aafc93b8447b54b36ee789); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22d447e3f5aafc93b8447b54b36ee789)): ?>
<?php $component = $__componentOriginal22d447e3f5aafc93b8447b54b36ee789; ?>
<?php unset($__componentOriginal22d447e3f5aafc93b8447b54b36ee789); ?>
<?php endif; ?>
                    <?php echo e($product->nombre); ?>

                </h5>
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        Precio venta:
                        <span class="badge badge-pill badge-info">
                            <?php echo $product->stockLabel; ?>

                        </span>
                    </div>
                    <div>
                        Stock: <?php echo $product->stockLabel; ?>

                        
                    </div>
                    
                </div>
                
            </li> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        
  </ul>
</div><?php /**PATH /var/www/html/laravel/testapp/resources/views/livewire/buscar.blade.php ENDPATH**/ ?>