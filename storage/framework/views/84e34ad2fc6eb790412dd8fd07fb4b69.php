<section id="header">
    <a href="#"><img src="<?php echo e(asset('img/logo3.png')); ?>" class="logo" alt="Logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="<?php echo e(url('/')); ?>" class="<?php echo e(request()->is('/') ? 'active' : ''); ?>">Home</a></li>
            <li><a href="<?php echo e(url('/shop')); ?>" class="<?php echo e(request()->is('shop') ? 'active' : ''); ?>">Shop</a></li>
            <li><a href="<?php echo e(url('/contact')); ?>" class="<?php echo e(request()->is('contact') ? 'active' : ''); ?>">Contact</a></li>
            <li><a href="<?php echo e(url('/seller')); ?>" class="<?php echo e(request()->is('seller') ? 'active' : ''); ?>">I'm a Seller</a></li>
            <li><a href="<?php echo e(url('/cart')); ?>"><i class="ri-shopping-bag-line"></i></a></li>
        </ul>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/partials/header.blade.php ENDPATH**/ ?>