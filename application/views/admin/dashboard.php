<h1>Dashboard</h1>

<div class="row row-cols-2">
    <div class="col">
        <div class="card shadow bg-primary">
            <div class="card-body text-white">
                <h5>Product</h5>
                <p><?= $this->db->count_all_results('products'); ?></p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow bg-primary">
            <div class="card-body text-white">
                <h5>Orders</h5>
                <p><?= $this->db->count_all_results('orders'); ?></p>
            </div>
        </div>
    </div>
</div>