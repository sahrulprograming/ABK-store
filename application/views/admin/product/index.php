<?= $this->session->flashdata('alert');; ?>
<div class="m-3">
    <h2>Product</h2>
</div>
<form action="<?= base_url('admin/product'); ?>" method="post" class="d-flex mb-3" role="search">
    <input class="form-control me-2 py-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div class="card">
    <a href="<?= base_url('admin/product/create'); ?>" class="btn btn-success">Tambah Product</a>
    <div class="card-body shadow">
        <div class="row row-cols-3 products">
            <?php foreach ($products as $product) : ?>
                <div class="col mb-4 product">
                    <div class="card">
                        <img src="<?= base_url('assets/img/products/' . $product->product_image); ?>" class="card-img-top" alt="<?= $product->product_title ?>" height="280" onclick="window.location.href='<?= base_url('product/show/' . $product->product_id) ?>'" style="object-fit: contain;">
                        <div class="card-body">
                            <p>IDR <?= number_format($product->product_price, 0, ',', '.'); ?></p>
                            <div class="card-title" style="height: 60px;">
                                <h5><?= $product->product_title ?></h5>
                            </div>
                        </div>
                        <div class=" card-footer row">
                            <div class="col">
                                <a href="<?= base_url('admin/product/update/' . $product->product_id); ?>" class="btn btn-primary" style="width: 100%;">Ubah</a>
                            </div>
                            <div class="col">
                                <button type="button" id="hapus-<?= $product->product_id; ?>" class="btn btn-danger" style="width: 100%;">Hapus</button>
                                <script type="text/javascript">
                                    $('#hapus-<?= $product->product_id; ?>').on('click', function() {
                                        confirm('Yakin ingin menghapus produk ini?') ? window.location.href = '<?= base_url('admin/product/delete/' . "$product->product_id/$product->product_image"); ?>' : false;
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>