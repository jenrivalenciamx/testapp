<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link"><i class="fas fa-store"></i> Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(route('sales.create')); ?>" class="nav-link"><i class="fas fa-cart-plus"></i>Crear venta</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('buscar');

$__html = app('livewire')->mount($__name, $__params, 'lw-3251441006-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?php echo e(auth()->user()->nombre); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <!-- User image -->
                <li class="user-header bg-lightblue">
                    <img src="<?php echo e(auth()->user()->imagen); ?>" class="img-circle elevation-2" alt="User Image">

                    <p>
                        <?php echo e(auth()->user()->nombre); ?>

                        <small><?php echo e(auth()->user()->perfil ? 'Administrador' : 'Vendedor'); ?></small>
                    </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?php echo e(route('users.show', auth()->user())); ?>" class="btn btn-default btn-flat">Perfil</a>
                    <a class="btn btn-default btn-flat float-right" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        Salir
                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
<?php /**PATH /var/www/html/laravel/testapp/resources/views/components/partials/navbar.blade.php ENDPATH**/ ?>