<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['cardTitle' => 'Detalles cliente']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cardTitle' => 'Detalles cliente']); ?>
     <?php $__env->slot('cardTools', null, []); ?> 
       <a href="<?php echo e(route('clients')); ?>" class="btn btn-primary">
        <i class="fas fa-hand-point-left"></i>Regresar
 
       </a>  
     <?php $__env->endSlot(); ?>    
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
               

                    <h2 class="profile-username text-center"><?php echo e($cliente->nombre); ?></h2>
                    
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Identificacion</b> <a class="float-right"><?php echo e($cliente->identificacion); ?></a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right"><?php echo e($cliente->email); ?></a>
                        </li>
                        
                        <li class="list-group-item">
                            <b>Telefono</b> <a class="float-right"><?php echo e($cliente->telefono); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Empresa</b> <a class="float-right"><?php echo e($cliente->empresa); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Nit</b> <a class="float-right"><?php echo e($cliente->nit); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo_sat</b> <a class="float-right"><?php echo e($cliente->tipo_sat); ?></a>
                        </li>
                        
                    </ul>
                    
                </div>
            
            </div>
        </div>
        <div class="col-md-8">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th> 
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio venta</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    
                   
                   
                </tbody>
            </table>    
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?><?php /**PATH /var/www/testapp/resources/views/livewire/client/client-show.blade.php ENDPATH**/ ?>