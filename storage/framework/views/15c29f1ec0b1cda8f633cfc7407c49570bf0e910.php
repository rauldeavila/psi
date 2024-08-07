<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name', 'CEFUS - 14122 - Raul')); ?></title>

    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.mask.min.js')); ?>"></script>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moderna:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="header-content">
                <div class="header-left">
                    <img src="<?php echo e(asset('images/x_caixa.png')); ?>" alt="X Caixa" class="header-logo">
                    <span class="header-title">
                        <strong>CEFUS</strong> PSI 14122 - Raul de Avila Jr.
                    </span>
                </div>
                <nav class="header-nav">
                    <a href="<?php echo e(route('consulta.index')); ?>">Consulta</a>
                    <a href="<?php echo e(route('cadastro.create')); ?>">Cadastro</a>
                </nav>
            </div>
        </header>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    <?php echo $__env->yieldContent('scripts'); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\c128550\2057-cefus\resources\views/layouts/app.blade.php ENDPATH**/ ?>