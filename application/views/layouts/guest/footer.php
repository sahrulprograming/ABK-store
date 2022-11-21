<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Warung kecil penuh cerita</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>wadas ,Jakarta baat</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+87895116798</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>kikirieswanto@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="margin-top:80px;">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul </div>



                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->


        <!-- bottom footer -->

        <!-- /bottom footer -->
</footer>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/slick.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/nouislider.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.zoom.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/main.js"></script>
<script src="<?= base_url('assets/'); ?>js/actions.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweetalert.min"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.payform.min.js" charset="utf-8"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
<script>
    var c = 0;

    function menu() {
        if (c % 2 == 0) {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";
            c++;
        } else {
            document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";
            document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";
            c++;
        }
    }
</script>
<script type="text/javascript">
    $("body").delegate("#add-product-cart", "click", function(event) {
        event.preventDefault();
        let productId = $(this).attr("pid");
        let qty = 1;
        $(".overlay").show();
        $.ajax({
            url: "<?= base_url('product/addToCart'); ?>",
            method: "POST",
            data: {
                productId: productId,
                qty: qty,
            },
            success: function(respown) {
                console.log(respown)
                output = JSON.parse(respown)
                if (output.status == 'success') {
                    $('#cart-qty').html(output.data);
                } else if (output.status === 'not login') {
                    alert('harap login terlebih dahulu');
                } else {
                    alert('ada yang salah')
                }
            }
        })
    })
</script>