<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column" style="background-color: white; max-width:1000px; width:100%; height:650px; padding:20px; border-radius: 20px">

    <h6>Invoice Number : <?php echo e(session('last_invoice_number') + 1); ?></h6>
    <br>
    <h6>Destination : <?php echo e(session('user_address')); ?></h6>
    <p>Postal Code : <?php echo e(session('user_pos')); ?></p>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Category</th>
            <th scope="col">Product</th>
            <th scope="col">Qty</th>
            <th scope="col">@</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <form action="<?php echo e(route('invoice.saved')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php
                $total = 0;
            ?>

            <?php $__currentLoopData = $basketThings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($index + 1); ?></th>
                    <td><?php echo e($item->category); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->quantity); ?></td>
                    <td>Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
                    <td>Rp <?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?></td>
                </tr>
                <?php
                    $total += $item->quantity * $item->price
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="float-right">Total</td>
                <td class="float-right">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></td>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <div class="d-flex justify-content-center">
        <a href="<?php echo e(route('user.data')); ?>" class="btn btn-secondary me-3">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>


    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.plain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Laravel\FinalProject\resources\views/payment.blade.php ENDPATH**/ ?>