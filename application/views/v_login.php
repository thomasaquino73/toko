<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <div class="account-logo">
                        <!-- <a href="index-2.html"><img src="<?= base_url() ?>assets/img/logo-dark.png" alt=""></a> -->
                        <a href="index-2.html"><img src="<?= base_url('assets/img/logo/') . $konfigurasi->logo ?>" alt=""></a>
                    </div>


                    <?php if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong>' . $this->session->flashdata('warning') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>';
                    } elseif ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>' . $this->session->flashdata('sukses') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>';
                    } elseif ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>' . $this->session->flashdata('error') . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
                    }; ?>
                    <?= form_open('login') ?>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" autofocus="" name="username" class="form-control  <?= form_error('username') ? 'is-invalid' : null ?>" value="<?= set_value('username') ?>">
                        <small class="text-danger"> <?= form_error('username') ?></small>

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control  <?= form_error('password') ? 'is-invalid' : null ?>">
                        <small class="text-danger"> <?= form_error('password') ?></small>

                    </div>
                    <div class="form-group text-right">
                        <a href="forgot-password.html">Forgot your password?</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn">Login</button>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/app.js"></script>
</body>


<!-- login23:12-->

</html>