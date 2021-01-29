
<!DOCTYPE html>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <form action="<?= base_url('Auth') ?>" method="post">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="feather icon-smartphone auth-icon"></i>
                        </div>
                        <h3 class="mb-4">E - Mentor</h3>
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                <label for="checkbox-fill-a1" class="cr"> Remember me</label>
                            </div>
                        </div>
                        <?= form_error('username', '<div class="alert alert-danger" role="alert">',' !</div>') ?>
                    <?= form_error('password', '<div class="alert alert-danger" role="alert">',' !</div>') ?>
                        <?= $this->session->flashdata('pesan') ?>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Login</button>
                        <!-- <p class="mb-2 text-muted">Forgot password? <a href="#">Reset</a></p> -->
                        <!-- <p class="mb-0 text-muted">Belum punya akun? <a href="<?= base_url('Auth/registration') ?>">Daftar</a></p> -->
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
