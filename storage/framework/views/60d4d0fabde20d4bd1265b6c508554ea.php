<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['modalTitle'=>'','modalId'=>'','modalSize'=>'']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['modalTitle'=>'','modalId'=>'','modalSize'=>'']); ?>
<?php foreach (array_filter((['modalTitle'=>'','modalId'=>'','modalSize'=>'']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div wire:ignore.self class="modal fade" id="<?php echo e($modalId); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog <?php echo e($modalSize); ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e($modalTitle); ?></h5>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="modal-body">
            <?php echo e($slot); ?>

        </div>
        
      </div>
    </div>
  </div>
  <?php /**PATH /var/www/testapp/resources/views/components/modal.blade.php ENDPATH**/ ?>