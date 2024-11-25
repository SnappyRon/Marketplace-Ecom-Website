

<?php $__env->startSection('title', 'MindanaoMarket - Home'); ?>

<?php $__env->startSection('content'); ?>
<section id="hero">
    <h4>Ka Bisdak! May Discount Ka!</h4>
    <h2>Super Value Deals</h2>
    <h1>Local Products Only</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button onclick="window.location.href='<?php echo e(url('shop')); ?>';">Shop Now</button>
</section>

<section id="feature" class="section-p1">
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f1.png')); ?>" alt=""><h6>Free Delivery</h6></div>
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f2.png')); ?>" alt=""><h6>Online Order</h6></div>
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f3.png')); ?>" alt=""><h6>Save Money</h6></div>
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f4.png')); ?>" alt=""><h6>Promotions</h6></div>
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f5.png')); ?>" alt=""><h6>Happy Sell</h6></div>
    <div class="fe-box"><img src="<?php echo e(asset('img/features/f6.png')); ?>" alt=""><h6>24/7 Support</h6></div>
</section>

<section id="product1" class="section-p1">
    <h2>New Listed Products</h2>
    <p>Hot Deals!</p>
    <div class="pro-container">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('product.details', $product->id)); ?>" class="pro-link">
                <div class="pro">
                    <img src="<?php echo e(asset('img/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
                    <div class="des">
                        <span><?php echo e($product->supplier_name); ?></span>
                        <h5><?php echo e($product->name); ?></h5>
                        <h4>₱<?php echo e(number_format($product->price, 2)); ?></h4>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="view-more">
        <a href="<?php echo e(url('/shop')); ?>" class="btn">View All Products</a>
    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/home.blade.php ENDPATH**/ ?>