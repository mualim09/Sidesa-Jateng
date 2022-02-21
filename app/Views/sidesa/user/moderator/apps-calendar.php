<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content">
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
            <div class="col-12">

                <div class="row">
                    <div class="col-xl-3 col-lg-4" hidden>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Buat Rencana Baru hari ini
                                    </button>
                                </div>

                                <div id="external-events" class="mt-2">
                                    <br>
                                    <p class="text-muted">Drag and drop planning anda atau click pada kalender</p>
                                    <div class="external-event fc-event text-primary bg-soft-primary" data-class="bg-primary">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Out Of Town Duty
                                    </div>
                                    <div class="external-event fc-event text-success bg-soft-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                    </div>
                                    <div class="external-event fc-event text-info bg-soft-info" data-class="bg-info">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                    </div>
                                    <div class="external-event fc-event text-warning bg-soft-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                    </div>
                                    <div class="external-event fc-event text-danger bg-soft-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New Idea
                                    </div>
                                    <div class="external-event fc-event text-dark bg-soft-dark" data-class="bg-dark">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Team Meeting
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-12 col-sm-6">
                                        <img src="<?= base_url('minia/images/kalender.png') ?>" class="img-fluid d-block">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div>

                <div style='clear:both'></div>


                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0">
                                <h5 class="modal-title" id="modal-title">Event</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                            </div>
                            <div class="modal-body p-4">
                                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Acara</label>
                                                <input class="form-control" placeholder="Masukan nama event" type="text" name="title" id="event-title" required value="" />
                                                <div class="invalid-feedback">Masukan nama event yang valid</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select class="form-control form-select" name="category" id="event-category">
                                                    <option value="bg-primary">Ungu</option>
                                                    <option value="bg-success">Hijau</option>
                                                    <option value="bg-info">Biru</option>
                                                    <option value="bg-warning">Kuning</option>
                                                    <option value="bg-danger">Merah</option>
                                                    <option value="bg-dark">Hitam</option>
                                                </select>
                                                <div class="invalid-feedback">Pilih kategori event yang valid</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Hapus</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->

            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?= $this->include('sidesa/layout/user/content-footer') ?>