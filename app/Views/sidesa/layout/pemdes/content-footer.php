<?php $request = \Config\Services::request(); ?>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> . Sistem Informasi Desa . Provinsi Jawa Tengah</span>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('sidesa/layout/user/content-theme') ?>

<script src="<?= base_url('minia/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/node-waves/waves.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/feather-icons/feather.min.js'); ?>"></script>

<?php if ($request->uri->getSegment(3) === "editprofile") : ?>
    <!-- datepicker js -->
    <script src="<?= base_url('minia/libs/flatpickr/flatpickr.min.js'); ?>"></script>
    <!-- form mask -->
    <script src="<?= base_url('minia/libs/imask/imask.min.js'); ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?= base_url('minia/js/pages/form-advancedmember.init.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/form-maskindo.init.js'); ?>"></script>
<?php endif; ?>

<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- App js -->
<script src="<?= base_url('minia/js/app.js'); ?>"></script>

<!-- auto refreshnya notifikasi -->
<script>
    $('#refresh').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#refetch').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#reload').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });

    $('#recon').click(function() {
        setTimeout(location.reload.bind(location), 500);
    });
</script>


</body>

</html>