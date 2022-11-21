<?php $this->load->view('layouts/guest/navbar') ?>
<style>
    .row-checkout {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container-checkout {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input {
        width: 100%;
        margin-bottom: 16px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .checkout-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .checkout-btn:hover {
        background-color: #45a049;
    }



    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row-checkout {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
</style>


<section class="section">
    <div class="container-fluid">
        <div class="row-checkout">
            <div class="col-75">
                <div class="container-checkout">
                    <form id="checkout_form" action="<?= current_url(); ?>" method="POST" class="was-validated" enctype="multipart/form-data">
                        <div class="row-checkout">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="name"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="<?= $this->session->userdata('user_name'); ?>">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= $user->email; ?>" required>
                                <label for="phone_number"><i class="fa fa-phone"></i> phone number</label>
                                <input type="number" id="phone_number" name="phone_number" class="form-control" value="<?= $user->phone_number; ?>" required>
                                <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="address" name="address" class="form-control" value="<?= $user->address; ?>" required>
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" class="form-control" value="<?= $user->city; ?>" pattern="^[a-zA-Z ]+$" required>

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-50">
                                <h3>Payment</h3>
                                <p>Scan Here To Pay Your Order</p>
                                <img src="<?= base_url('assets/img/QR.png'); ?>" alt="" srcset="">
                                <div class="">
                                    <label for="bukti" style="margin-top: 16px;">Upload Bukti Pembayaran</label>
                                    <input type="file" class="form-control" name="bukti" id="bukti" required>
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name="" value="">
                        <input type='hidden' name="" value="">
                        <input type='hidden' name="" value="">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="" value="">
                        <input type="submit" class="checkout-btn">
                    </form>
                </div>
            </div>

            <div class="col-25">
                <div class="container-checkout">
                    <h4>Cart
                        <span class='price' style='color:black'>
                            <i class='fa fa-shopping-cart'></i>
                        </span>
                    </h4>
                    <table class='table table-condensed'>
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>product title</th>
                                <th>qty</th>
                                <th>amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0 ?>
                            <?php foreach ($carts as $cart) : ?>
                                <tr>
                                    <td>
                                        <p><?php $no++ ?></p>
                                    </td>
                                    <td>
                                        <p><?= $cart->product_title; ?></p>
                                    </td>
                                    <td>
                                        <p><?= $cart->qty; ?></p>
                                    </td>
                                    <td>
                                        <p><?= $cart->product_price * $cart->qty; ?></p>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <hr>
                    <h3>total<span class='price' style='color:black'><b>Rp <?= rupiah($total_price); ?></b></span></h3>";
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('layouts/guest/newsletter') ?>