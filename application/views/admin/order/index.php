<?= $this->session->flashdata('alert');; ?>
<div class="m-3">
    <h2>Product</h2>
</div>
<form action="<?= base_url('admin/product'); ?>" method="post" class="d-flex mb-3" role="search">
    <input class="form-control me-2 py-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<div class="card">
    <table class="table table-bordered border-danger">
        <thead>
            <tr class="text-center">
                <th>Invoice</th>
                <th>Customer</th>
                <th>Total</th>
                <th>bukti</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <?php $total = total_price_order($this->order->detail_order($order->invoice)); ?>
                <tr>
                    <td><?= $order->invoice; ?></td>
                    <td><?= $order->first_name . ' ' . $order->last_name; ?></td>
                    <td class="text-center">
                        Rp <?= rupiah($total) ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#bukti<?= $order->invoice; ?>">Lihat</button>
                    </td>
                    <td class="text-center">
                        <?php if ($order->status_pembayaran == 'menunggu') : ?>
                            <a href="<?= base_url('admin/order/confirm/' . $order->invoice); ?>" class="btn btn-success">Konfirmasi</a>
                            <a href="<?= base_url('admin/order/reject/' . $order->invoice); ?>" class="btn btn-danger">Tolak</a>
                        <?php else : ?>
                            <p><?= $order->status_pembayaran; ?></p>
                        <?php endif ?>
                    </td>
                </tr>
                <!-- Bukti -->
                <div class="modal fade" id="bukti<?= $order->invoice; ?>" tabindex="-1" aria-labelledby="buktiLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="buktiLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center align-items-center">
                                <img src="<?= base_url('assets/img/bukti/' . $order->bukti); ?>" width="220" height="220" alt="" srcset="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
    </table>
</div>