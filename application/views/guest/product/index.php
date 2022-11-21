<?php $this->load->view('layouts/guest/navbar') ?>
<div class="main main-raised">
    <div class="row">
        <!-- product -->
        <?php if ($products) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4">
                    <div class='product'>
                        <a href='<?= base_url('product/show/' . $product->product_id); ?>'>
                            <div class='product-img'>
                                <img src="<?= base_url('assets/img/products/' . $product->product_image); ?>" style='max-height: 170px;object-fit: contain;' alt=''>
                                <div class='product-label'>
                                    <span class='sale'>-30%</span>
                                    <span class='new'>NEW</span>
                                </div>
                            </div>
                        </a>
                        <div class='product-body'>
                            <p class='product-category'><?= $product->cat_title; ?></p>
                            <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?= $product->product_title; ?></a></h3>
                            <h4 class='product-price header-cart-item-info'>IDR <?= number_format($product->product_price, 0, ',', '.'); ?><del class='product-old-price'></del></h4>
                            <div class='product-rating'>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                            </div>
                            <div class='product-btns'>
                                <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                                <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                                <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                            </div>
                        </div>
                        <div class='add-to-cart'>
                            <button pid='<?= $product->product_id; ?>' id='add-product-cart' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- /product -->
        <?php else : ?>
            <div class="col-md-12 text-center" style="height: 320px;">
                <h3 style="line-height: 320px;">Product Not Found</h3>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->load->view('layouts/guest/newsletter') ?>