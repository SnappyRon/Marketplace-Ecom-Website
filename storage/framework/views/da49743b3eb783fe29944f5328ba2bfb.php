

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<section class="product-details">
    <div class="product-container">
        <!-- Product Image -->
        <div class="product-image">
            <img src="<?php echo e(asset('img/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>">
        </div>

        <!-- Product Information -->
        <div class="product-info">
            <h1 class="product-title"><?php echo e($product->name); ?></h1>
            <p class="product-id">Item ID: <?php echo e($product->id); ?></p>

            <!-- Price Section -->
            <div class="price-section">
                <p class="original-price">Was ₱<?php echo e(number_format($product->price * 1.2, 2)); ?></p> <!-- Example 20% off -->
                <p class="discounted-price">Now ₱<?php echo e(number_format($product->price, 2)); ?></p>
            </div>

            <!-- Stock and Size Information -->
            <div class="stock-size-info">
                <p class="stock-status">IN STOCK - ONLY A FEW LEFT</p>
                <p class="tax-note">* Prices do not include taxes</p>
            </div>

            <!-- Color Selection -->
            <div class="color-selection">
                <label for="color">Color: </label>
                <span class="color-option"><?php echo e($product->color ?? 'Default'); ?></span> <!-- Add color if available -->
            </div>

            <!-- Size Selection -->
            <div class="size-selection">
                <label for="size">Size: </label>
                <select id="size" name="size">
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                </select>
            </div>

            <!-- Quantity Selector -->
            <div class="quantity-selection">
                <label for="quantity">Quantity: </label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="add-to-bag">ADD TO BAG</button>
                </form>
                <button class="add-to-wishlist">ADD TO WISHLIST</button>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/product/details.blade.php ENDPATH**/ ?>