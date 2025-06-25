<div>
    <?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['cardTitle' => 'Listado ventas ('.e($this->totalRegistros).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cardTitle' => 'Listado ventas ('.e($this->totalRegistros).')']); ?>
         <?php $__env->slot('cardTools', null, []); ?> 
            <div class="d-flex align-items-center">

                <span class="badge badge-info" style="font-size:1.2rem">
                    Total: <?php echo e(money($this->totalVentas)); ?>

                </span>
                <div class="mx-3">

                    <button class="btn btn-default" id="daterange-btn" wire:ignore>
                        <i class="far fa-calendar-alt"></i>
                        <span>
                            D-M-A - D-M-A
                        </span>
                        <i class="far fa-caret-down"></i>
                    </button>
                </div>
                <a href="<?php echo e(route('sales.create')); ?>" class="btn btn-primary">
                    <i class="fa-solid fa-cart-plus"></i> Crear venta
                </a>
            </div>
         <?php $__env->endSlot(); ?>

        <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('thead', null, []); ?> 
                <th>ID</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Productos</th>
                <th>Articulos</th>
                <th>Fecha</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>
                <th width="3%">...</th>

             <?php $__env->endSlot(); ?>

            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <span class="badge badge-primary">
                            FV-<?php echo e($venta->id); ?>

                        </span>
                    </td>
                    <td><?php echo e($venta->clientes->nombre); ?></td>



                    <td>
                        <span class="badge badge-secondary">
                            <?php echo e(number_format($venta->total, 2)); ?>

                        </span>
                    </td>

                    <td>
                        <span class="badge badge-pill bg-purple">
                            <?php echo e($venta->items->count()); ?>

                        </span>

                    </td>
                    <td>
                        <span class="badge badge-pill bg-purple">
                            <?php echo e($venta->items->sum('cantidad')); ?>

                        </span>
                    </td>
                    <td><?php echo e($venta->fecha); ?></td>
                    <td>
                        <a href="<?php echo e(route('sales.invoice', $venta)); ?>" class="btn bg-navy btn-sm" title="Generar PDF"
                            target="_blank">
                            <i class="far fa-file-pdf"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('sales.show', $venta)); ?>" class="btn bg-navy btn-sm" title="Ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit(<?php echo e($venta->id); ?>)' class="btn btn-primary btn-sm"
                            title="Editar">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete',{id: <?php echo e($venta->id); ?>, eventName:'destroySale'})"
                            class="btn btn-danger btn-sm" title="Eliminar">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr class="text-center">
                    <td colspan="10">Sin registros</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>

         <?php $__env->slot('cardFooter', null, []); ?> 
            <?php echo e($ventas->links()); ?>


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
    <?php $__env->startSection('styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>
        <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>

        <script>
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Default': [moment().startOf('year'), moment()],
                        'Hoy': [moment(), moment()],
                        'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                        'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                        'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                        'Ultimos Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                            'month')]
                    },
                    startDate: moment().startOf('year'),
                    endDate: moment()
                },
                function(start, end) {
                    dateStart = start.format('YYYY-MM-DD');
                    dateEnd = end.format('YYYY-MM-DD');
                    $('#daterange-btn span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));

                    Livewire.dispatch('setDates', {
                        fechaInicio: dateStart,
                        fechaFinal: dateEnd
                    });


                }

            );
        </script>
    <?php $__env->stopSection(); ?>


</div>
<?php /**PATH /var/www/html/laravel/testapp/resources/views/livewire/sale/salelist.blade.php ENDPATH**/ ?>