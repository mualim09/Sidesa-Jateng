<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content" id="content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <div><?= session()->getFlashdata('message'); ?></div>
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="inputby" class="col-sm-2 col-form-label">Input Oleh</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="inputby" name="inputby" value="<?= htmlspecialchars($inputby['nama'], ENT_QUOTES); ?>" readonly>
                            <small class="form-text text-danger"><?= $validation->getError('inputby'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="news1" class="col-sm-2 col-form-label">Informasi 1</label>
                        <div class="col-sm-6 mb-3">
                            <textarea type="text" class="form-control" id="news1" name="news1"><?= isset($dashboard['news1']) ? htmlspecialchars($dashboard['news1'], ENT_QUOTES) : NULL; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="news2" class="col-sm-2 col-form-label">Informasi 2</label>
                        <div class="col-sm-6 mb-3">
                            <textarea type="text" class="form-control" id="news2" name="news2"><?= isset($dashboard['news2']) ? htmlspecialchars($dashboard['news2'], ENT_QUOTES) : NULL; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="news3" class="col-sm-2 col-form-label">Informasi 3</label>
                        <div class="col-sm-6 mb-3">
                            <textarea type="text" class="form-control" id="news3" name="news3"><?= isset($dashboard['news3']) ? htmlspecialchars($dashboard['news3'], ENT_QUOTES) : NULL; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="news4" class="col-sm-2 col-form-label">Informasi 4</label>
                        <div class="col-sm-6 mb-3">
                            <textarea type="text" class="form-control" id="news4" name="news4"><?= isset($dashboard['news4']) ? htmlspecialchars($dashboard['news4'], ENT_QUOTES) : NULL; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="news5" class="col-sm-2 col-form-label">Informasi 5</label>
                        <div class="col-sm-6 mb-3">
                            <textarea type="text" class="form-control" id="news5" name="news5"><?= isset($dashboard['news5']) ? htmlspecialchars($dashboard['news5'], ENT_QUOTES) : NULL; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar Dashboard</div>
                        <div class="col-sm-6 mb-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= isset($dashboard['bghome']) ? base_url('img/bg/sidesa/kabupaten/' . $dashboard['bghome']) : base_url('img/bg/sidesa/kabupaten/default.jpg') ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="image">Gambar yang akan diupload</label>
                                        <input type="hidden" name="imagelama" value="<?= isset($dashboard['bghome']) ? htmlspecialchars($dashboard['bghome'], ENT_QUOTES) : 'default.jpg'; ?>">
                                        <input type="file" class="form-control mb-3" id="image" name="image" onchange="previewImgUser()">
                                        <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>