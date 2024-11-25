

<?php $__env->startSection('title', 'Your Cart'); ?>

<?php $__env->startSection('content'); ?>
<section class="cart-section">
    <h2>Your Cart</h2>

    <?php if(!count($cartItems)): ?> <!-- Correct condition -->
        <p class="empty-cart">Your cart is empty.</p>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(asset('img/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" class="cart-item-image"> <!-- Fixed path -->
                        </td>
                        <td><?php echo e($item['name']); ?></td>
                        <td>₱<?php echo e(number_format($item['price'], 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="cart-total">
            <h3>Total: ₱<?php echo e(number_format($total, 2)); ?></h3>
        </div>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/cart/index.blade.php ENDPATH**/ ?>