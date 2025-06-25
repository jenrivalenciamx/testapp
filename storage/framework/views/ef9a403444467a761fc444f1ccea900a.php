<div>
    <!--[if BLOCK]><![endif]--><?php if(session()->has('msg')): ?>
        <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible fade show" role="alert">
            <strong>Mensaje!</strong> <?php echo e(session('msg')); ?>

            <?php if(session()->has('sale')): ?>
                <a href="<?php echo e(route('sales.invoice', session('sale'))); ?>" target="_blank">
                    <i class="far fa-file-pdf"></i> </a>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /var/www/html/laravel/testapp/resources/views/livewire/messages.blade.php ENDPATH**/ ?>