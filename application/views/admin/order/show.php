<h1>Detail Order</h1>

<div class="card">
    <div class="card-body">
        <?php $total = 0 ?>
        <?php foreach ($orders as $order) : ?>
            <?php $total += $order->amount ?>
            <div class="row row-cols-2">
                <div class="col">
                    <img src="<?= base_url('assets/img/products/' . $order->product_image); ?>" width="120" height="120" alt="gambar <?= $order->product_title; ?>">
                    <div class="detail">
                        <h5><?= $order->product_title; ?></h5>
                        <p><?= $order->cat_title; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="qty">
                        Qty : <?= $order->qty; ?>
                    </div>
                    <div class="price">
                        Price : Rp <?= rupiah($order->amount); ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="row">
            <div class="col text-end">
                <div class="total">
                    Total
                </div>
                <div class="price_total">
                    Rp <?= rupiah($total); ?>
                </div>
            </div>
        </div>
    </div>
</div>