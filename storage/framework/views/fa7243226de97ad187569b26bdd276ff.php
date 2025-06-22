<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user"></i> Cliente: <span class="badge badge-secondary"> <?php echo e($nombreCte); ?></span>
             </h3>
            <div class="card-tools">
                <button wire:click="openModal" class="btn bg-purple btn-sm">Crear cliente</button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Seleccionar cliente:</label>

                <!--input group -->
                <div class="input-group" wire:ignore>
                  <div class="input-group-prepend" >
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                
                  <select wire:model.live='client' class="form-control" id="select2">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                      <option value="<?php echo e($client->id); ?>"><?php echo e($client->nombre); ?></option> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                  
                  </select>

                </div>
                <!-- /.input group -->
              </div>
        </div>
      </div>
    <!-- Modal Cliente -->
      <?php echo $__env->make('clientes.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <?php $__env->startSection('styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>
        <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
        <script>
          $("#select2").select2({
            theme:"bootstrap4"
          })

          $("#select2").on('change',function(){
           
            Livewire.dispatch('client_id',{id: $(this).val()})
          })
      
        </script> 
        
    <?php $__env->stopSection(); ?>  


</div><?php /**PATH /var/www/html/laravel/testapp/resources/views/livewire/sale/cliente.blade.php ENDPATH**/ ?>