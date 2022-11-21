<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +628119157575</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> kikirieswanto@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>Jakarta barat</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>
                    <?php if ($this->session->userdata('user_id')) : ?>
                        <div class="dropdownn">
                            <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-o"></i><?= $this->session->userdata('user_name'); ?></a>
                            <div class="dropdownn-content">
                                <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true"></i>My Profile</a>
                                <a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="dropdownn">
                            <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-o"></i>My Account</a>
                            <div class="dropdownn-content">
                                <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                            </div>
                        </div>
                    <?php endif ?>
                </li>
                <?php if ($this->session->userdata('user_role') == 'admin') : ?>
                    <li>
                        <div class="d-flex">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                            <a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a>
                        </div>
                    </li>
                <?php endif ?>
            </ul>

        </div>
    </div>
    <!-- /TOP HEADER -->



    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row" style="display:flex;align-items: center;">
                <!-- LOGO -->
                <div class="col">
                    <div class="header-logo">
                        <a href="<?= base_url(); ?>" class="logo">
                            <font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
                                ABK STORE
                            </font>
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <form action="<?= base_url('search'); ?>" method="post" class="header-search col-md-8">
                    <input class="input" id="search" name="search" type="text" placeholder="Search here">
                    <button type="submit" id="search_btn" class="search-btn">Search</button>
                </form>
                <!-- /SEARCH BAR -->
                <div class="col text-right">
                    <?php if ($this->session->userdata('user_id')) : ?>
                        <!-- Cart -->
                        <div class="dropdown">
                            <a href="<?= base_url('product/cart'); ?>" style="color:aliceblue !important;cursor: pointer;">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="badge qty" id="cart-qty"><?= get_count_cart(); ?></div>
                            </a>
                        </div>
                        <!-- /Cart -->
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- /ACCOUNT -->
    </div>
    <!-- row -->
    </div>
    <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<?= $this->session->flashdata('alert'); ?>
<?php $this->load->view('modal/login') ?>
<?php $this->load->view('modal/register') ?>