<?= $this->session->flashdata('alert');; ?>
<div class="m-3">
    <h2>Product</h2>
</div>
<form action="<?= base_url('admin/product'); ?>" method="post" class="d-flex mb-3" role="search">
    <input class="form-control me-2 py-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div class="card">
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Total</th>
                <th>bukti</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <?php $total = total_price_order($this->order); ?>
                <tr>
                    <td><?= $order->invoice; ?></td>
                    <td><?= $order->frist_name . ' ' . $order->last_name; ?></td>
                    <td><?= $total ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>