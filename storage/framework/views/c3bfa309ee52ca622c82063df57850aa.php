<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <h1 class="text-center mb-4">Fill in your data😊</h1>
    <div class="form-container">
        <div class="card p-5">
            <?php if($errors->has('address')): ?>
                <div class="alert alert-danger">
                    <?php echo e($errors->first('address')); ?>

                </div>
            <?php endif; ?>
            <?php if($errors->has('pos')): ?>
                <div class="alert alert-danger">
                    <?php echo e($errors->first('pos')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('data.saved')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pos" class="form-label">Postcode</label>
                    <input type="text" name="pos" class="form-control" id="pos">
                    <br>
                </div>
                <a href="<?php echo e(route('view.basket')); ?>" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary d-inline ms-2">Confirm</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.plain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel\FinalProject\resources\views/data.blade.php ENDPATH**/ ?>