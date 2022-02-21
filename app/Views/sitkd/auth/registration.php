<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="avatar">
                        <img src="<?= base_url('img/thumbnail/logojateng.png') ?>">
                    </div>
                    <style>
                        body {
                            margin: 0;
                            padding: 0;
                            background: url(<?= base_url("img/bg/sitkd/asetdesajateng1.jpg") ?>);
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                            background-attachment: fixed;
                        }

                        .card {
                            margin-top: 14%;
                            background: rgba(4, 29, 23, 0.5);
                        }

                        .avatar {
                            width: 100px;
                            height: 0px;
                            line-height: 50px;
                            position: fixed;
                            left: 50%;
                            top: 0px;
                            transform: translate(-50%, -50%);
                            text-align: center;
                            border-radius: 50%;
                        }

                        .form-group input {
                            background: none;
                            border: none;
                            outline: none;
                            color: white;
                        }

                        .form-group input::placeholder {
                            color: #a8a7a5;
                            font-style: italic;
                        }

                        .auth-control {
                            display: block;
                            width: 100%;
                            height: calc(1.5em + 0.75rem + 2px);
                            padding: 0.375rem 0.75rem;
                            font-size: 1rem;
                            font-weight: 400;
                            line-height: 1.5;
                            color: #6e707e;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #d1d3e2;
                            border-radius: 0.35rem;
                            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                        }

                        .auth-control-user {
                            font-size: 0.8rem;
                            border-radius: 10rem;
                            padding: 1.5rem 1rem;
                        }

                        .btn-register .box-register input:hover {
                            background: rgba(10, 10, 10, s 0.5);
                        }

                        .btn-register {
                            margin-left: 10px;
                            margin-bottom: 20px;
                            background: none;
                            border: 1px solid white;
                            width: 92.5%;
                            padding: 10px;
                            color: white;
                            cursor: pointer;
                        }

                        .btn-register:hover {
                            background: rgba(12, 30, 15, 0.5);
                        }
                    </style>
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-white mb-4">Pendaftaran akun SITKD</h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('sitkd/registrasi'); ?>">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="auth-control auth-control-user is-invalid" id="nama" name="nama" autocomplete="off" placeholder="Nama lengkap" value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('nama') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="auth-control auth-control-user is-invalid" id="nip" name="nip" autocomplete="off" placeholder="Nomor Induk Pegawai" value="<?= old('nip'); ?>">
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('nip') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" class="auth-control auth-control-user is-invalid" id="email" name="email" autocomplete="off" placeholder="Email" value="<?= old('email'); ?>">
                                        <div class="invalid-feedback ml-3">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="auth-control auth-control-user is-invalid" id="password1" name="password1" autocomplete="off" placeholder="Password" value="<?= old('password1'); ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="auth-control auth-control-user is-invalid" id="password2" name="password2" autocomplete="off" placeholder="Validasi Password">
                                            <div class="invalid-feedback ml-3">
                                                <?= $validation->getError('password2') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="register" class="btn btn-register btn-user btn-block">
                                        Registrasi akun
                                    </button>
                                </form>
                                <div class="text-center">
                                    <a class="small text-white" href="<?= base_url('sitkd/auth'); ?>"><b>Sudah memiliki akun? Login!</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>