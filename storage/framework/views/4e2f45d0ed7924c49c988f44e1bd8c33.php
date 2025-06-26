<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <b>Productos mas vendidos hoy</b>
                </h3>
                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio.vt</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $productosMasVendidosHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($product->id); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($product->url)); ?>" width="50px" class="img-fluid rounded">


                                    </td>
                                    <td><?php echo e($product->nombre_producto); ?></td>
                                    <td><?php echo e(money($product->precio_venta)); ?></td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php echo e($product->total_vendido); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php echo e(money($product->precio_venta * $product->total_vendido)); ?>

                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="10">
                                        Sin registros
                                    </td>
                                </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
    <!-- /.col-md-6 -->
    <!--.col-md-6 -->

</div>
<?php /**PATH /var/www/html/laravel/testapp/resources/views/home/tables-reports.blade.php ENDPATH**/ ?>