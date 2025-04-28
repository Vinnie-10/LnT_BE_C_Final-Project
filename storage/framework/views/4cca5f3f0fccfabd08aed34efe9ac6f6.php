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
        <?php echo $__env->yieldContent('content'); ?>
        <h1 class="text-center text-primary mb-4">Welcome Admin!</h1>

        <div class="d-flex justify-content-end mb-4">
            <a href="<?php echo e(route('add.products')); ?>" class="btn btn-primary">+ Add Product</a>
            <a href="<?php echo e(route('create.categories')); ?>" class="btn btn-primary ms-2">+ Create Category</a>
        </div>

        <div class="row justify-content-center g-4">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img style="height: 200px; object-fit: cover;" src="<?php echo e(asset('/storage/' . $p->image)); ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($p->name); ?></h5>
                                <p class="card-text"><?php echo e($p->category->name); ?></p>
                                <p class="card-text">Rp<?php echo e(number_format($p->price, 2, '.', ',')); ?></p>
                                <p class="card-text">Qty: <?php echo e($p->qty); ?></p>
                                <a href="<?php echo e(route('edit.product.page', $p->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('delete.product', $p->id)); ?>" method="POST" class="d-inline ms-2">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel\FinalProject\resources\views/adminpage.blade.php ENDPATH**/ ?>