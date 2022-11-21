<?php $this->load->view('layouts/guest/navbar') ?>

<style>
    .card {
        background-color: #fff;
        margin: 1rem;
        padding: 0.5rem;
        border-radius: 2px;
        box-shadow: 0 0 8px;
    }

    .product {
        display: flex;
    }

    .wrapper-product {
        display: flex;
        align-items: center;
    }

    .kosong {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 220px;
    }

    .checkout {
        background-color: #fff;
        margin: 1rem;
        padding: 1rem;
        display: flex;
        justify-content: end;
        align-items: center;
        gap: 8px;
    }

    .checkout p,
    h6 {
        margin: 0;
    }
</style>

<div class="card">
    <?php if ($carts) : ?>
        <div class="row text-center">
            <div class="col-md-4">Produk</div>
            <div class="col-md-2">Harga Satuan</div>
            <div class="col-md-2">Kuantitas</div>
            <div class="col-md-2">Total Harga</div>
            <div class="col-md-2">Aksi</div>
        </div>
        <hr>
        <?php $total = 0;
        $count_product = 0 ?>
        <?php foreach ($carts as $cart) : ?>
            <?php $total += $cart->product_price * $cart->qty;
            $count_product += 1 ?>
            <div class="row text-center wrapper-product">
                <div class="col-md-4 text-left product">
                    <img src="<?= base_url('assets/img/products/' . $cart->product_image); ?>" width="120" height="120" alt="gambar <?= $cart->product_title; ?>">
                    <div class="detail">
                        <h5><?= $cart->product_title; ?></h5>
                        <p><?= $cart->cat_title; ?></p>
                    </div>
                </div>
                <div class="col-md-2">IDR <?= number_format($cart->product_price, 0, '', '.'); ?></div>
                <div class="col-md-2">
                    <div class="input-number">
                        <input type="number" name="qty<?= $cart->product_id; ?>" value="<?= $cart->qty; ?>">
                        <span class="qty-up btn-plus<?= $cart->product_id; ?>">+</span>
                        <span class="qty-down btn-min<?= $cart->product_id; ?>">-</span>
                    </div>
                </div>
                <input type="hidden" value="" name="">
                <div class="col-md-2 sub_total_harga<?= $cart->product_id; ?>">Rp <?= number_format($cart->product_price * $cart->qty, 2, ',', '.'); ?></div>
                <script>
                    $('.btn-plus<?= $cart->product_id; ?>').on('click', function() {
                        let angka = parseInt($('input[name="qty<?= $cart->product_id; ?>"]').val()) || 0
                        $('input[name="qty<?= $cart->product_id; ?>"]').val(parseInt(angka++))
                        let total_harga = parseInt(<?= $cart->product_price; ?>) * angka
                        $('.sub_total_harga<?= $cart->product_id; ?>').html(new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(total_harga))
                        $.ajax({
                            url: "<?= base_url('product/addToCart'); ?>",
                            method: "POST",
                            data: {
                                productId: <?= $cart->product_id; ?>,
                                qty: 1,
                            },
                            success: function(respown) {
                                console.log(respown)
                                output = JSON.parse(respown)
                                if (output.status == 'success') {
                                    $('#cart-qty').html(output.data);
                                    window.location.reload();
                                } else if (output.status === 'not login') {
                                    alert('harap login terlebih dahulu');
                                } else {
                                    alert('ada yang salah')
                                }
                            }
                        })
                    })
                    $('.btn-min<?= $cart->product_id; ?>').on('click', function() {
                        let angka = parseInt($('input[name="qty<?= $cart->product_id; ?>"]').val()) || 0
                        $('input[name="qty<?= $cart->product_id; ?>"]').val(parseInt(angka--))
                        let total_harga = parseInt(<?= $cart->product_price; ?>) * angka
                        $('.sub_total_harga<?= $cart->product_id; ?>').html(new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        }).format(total_harga))
                        $.ajax({
                            url: "<?= base_url('product/removeToCart'); ?>",
                            method: "POST",
                            data: {
                                productId: <?= $cart->product_id; ?>,
                                qty: 1,
                                cartId: <?= $cart->id; ?>
                            },
                            success: function(respown) {
                                console.log(respown)
                                output = JSON.parse(respown)
                                if (output.status == 'success') {
                                    $('#cart-qty').html(output.data);
                                    window.location.reload();
                                } else if (output.status === 'not login') {
                                    alert('harap login terlebih dahulu');
                                } else {
                                    alert('ada yang salah')
                                }
                            }
                        })
                    })
                </script>
                <div class="col-md-2">
                    <a href="<?= base_url('product/delete_cart/' . $cart->product_id); ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        <?php endforeach ?>


    <?php else : ?>
        <div class="text-center kosong">
            Data Keranjang Kosong
        </div>
    <?php endif ?>
</div>
<div class="checkout">
    <h6>Produk <span id="jumalah produk">(<?= $count_product; ?>)</span></h6>
    <p id="total">Rp <?= number_format($total, 2, ',', '.'); ?></p>
    <a href="<?= base_url('payment'); ?>" class=" btn btn-warning">checkout</a>
</div>
<?php $this->load->view('layouts/guest/newsletter') ?>