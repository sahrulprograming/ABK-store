<?php $this->load->view('layouts/guest/navbar') ?>
<div class="main main-raised">
    <div class="container mainn-raised" style="width:100%;">
        <?php $this->session->flashdata('alert'); ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?= base_url('assets/'); ?>img/banner3.jpg" alt="Los Angeles" style="width:100%;">
                </div>
                <div class="item">
                    <img src="<?= base_url('assets/'); ?>img/banner2.jpg" style="width:100%;">
                </div>
                <div class="item">
                    <img src="<?= base_url('assets/'); ?>img/banner4.jpg" alt="New York" style="width:100%;">
                </div>
                <div class="item">
                    <img src="<?= base_url('assets/'); ?>img/banner1.jpg" alt="New York" style="width:100%;">
                </div>
                <div class="item">
                    <img src="<?= base_url('assets/'); ?>img/banner3.jpg" alt="New York" style="width:100%;">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    <!-- SECTION -->
    <div class="section mainn mainn-raised">


        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="<?= base_url('product/show/78'); ?>">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/'); ?>img/shop01.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Laptop<br>Collection</h3>
                                <a href="<?= base_url('product/show/78'); ?>" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="<?= base_url('product/show/72'); ?>">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/'); ?>img/shop03.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Accessories<br>Collection</h3>
                                <a href="<?= base_url('product/show/72'); ?>" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <a href="<?= base_url('product/show/79'); ?>">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?= base_url('assets/'); ?>img/shop02.png" alt="">
                            </div>
                            <div class="shop-body">
                                <h3>Cameras<br>Collection</h3>
                                <a href="<?= base_url('product/show/79'); ?>" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Electronic</a></li>
                                <li><a data-toggle="tab" href="#tab2">Ladies Wear</a></li>
                                <li><a data-toggle="tab" href="#tab3">Mens Wear</a></li>
                                <li><a data-toggle="tab" href="#tab4">Kids Wear</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php foreach ($electronics as $electronic) : ?>
                                        <div class='product'>
                                            <a href='<?= base_url('product/show/' . $electronic->product_id); ?>'>
                                                <div class='product-img'>
                                                    <img src="<?= base_url('assets/img/products/' . $electronic->product_image); ?>" style='max-height: 170px;' alt=''>
                                                    <div class='product-label'>
                                                        <span class='sale'>-30%</span>
                                                        <span class='new'>NEW</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class='product-body'>
                                                <p class='product-category'><?= $electronic->cat_title; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?= $electronic->product_title; ?></a></h3>
                                                <h4 class='product-price header-cart-item-info'>IDR <?= number_format($electronic->product_price, 0, ',', '.'); ?><del class='product-old-price'></del></h4>
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
                                                <button pid='$pro_id' id='add-product-cart' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                            <!-- tab -->
                            <div id="tab2" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php foreach ($ladiesWears as $ladiesWear) : ?>
                                        <div class='product'>
                                            <a href='product.php?p=$pro_id'>
                                                <div class='product-img'>
                                                    <img src="<?= base_url('assets/img/products/' . $ladiesWear->product_image); ?>" style='max-height: 170px;' alt=''>
                                                    <div class='product-label'>
                                                        <span class='sale'>-30%</span>
                                                        <span class='new'>NEW</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class='product-body'>
                                                <p class='product-category'><?= $ladiesWear->cat_title; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?= $ladiesWear->product_title; ?></a></h3>
                                                <h4 class='product-price header-cart-item-info'>IDR <?= number_format($ladiesWear->product_price, 0, ',', '.'); ?><del class='product-old-price'></del></h4>
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
                                                <button pid='$pro_id' id='add-product-cart' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-3">
                                    <!-- product -->
                                    <?php foreach ($menWears as $menWear) : ?>
                                        <div class='product'>
                                            <a href='product.php?p=$pro_id'>
                                                <div class='product-img'>
                                                    <img src="<?= base_url('assets/img/products/' . $menWear->product_image); ?>" style='max-height: 170px;' alt=''>
                                                    <div class='product-label'>
                                                        <span class='sale'>-30%</span>
                                                        <span class='new'>NEW</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class='product-body'>
                                                <p class='product-category'><?= $menWear->cat_title; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?= $menWear->product_title; ?></a></h3>
                                                <h4 class='product-price header-cart-item-info'>IDR <?= number_format($menWear->product_price, 0, ',', '.'); ?><del class='product-old-price'></del></h4>
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
                                                <button pid='$pro_id' id='add-product-cart' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                            <div id="tab4" class="tab-pane">
                                <div class="products-slick" data-nav="#slick-nav-4">
                                    <!-- product -->
                                    <?php foreach ($kidsWears as $kidsWear) : ?>
                                        <div class='product'>
                                            <a href='product.php?p=$pro_id'>
                                                <div class='product-img'>
                                                    <img src="<?= base_url('assets/img/products/' . $kidsWear->product_image); ?>" style='max-height: 170px;' alt=''>
                                                    <div class='product-label'>
                                                        <span class='sale'>-30%</span>
                                                        <span class='new'>NEW</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class='product-body'>
                                                <p class='product-category'><?= $kidsWear->cat_title; ?></p>
                                                <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?= $kidsWear->product_title; ?></a></h3>
                                                <h4 class='product-price header-cart-item-info'>IDR <?= number_format($kidsWear->product_price, 0, ',', '.'); ?><del class='product-old-price'></del></h4>
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
                                                <button pid='$pro_id' id='add-product-cart' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-4" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section mainn mainn-raised">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="store.php">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Formals</a></li>
                                <li><a data-toggle="tab" href="#tab2">Shirts</a></li>
                                <li><a data-toggle="tab" href="#tab2">T-Shirts</a></li>
                                <li><a data-toggle="tab" href="#tab2">Pants</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12 mainn mainn-raised">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->


                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-6" class="products-slick-nav"></div>
                        </div>
                    </div>
                    <div class="products-widget-slick" data-nav="#slick-nav-6">
                        <div id="get_product_home2">
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"><del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"><del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"> <del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-7" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-7">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"> <del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"><del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price"> <del class="product-old-price"></del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs">

                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->


                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/'); ?>img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
</div>
<?php $this->load->view('layouts/guest/newsletter') ?>