<?php if (isset($component)) { $__componentOriginal53747ceb358d30c0105769f8471417f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53747ceb358d30c0105769f8471417f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => ['cardTitle' => 'Detalles producto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['cardTitle' => 'Detalles producto']); ?>
     <?php $__env->slot('cardTools', null, []); ?> 
       <a href="<?php echo e(route('products')); ?>" class="btn btn-primary">
        <i class="fas fa-hand-point-left"></i>Regresar
 
       </a>  
     <?php $__env->endSlot(); ?>
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-5">
              <div class="col-12">
                <img src="<?php echo e($product->imagen); ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb">
                  
                </div>
              </div>

            </div>
            <div class="col-12 col-sm-7">
              <h3 class="my-3"><?php echo e($product->nombre); ?></h3>
              <p><?php echo e($product->descripcion); ?></p>

              <hr>

              <div class="row">
                <!-- Caja stock -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-box-open"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Stock</span>
                      <span class="info-box-number"><?php echo $product->stockLabel; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja stock minimo-->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-box-open"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Stock minimo</span>
                      <span class="info-box-number"><span class="badge badge-success"><?php echo e($product->stock_minimo); ?></span> </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja categoria -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-th-large"></i>
                    </span>
                    <div class="info-box-content">

                      <span class="info-box-text">Categoria</span>
                      <span class="info-box-number"><?php echo e($product->categorias->nombre); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja estado -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-toggle-on"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Estado</span>
                      <span class="info-box-number"><?php echo $product->activoLabel; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja codigo barras -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-barcode"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Codigo barras</span>
                      <span class="info-box-number"><?php echo e($product->codigo_barras); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja fecha vencimiento -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-calendar-times"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Fecha vencimiento</span>
                      <span class="info-box-number"><?php echo e($product->fecha_vencimiento); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

                <!-- Caja fecha creacion -->
                <div class="col-md-6">
                  <div class="info-box">
                    <span class="info-box-icon bg-info">
                      <i class="fas fa-calendar-plus"></i>
                    </span>
                    <div class="info-box-content">
                      <span class="info-box-text">Fecha creacion</span>
                      <span class="info-box-number"><?php echo e($product->created_at); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>

              </div>

            <div class="row">
              <div class="bg-lightblue py-2 px-3 mt-4 col-md-6">
                <h2 class="mb-0">
                    <?php echo $product->precio; ?>

                </h2>
                <h4 class="mt-0">
                  <small>Precio venta </small>
                </h4>
              </div>
              <div class="bg-gray py-2 px-3 mt-4 col-md-6">
                <h2 class="mb-0">
                    $<?php echo $product->precio_compra; ?>

                </h2>
                <h4 class="mt-0">
                  <small>Precio compra</small>
                </h4>
              </div>
            </div>

            </div>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->    
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $attributes = $__attributesOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__attributesOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53747ceb358d30c0105769f8471417f6)): ?>
<?php $component = $__componentOriginal53747ceb358d30c0105769f8471417f6; ?>
<?php unset($__componentOriginal53747ceb358d30c0105769f8471417f6); ?>
<?php endif; ?><?php /**PATH /var/www/testapp/resources/views/livewire/product/product-show.blade.php ENDPATH**/ ?>