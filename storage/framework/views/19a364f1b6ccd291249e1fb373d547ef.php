
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
        MindanaoMarket - Shop
     <?php $__env->endSlot(); ?>

    <section id="product1" class="section-p1">
        <h2>New Listed Products</h2>
        <p>Hot Deals!</p>
        <div class="pro-container1">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('product.details', $product->id)); ?>" class="pro-link">
                <div class="pro">
                    <img src="<?php echo e(asset('img/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                    <div class="des">
                        <span><?php echo e($product->supplier_name); ?></span>
                        <h5><?php echo e($product->name); ?></h5>
                        <h4>₱<?php echo e(number_format($product->price, 2)); ?></h4>
                    </div>
                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="ri-shopping-cart-line cart">+</button>
                    </form>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/shop.blade.php ENDPATH**/ ?>