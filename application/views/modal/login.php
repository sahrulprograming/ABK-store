<div class="modal fade" id="Modal_login" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="login-marg">
                        <div id="alert"></div>
                        <form onsubmit="login(event)" class="login100-form ">
                            <div class="section-title">
                                <h2 class="login100-form-title">Login Here</h2>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="input input-borders" type="email" name="email" placeholder="Email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input class="input input-borders" type="password" name="password" placeholder="password" id="password" required>
                            </div>
                            <div class="text-pad text-right" style="padding-top: 0;">
                                <a href="#">
                                    forget password ?
                                </a>
                            </div>
                            <input class="primary-btn btn-block" type="submit" Value="Login">
                            <div class="panel-footer">
                                <div class="text-center">
                                    <a href="" data-toggle="modal" data-dismiss="modal" data-target="#Modal_register">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const login = (evn) => {
        evn.preventDefault();
        const data = {
            email: $('input[name="email"]').val(),
            password: $('input[name="password"]').val()
        }
        $.ajax({
            url: `<?= base_url('auth/login_ajax'); ?>`,
            method: 'POST',
            data: data,
            success: function(status) {
                if (status == 'successfully') {
                    window.location.reload();
                } else {
                    $('#alert').html(status);
                }
            }
        })
    }
</script>