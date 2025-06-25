<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['title' => 'Ver venta']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Ver venta']); ?>
     <?php $__env->slot('cardTools', null, []); ?> 

        <a href="<?php echo e(route('sales.list')); ?>" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>


     <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Cliente</h5>
                <div class="card-body">
                    
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center" style="font-size: 4rem">
                                <i class="fas fa-user-circle"></i>
                            </div>

                            <h3 class="profile-username text-center my-3"></h3>

                            <ul class="list-group  mb-3">
                                <li class="list-group-item">
                                    <b>Documento</b>
                                    <a class="float-right">
                                        <?php echo e($venta->clientes->nombre); ?>

                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Telefono</b>
                                    <a class="float-right">
                                        <?php echo e($venta->clientes->telefono); ?>

                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b>
                                    <a class="float-right">
                                        <?php echo e($venta->clientes->email); ?>

                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Empresa</b>
                                    <a class="float-right">
                                        <?php echo e($venta->clientes->empresa); ?>

                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>NIT</b> <a class="float-right">
                                        <?php echo e($venta->clientes->nit); ?>

                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Creado</b>
                                    <a class="float-right">
                                        <?php echo e($venta->clientes->created_at); ?>

                                    </a>
                                </li>
                            </ul>

                            <a href="<?php echo e(route('clients.show', $venta->clientes)); ?>"
                                class="btn btn-primary btn-block"><b>Ver</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Factura: <b>FV-<?php echo e($venta->id); ?></b> </h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <i class="fas fa-tshirt" title="Numero productos"></i>
                        <span class="badge badge-pill badge-primary mr-2">
                            <?php echo e($venta->items->count()); ?>

                        </span>
                        <i class="fas fa-shopping-basket" title="Numero items"></i>
                        <span class="badge badge-pill badge-primary mr-2">
                            <?php echo e($venta->items->sum('cantidad')); ?>

                        </span>
                        <i class="fas fa-clock" title="Fecha y hora de creacion"></i>
                        <?php echo e($venta->clientes->created_at); ?>

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-striped text-center">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><i class="fas fa-image"></i></th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">P. Venta</th>

                                    <th scope="col" width="15%">Qty</th>
                                    <th scope="col">Impuestos</th>
                                    <th scope="col">Sub total</th>

                                </tr>

                            </thead>
                            <tbody>

                                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $venta->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th scope="row"><?php echo e(++$loop->index); ?></th>
                                        <td>


                                            <?php if (isset($component)) { $__componentOriginal22d447e3f5aafc93b8447b54b36ee789 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image','data' => ['item' => $product = App\Models\productos::find($producto->productos_id),'size' => '50','float' => 'float-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product = App\Models\productos::find($producto->productos_id)),'size' => '50','float' => 'float-center']); ?>
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
                                        <td>
                                            <?php echo e($producto->productos->nombre); ?>

                                        </td>
                                        <td><?php echo e(money($producto->precio)); ?></td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">
                                                <?php echo e($producto->cantidad); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e(number_format($producto->iva - $producto->isr, 2)); ?></td>



                                        <td>
                                            <?php echo e(number_format($producto->subtotal, 2)); ?>

                                        </td>


                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                    <tr>
                                        <td colspan="10">Sin Registros</td>
                                    </tr>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                        <h5>Total:</h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <span class="badge badge-pill badge-secondary">
                                                <?php echo e(number_format($venta->total, 2)); ?>

                                            </span>
                                        </h5>
                                    </td>

                                </tr>
                                <tr>

                                    <td colspan="7">
                                        <strong>Total en letras:</strong>
                                        <?php echo e(numerosLetras($venta->total)); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Vendedor</h3>
                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover table-sm table-striped text-center">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><i class="fas fa-image"></i></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Perfil</th>
                                <th scope="col">Email</th>
                                <th scope="col">...</th>

                            </tr>

                        </thead>
                        <tbody>

                            <tr>

                                <th scope="row"><?php echo e(userID()); ?></th>
                                <td>

                                    <?php if (isset($component)) { $__componentOriginal22d447e3f5aafc93b8447b54b36ee789 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image','data' => ['item' => App\Models\User::find(userID())]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(App\Models\User::find(userID()))]); ?>
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


                                <td><?php echo e($venta->user->nombre); ?></td>
                                <td><?php echo e($venta->user->admin ? 'Administrador' : 'Vendedor'); ?></td>

                                <td><?php echo e($venta->user->email); ?></td>
                                <td>
                                    <a href="<?php echo e(route('users.show', $venta->user)); ?>">
                                        <span class="badge badge-pill badge-primary">
                                            <i class="far fa-eye"></i>
                                        </span>

                                    </a>
                                </td>


                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>
    </div>


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
<?php /**PATH /var/www/html/laravel/testapp/resources/views/livewire/sale/sale-show.blade.php ENDPATH**/ ?>