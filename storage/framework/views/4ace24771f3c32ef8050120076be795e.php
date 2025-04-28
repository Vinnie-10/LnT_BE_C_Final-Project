<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column justify-content-center align-items-center py-5">
    <h1 class="text-center mb-4">🛒Your Basket</h1>
    <div class="form-container">
        <div class="card p-5">

            <?php
                $basket = session('basket');
                if (!is_array($basket)) {
                    $basket = [];
                }
            ?>

            <?php if(empty($basket)): ?>
                <p class="text-center">Your basket is empty.</p>
            <?php else: ?>
                <?php $__currentLoopData = $basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if (!is_array($product) || !isset($product['name'], $product['price'], $product['quantity'], $product['image'])) {
                        continue;
                    }
                ?>

                <div class="d-flex align-items-center" style="border-bottom: 1px solid black; padding-bottom: 10px;">
                    <img src="<?php echo e(asset('/storage/' . $product['image'])); ?>" alt="<?php echo e($product['name']); ?>" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; margin-right: 20px;">

                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <h5><?php echo e($product['name']); ?></h5>
                            <span class="text-muted" style="white-space:nowrap">x<?php echo e($product['quantity']); ?></span>
                        </div>
                        <p class="mb-0">Rp <?php echo e(number_format($product['price'], 0, ',', '.')); ?></p>
                    </div>
                </div>
                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('user.data')); ?>" class="btn btn-primary">Buy now</a>
                <br>
            <?php endif; ?>

            <div class="d-flex justify-content-center gap-4">
                <a href="<?php echo e(route('user.page')); ?>" class="btn btn-secondary">Return to home</a>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.plain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel\FinalProject\resources\views/basket.blade.php ENDPATH**/ ?>