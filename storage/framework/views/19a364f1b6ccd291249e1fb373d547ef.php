

<?php $__env->startSection('title', 'MindanaoMarket - Shop'); ?>

<?php $__env->startSection('content'); ?>
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
                    <a href="#"><i class="ri-account-circle-line profile"></i></a>
                </form>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/shop.blade.php ENDPATH**/ ?>