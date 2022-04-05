<?= $this->include('sidesa/layout/pemdes/content-header') ?>
<?= $this->include('sidesa/layout/pemdes/content-topbar') ?>
<?= $this->include('sidesa/layout/pemdes/content-sidebar') ?>

<div class="page-content" id="content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>
        <div class="col-md-12 col-xl-12"><?= session()->getFlashdata('message'); ?></div>
        <div class="auth-content my-auto">
            <form class="needs-validation custom-form mt-4 pt-2" method="POST" action="">
                <?= csrf_field(); ?>

                <div class="col-sm-6 mb-3">
                    <label for="password" class="form-label">Password lama</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : '') ?>" id="password" name="password" placeholder="Masukan password lama">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                    </div>
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="password1" class="form-label">Password baru</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password1') ? 'is-invalid' : '') ?>" id="password1" name="password1" placeholder="Masukan password baru">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password1') ?>
                    </div>
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="password2" class="form-label">Verifikasi password baru</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password2') ? 'is-invalid' : '') ?>" id="password2" name="password2" placeholder="Ketikan ulang password baru">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password2') ?>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mt-5">
                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="gantipas">Ganti Password</button>
                </div>
            </form>

        </div>
    </div>

</div>
</div>
<?= $this->include('sidesa/layout/pemdes/content-footer') ?>