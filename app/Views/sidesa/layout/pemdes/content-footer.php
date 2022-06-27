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

<?php if ($request->uri->getSegment(3) === "sk_usaha") : ?>
    <!-- choices js -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>

    <!-- init js -->
    <script src="<?= base_url('minia/js/pages/form-advanced-dsonline.init.js') ?>"></script>
<?php endif; ?>

<?php if ($request->uri->getSegment(3) === "sk_hargatanah") : ?>
    <!-- choices js -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>

    <!-- init js -->
    <script src="<?= base_url('minia/js/pages/form-advanced-dsonline.init.js') ?>"></script>

    <!-- id = rupiah -->
    <script>
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <script>
        var rupiah1 = document.getElementById('rupiah1');
        rupiah1.addEventListener('keyup', function(e) {
            rupiah1.value = formatRupiah1(this.value, 'Rp. ');
        });

        function formatRupiah1(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah1 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah1 += separator + ribuan.join('.');
            }

            rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
            return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
        }
    </script>

    <script>
        var m2 = document.getElementById('m2');
        m2.addEventListener('keyup', function(e) {
            m2.value = formatM2(this.value, '');
        });

        function formatM2(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                m2 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                m2 += separator + ribuan.join('.');
            }

            m2 = split[1] != undefined ? m2 + ',' + split[1] : m2;
            return prefix == undefined ? m2 : (m2 ? '' + m2 : '');
        }
    </script>

    <script>
        var m21 = document.getElementById('m21');
        m21.addEventListener('keyup', function(e) {
            m21.value = formatM21(this.value, '');
        });

        function formatM21(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                m21 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                m21 += separator + ribuan.join('.');
            }

            m21 = split[1] != undefined ? m21 + ',' + split[1] : m21;
            return prefix == undefined ? m21 : (m21 ? '' + m21 : '');
        }
    </script>
<?php endif; ?>

<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- App js -->
<script src="<?= base_url('minia/js/app.js') ?>"></script>

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