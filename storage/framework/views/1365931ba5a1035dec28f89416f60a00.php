<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4">Welcome User!</h1>

        <div class="d-flex justify-content-end mb-4">
            <a href="<?php echo e(route('view.basket')); ?>" class="btn btn-primary">🛒See Basket</a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="row justify-content-center g-4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img img style="height: 200px; object-fit: cover;" src="<?php echo e(asset('/storage/' . $p->image)); ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($p->name); ?></h5>
                            <p class="card-text"><?php echo e($p->category->name); ?></p>
                            <p class="card-text">Rp<?php echo e($p->price); ?></p>
                            <p class="card-text">Stock Left: <?php echo e($p->qty); ?></p>
                            <?php if($p->qty == 0): ?>
                                <div class="alert alert-danger">
                                    The product is currently unavailable.
                                </div>
                            <?php else: ?>
                                <form action="<?php echo e(route('add.basket', ['id' => $p->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($p->id); ?>">
                                    <button type="submit" class="btn btn-primary w-100">🛒Basket</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel\FinalProject\resources\views/userpage.blade.php ENDPATH**/ ?>