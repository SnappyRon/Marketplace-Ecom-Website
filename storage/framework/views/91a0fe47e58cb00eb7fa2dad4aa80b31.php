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
        Your Bag
     <?php $__env->endSlot(); ?>

    <section style="padding: 20px; font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333;">
        <h1 style="text-align: center; font-size: 24px; color: #5e535a;">Your Bag</h1>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin-top: 20px;">
            <!-- Cart Items -->
            <div style="flex: 2; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="margin-bottom: 20px; font-size: 18px; color: #5e535a;">Shopping Bag (<?php echo e(count($cartItems)); ?>)</h2>

                <?php if(!count($cartItems)): ?>
                    <p style="text-align: center; color: #888;">Your cart is empty.</p>
                <?php else: ?>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <thead>
                            <tr style="background-color: #5e535a; color: #ffffff;">
                                <th style="padding: 10px; text-align: left;">Product</th>
                                <th style="padding: 10px; text-align: center;">Price</th>
                                <th style="padding: 10px; text-align: center;">Quantity</th>
                                <th style="padding: 10px; text-align: center;">Total</th>
                                <th style="padding: 10px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                                    <td style="padding: 10px; display: flex; align-items: center; gap: 10px;">
                                        <img src="<?php echo e(asset('img/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" style="width: 50px; height: 50px; border-radius: 5px; border: 1px solid #ddd;">
                                        <div>
                                            <strong style="color: #5e535a;"><?php echo e($item['name']); ?></strong>
                                            <!-- <p style="margin: 0; font-size: 12px; color: #888;">Only <?php echo e($item['stock'] ?? 'N/A'); ?> left in stock</p> -->
                                        </div>
                                    </td>
                                    <td style="padding: 10px; text-align: center;">₱<?php echo e(number_format($item['price'], 2)); ?></td>
                                    <td style="padding: 10px; text-align: center;">
                                        <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST" style="display: inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" style="width: 50px; text-align: center; border: 1px solid #ddd; border-radius: 5px;">
                                            <button type="submit" style="background-color: #5e535a; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; margin-top: 5px; cursor: pointer;">Update</button>
                                        </form>
                                    </td>
                                    <td style="padding: 10px; text-align: center;">₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                                    <td style="padding: 10px; text-align: center;">
                                        <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

            <!-- Order Summary -->
            <div style="flex: 1; background-color: #ffffff; padding: 20px; border: 1px solid #5e535a; border-radius: 10px;">
                <h2 style="font-size: 18px; color: #5e535a; margin-bottom: 20px;">Order Summary</h2>
                <div style="margin-bottom: 20px; display: flex; justify-content: space-between; font-weight: bold;">
                    <span>Estimated Total:</span>
                    <span>₱<?php echo e(number_format($total, 2)); ?></span>
                </div>
                <a href="<?php echo e(route('cart.checkout.form')); ?>" style="display: block; text-align: center; background-color: #5e535a; color: #ffffff; text-decoration: none; padding: 10px; border-radius: 5px;">Checkout Now</a>
                <div style="margin-top: 20px; display: flex; align-items: center; gap: 10px;">
                    <p style="margin: 0; color: #5e535a; font-weight: bold; flex-shrink: 0;">Payment Methods:</p>
                    <img src="<?php echo e(asset('img/pay/pay.png')); ?>" alt="Payment Methods" style="max-height: 25px; width: auto; display: inline-block;">
                </div>

            </div>
        </div>
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