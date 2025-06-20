<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['cardTitle'=>'','cardTools'=>'','cardFooter'=>'']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['cardTitle'=>'','cardTools'=>'','cardFooter'=>'']); ?>
<?php foreach (array_filter((['cardTitle'=>'','cardTools'=>'','cardFooter'=>'']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo e($cardTitle); ?></h3>
        <div class="card-tools">
            <?php echo e($cardTools); ?>

        </div>
    </div>
    <div class="card-body">
        <?php echo e($slot); ?>

    </div>
    <div class="card-footer">
        <div class="float-right">
            <?php echo e($cardFooter); ?>

        </div>
        
    </div>
</div><?php /**PATH /var/www/testapp/resources/views/components/card.blade.php ENDPATH**/ ?>