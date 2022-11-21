<div class="modal fade" id="Modal_register" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <style>
                    .input-borders {
                        border-radius: 30px;
                    }
                </style>
                <div class="container-fluid">
                    <form id="signup_form" onsubmit="register(event)" class="login100-form">
                        <div id="register-alert"></div>
                        <div class="section-title">
                            <h2 class="login100-form-title">Register Here</h2>
                        </div>
                        <div class="form-group"> 
                            <input required class="input form-control input-borders" type="text" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input required class="input form-control input-borders" type="text" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input required class="input form-control input-borders" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input required class="input form-control input-borders" type="password" name="password" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input required class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            <input required class="primary-btn btn-block" value="Sign Up" type="submit" name="signup_button">
                        </div>
                        <div class="text-center">
                            <a href="" data-toggle="modal" data-dismiss="modal" data-target="#Modal_login">Already have an Account ? then login</a>
                        </div>
                    </form>
                    <div class="login-marg">
                        <!-- Billing Details -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                            </div>
                            <!--Alert from signup form-->
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const register = (evn) => {
        evn.preventDefault();
        const form = new FormData(event.target);
        const data = Object.fromEntries(form.entries());
        $.ajax({
            url: `<?= base_url('auth/register_ajax'); ?>`,
            method: 'POST',
            data: data,
            success: function(output) {
                console.log(output);
                if (output == 'successfully') {
                    window.location.reload();
                } else {
                    $('#register-alert').html(output);
                }
            }
        })
    }
</script>