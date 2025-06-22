
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-cart-plus"></i> Detalles venta <?php echo e($cliente); ?></h3>
        <div class="card-tools">
            <!-- Conteo de productos -->
            <i class="fas fa-tshirt" title="Numero productos"></i>
            <span class="badge badge-pill bg-purple"><?php echo e($cart->count()); ?> </span>
            <!-- Conteo de articulos -->
            <i class="fas fa-shopping-basket ml-2" title="Numero items"></i>
            <span class="badge badge-pill bg-purple"><?php echo e($totalArticulos); ?> </span>

            <!-- card-body 
            <button wire:click='createSale' class="btn bg-purple ml-2">
                <i class="fas fa-cart-plus"></i>
                Crear Venta
            </button>-->

        </div>
    </div>
<!-- card-body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-image"></i></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col" width="15%">Cantidad</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">Iva</th>
                        <th scope="col">Isr</th>
                        <th scope="col">Ret Iva</th>
                        <th scope="col">Sub total</th>
                        <th scope="col">...</th>
                    </tr>

                </thead>
                <tbody>
                
                   


                   <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   
                   
                    <tr>
                        <td><?php echo e($producto->id); ?></td>
                        <td>
                            <?php if (isset($component)) { $__componentOriginal22d447e3f5aafc93b8447b54b36ee789 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image','data' => ['item' => $producto->associatedModel,'size' => '60']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($producto->associatedModel),'size' => '60']); ?>
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
                        </td>
                        <td><?php echo e($producto->name); ?></td>
                        <td><?php echo $producto->associatedModel->precio; ?></td>
                        <td>
                            <!-- Botones para aumentar o disminuir la cantidad del producto en el carrito -->
                   
                            <button
                            wire:click='decrementar(<?php echo e($producto->id); ?>,<?php echo e($cliente); ?>)' 
                            class="btn btn-primary btn-xs" 
                            wire:loading.attr='disabled'
                            wire:target='decrementar'>
                                - 
                            </button>

                            <span class="mx-1"><?php echo e($producto->quantity); ?></span>

                            <button 
                            wire:click='incrementar(<?php echo e($producto->id); ?>,<?php echo e($cliente); ?>)'
                            class="btn btn-primary btn-xs"
                            wire:loading.attr='disabled'
                            wire:target='incrementar'
                            <?php echo e($producto->quantity >= $producto->associatedModel->stock ? 'disabled' : ''); ?> >
                                +
                            </button>
                            
                        </td>
                        
                        <td><?php echo e(number_format($producto->price*$producto->quantity,2,'.',',')); ?></td>
                        <td><?php echo e(number_format($producto->piva,2,'.',',')); ?></td>
                       
                        <td><?php echo e(number_format($producto->pisr,2,'.',',')); ?>

                        </td>
                        <td><?php echo e(number_format(0,2,'.',',')); ?></td>

                        
                        <td><?php echo e(number_format($producto->totalconimpuestos,2,'.',',')); ?></td>
                        <td>
                            <!-- Boton para eliminar el producto del carrito -->
                            <!--[if BLOCK]><![endif]--><?php if(!is_null($producto->id)): ?>
                            <button class="btn btn-danger btn-xs" title="Eliminar"
                            
                                wire:click='removerItem(<?php echo e($producto->id); ?>,<?php echo e($producto->quantity); ?>)'>
                                
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <?php else: ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>

                    </tr>
                    <tr>
                       
                        
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8">Sin Registros</td>
                    </tr>
                  
                       
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <tr>
                        <td colspan="4"></td>
                        <td>
                            <h5>Totales:</h5>
                        </td>
                        <td>
                            <h5>
                                <!--[if BLOCK]><![endif]--><?php if(isset($producto->id)): ?>
                                <span class="badge badge-pill badge-secondary" wire:click='removerItem(<?php echo e($producto->id); ?>,<?php echo e($producto->quantity); ?>)'>
                                   
                                    <?php echo e(number_format($subtotal_sin_impuestos,2,'.',',')); ?>

                                </span>
                               <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    <?php echo e(number_format(\Cart::totaliva(),2,'.',',')); ?>

                                </span>
                               
                            </h5>
                        </td>
                        <td>
                            <h5>
                               
                       
                                <!--[if BLOCK]><![endif]--><?php if(\Cart::totaliva() >0): ?> 
                               
                                <span class="badge badge-pill badge-secondary">
                                    
                                    <?php echo e(number_format(\Cart::totalisr(),2,'.',',')); ?>

                              
                                </span>
                                <?php else: ?>
                           
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                          
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    <?php echo e(number_format(Cart::totalivaret(),2,'.',',')); ?>

                                </span>
                               
                            </h5>
                        </td>
                        <td>
                            <h5>
                                <span class="badge badge-pill badge-secondary">
                                    <?php echo e(number_format(\Cart::totalconimpuestosi(),2,'.',',')); ?>

                                </span>
                               
                            </h5>                        </td>
                        <td></td>
                        
                    </tr>
                <tr>
                    <td colspan="10">
                        <strong>Total en letras:</strong>
                        <?php echo e(numerosLetras(\Cart::totalconimpuestosi())); ?>

                    </td>
                </tr>
                    
                </tbody>
            </table>
        </div>

    </div>
<!-- end-card-body -->
</div><?php /**PATH /var/www/html/laravel/testapp/resources/views/sales/card-details.blade.php ENDPATH**/ ?>