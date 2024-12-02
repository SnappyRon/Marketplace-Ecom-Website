
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
        MindanaoMarket - Home
     <?php $__env->endSlot(); ?>

    <!-- Hero Section -->
    <section id="hero" style="position: relative; padding: 50px; text-align: center; background-color: #f5f5f5;">
        <?php if(auth()->guard()->guest()): ?>
            <!-- Login Form for Guests -->
            <div style="max-width: 400px; margin: 0 auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h2>Welcome Back!</h2>
                <p>Please log in to access your account.</p>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Email Address -->
                    <div style="margin-bottom: 15px;">
                        <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                        <input id="email" type="email" name="email" required autofocus autocomplete="username" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 15px;">
                        <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>

                    <!-- Remember Me -->
                    <div style="margin-bottom: 15px;">
                        <label for="remember_me" style="font-size: 14px;">
                            <input id="remember_me" type="checkbox" name="remember">
                            Remember Me
                        </label>
                    </div>

                    <!-- Forgot Password and Submit -->
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <?php if(Route::has('password.request')): ?>
                            <a href="<?php echo e(route('password.request')); ?>" style="font-size: 14px; color: #555;">Forgot your password?</a>
                        <?php endif; ?>
                        <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <!-- Welcome Message for Authenticated Users -->
            <h4>Welcome, <?php echo e(auth()->user()->name); ?>!</h4>
            <p>Explore the latest deals and products just for you.</p>
        <?php endif; ?>

        <!-- Promotional Text -->
        <div style="margin-top: 50px;">
            <h4>Ka Bisdak! May Discount Ka!</h4>
            <h2>Super Value Deals</h2>
            <h1>Local Products Only</h1>
            <p>Save more with coupons & up to 70% off!</p>
            <button onclick="window.location.href='<?php echo e(url('shop')); ?>';" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Shop Now
            </button>
        </div>
    </section>

    <!-- Feature Section -->
    <section id="feature" class="section-p1">
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f1.png')); ?>" alt=""><h6>Free Delivery</h6></div>
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f2.png')); ?>" alt=""><h6>Online Order</h6></div>
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f3.png')); ?>" alt=""><h6>Save Money</h6></div>
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f4.png')); ?>" alt=""><h6>Promotions</h6></div>
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f5.png')); ?>" alt=""><h6>Happy Sell</h6></div>
        <div class="fe-box"><img src="<?php echo e(asset('img/features/f6.png')); ?>" alt=""><h6>24/7 Support</h6></div>
    </section>

    <!-- Products Section -->
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
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/home.blade.php ENDPATH**/ ?>