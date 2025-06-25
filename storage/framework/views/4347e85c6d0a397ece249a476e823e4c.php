<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura Venta</title>
    <style>
        .b {
            border: 1px solid black;

        }

        .shop-info {
            display: block;
            padding: 3px;
            font-size: 12.5px;
        }

        .factura-id {
            font-size: 1.5rem;
            font-style: normal;
            color: #525659;
        }

        .factura-fecha {
            font-size: 1rem;
            font-style: normal;
            color: #525659;
        }

        .productos {
            text-align: center;
            margin-top: 1rem;
        }

        .productos thead {
            background-color: #525659ab;
            color: white;
        }

        .productos tr:nth-child(even) {
            background-color: #ddd;
        }

        th,
        td {
            padding: 10px;
        }

        .badge {
            background-color: #5256598d;
            color: white;
            padding: 3px;
            border-radius: 100%;
            font-weight: 500;
            width: 10px;
            margin: 0 auto;



        }
    </style>
</head>

<body>
    <table class="" width="100%">
        <tr>

            <td width=25%>



                <?php if (isset($component)) { $__componentOriginal22d447e3f5aafc93b8447b54b36ee789 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22d447e3f5aafc93b8447b54b36ee789 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image','data' => ['item' => $shop = App\Models\Shop::find(1),'size' => '200','float' => 'float-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($shop = App\Models\Shop::find(1)),'size' => '200','float' => 'float-right']); ?>
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
            <td width=50% style="text-align:center ">
                <h1><?php echo e($shop->nombre); ?></h1>
                <?php if($shop->slogan): ?>
                    <p><?php echo e($shop->slogan); ?></p>
                <?php endif; ?>
            </td>
            <td width=25%>
                <?php if($shop->telefono): ?>
                    <span class="shop-info">
                        <b>Telefono: </b><?php echo e($shop->telefono); ?>

                    </span>
                <?php endif; ?>
                <?php if($shop->email): ?>
                    <span class="shop-info">
                        <b>Email: </b><?php echo e($shop->email); ?>

                    </span>
                <?php endif; ?>
                <?php if($shop->direccion): ?>
                    <span class="shop-info">
                        <b>Direccion: </b><?php echo e($shop->direccion); ?>

                    </span>
                <?php endif; ?>
                <?php if($shop->ciudad): ?>
                    <span class="shop-info">
                        <b>Ciudad: </b><?php echo e($shop->ciudad); ?>

                    </span>
                <?php endif; ?>


            </td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width=33%>
                <h2 style="margin-bottom: .5rem">Cliente:</h2>

                <?php if($sale->clientes->nombre): ?>
                    <span class="shop-info">
                        <b>Nombre: </b><?php echo e($sale->clientes->nombre); ?>

                    </span>
                <?php endif; ?>

                <?php if($sale->clientes->identificacion): ?>
                    <span class="shop-info">
                        <b>Identificacion: </b><?php echo e($sale->clientes->identificacion); ?>

                    </span>
                <?php endif; ?>

                <?php if($sale->clientes->telefono): ?>
                    <span class="shop-info">
                        <b>Telefono: </b><?php echo e($sale->clientes->telefono); ?>

                    </span>
                <?php endif; ?>

                <?php if($sale->clientes->email): ?>
                    <span class="shop-info">
                        <b>Email: </b><?php echo e($sale->clientes->email); ?>

                    </span>
                <?php endif; ?>

                <?php if($sale->clientes->empresa): ?>
                    <span class="shop-info">
                        <b>Empresa: </b><?php echo e($sale->clientes->empresa); ?>

                    </span>
                <?php endif; ?>

                <?php if($sale->clientes->nit): ?>
                    <span class="shop-info">
                        <b>Nit: </b><?php echo e($sale->clientes->nit); ?>

                    </span>
                <?php endif; ?>
            </td>
            <td width="33%">
                <h2 style="text-align: center">
                    Factura: <span class="factura-id">FV-<?php echo e($sale->id); ?></span>
                </h2>
            </td>
            <td width="33%">
                <h3>
                    Fecha: <span class="factura-fecha"><?php echo e($sale->created_at); ?></span>
                </h3>
            </td>
        </tr>
    </table>
    <table width="100%" class="productos">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th style="text-align: center">Cantidad</th>
            <th>Subtotal</th>
            <th>Iva</th>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $sale->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e(++$loop->index); ?></td>
                    <td><?php echo e($item->nombre); ?></td>
                    <td><?php echo e(money($item->precio)); ?></td>
                    <td>
                        <div class="badge">
                            <?php echo e($item->cantidad); ?>

                        </div>
                    </td>
                    <td>
                        <?php echo e(money($item->precio * $item->cantidad)); ?>

                    </td>
                    <td>

                        <?php echo e(money($item->iva)); ?>

                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6">Sin registros</td>

                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="4"></td>
                <td>Total:</td>
                <td>
                    <b><?php echo e(money($sale->total)); ?></b>
                </td>
            </tr>
        </tbody>

    </table>
    <table width="100%" style="text-align: center; margin-top:5rem;">
        <tr>
            <td>
                ___________________________ <br>
                <b><?php echo e($sale->user->nombre); ?></b> <br>
                Vendedor
            </td>
        </tr>

    </table>

    <p style="text-align: center">Muchas gracias por tu compra!</p>



</body>

</html>
<?php /**PATH /var/www/html/laravel/testapp/resources/views/sales/invoice.blade.php ENDPATH**/ ?>