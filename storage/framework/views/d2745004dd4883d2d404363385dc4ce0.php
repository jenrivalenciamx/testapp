<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['item'=>null,'size'=>70, 'float'=>'']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['item'=>null,'size'=>70, 'float'=>'']); ?>
<?php foreach (array_filter((['item'=>null,'size'=>70, 'float'=>'']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<img src="<?php echo e($item->imagenes ? url('storage/'.$item->imagenes->url): asset('no-image.png')); ?>" class="rounded <?php echo e($float); ?>" width='<?php echo e($size); ?>'>


<?php /**PATH /var/www/html/laravel/testapp/resources/views/components/image.blade.php ENDPATH**/ ?>