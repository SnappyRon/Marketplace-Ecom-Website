
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Your Cart
     <?php $__env->endSlot(); ?>

    <section class="cart-section">
        <h2>Your Cart</h2>

        <?php if(!count($cartItems)): ?>
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
                                <img src="<?php echo e(asset('img/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" class="cart-item-image">
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
                <form action="<?php echo e(route('cart.checkout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="checkout-btn">Checkout</button>
                </form>
            </div>
        <?php endif; ?>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/cart/index.blade.php ENDPATH**/ ?>