<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</span>
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

<!-- Sweet alert init js-->
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

<?php $request = \Config\Services::request(); ?>

<?php if ($request->uri->getSegment(3) == "dashboard" && $request->uri->getSegment(2) == "admin") : ?>
    <!-- aplikasi kalender -->
    <script src="<?= base_url('minia/js/main.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/calendarsidesa.init.js'); ?>"></script>

<?php elseif ($request->uri->getSegment(3) == "dashboard" && $request->uri->getSegment(2) == "administrator") : ?>
    <!-- aplikasi kalender -->
    <script src="<?= base_url('minia/js/main.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/calendaradministrator.init.js'); ?>"></script>

<?php elseif ($request->uri->getSegment(3) == "dashboard" && $request->uri->getSegment(2) == "moderator") : ?>
    <!-- aplikasi kalender -->
    <script src="<?= base_url('minia/js/main.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/calendarmoderator.init.js'); ?>"></script>

<?php elseif ($request->uri->getSegment(3) == "editprofile") : ?>
    <script>
        function previewImgUser() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php elseif ($request->uri->getSegment(3) == "role_management") : ?>
    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        $(document).on('click', '#sa-parameter', function(e) {
            var id = $(this).parents("tr").attr("userid");
            var nip = $(this).parents("tr").attr("nip");

            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak ingin lagi user ini berada disini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, hapus!',
                    cancelButtonText: 'No, batalkan!',
                    confirmButtonClass: 'btn btn-success mt-2',
                    cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                    buttonsStyling: false
                })
                .then((result) => {
                    if (result.value) {
                        window.location = '<?= base_url('user/' . strtolower($rolak['role_akses']) . '/' . 'hapususer') ?>' + '/' + id + '/' + nip
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire(
                            'Cancelled',
                            'User tidak jadi dihapus :)',
                            'error',
                            '#5156be',
                        )
                    }
                })
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "registrasi_api") : ?>
    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        $(document).on('click', '#sa-parameter', function(e) {
            var id = $(this).parents("tr").attr("userid");

            Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak ingin lagi user ini mengakses API SIDesa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, hapus!',
                    cancelButtonText: 'No, batalkan!',
                    confirmButtonClass: 'btn btn-success mt-2',
                    cancelButtonClass: 'btn btn-danger ms-2 mt-2',
                    buttonsStyling: false
                })
                .then((result) => {
                    if (result.value) {
                        window.location = '<?= base_url('user/' . strtolower($rolak['role_akses']) . '/' . 'hapususerapi') ?>' + '/' + id
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire(
                            'Cancelled',
                            'User API tidak jadi dihapus :)',
                            'error',
                            '#5156be',
                        )
                    }
                })
        });
    </script>

<?php elseif ($request->uri->getSegment(2) == "datasidesa" || $request->uri->getSegment(2) == "notifikasi") : ?>
    <!-- Required datatable js -->
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTablesAP.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url('minia/js/pages/datatable-pages.init.js'); ?>"></script>

<?php elseif ($request->uri->getSegment(3) == "role_edit") : ?>
    <!-- aplikasi role edit -->
    <script src="<?= base_url('minia/libs/choices.js/public/assets/scripts/choices.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/form-advancedsidesa.init.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script src="<?= base_url('minia/js/pages/sweetalertsidesa.init.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $(document).on('click', '#roleedit', function(e) {
                document.getElementById("idpermendagri").value = $(this).attr('data-kode');
                document.getElementById("namadesa").value = $(this).attr('data-nama');
                $('.bs-example-modal-lg').modal('hide');
            });
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "role_access") : ?>
    <script>
        $('.admin-sidesa').on('click', function() {
            var csrfName = $('.txt_csrfname_sidesa').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sidesa').val(); // CSRF hash
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');
            $.ajax({
                url: "<?= base_url('user/admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId,
                    [csrfName]: csrfHash
                },
                success: function() {
                    document.location.href = "<?= base_url('user/admin/role_access'); ?>" + "/" + roleId;
                    // console.log(menuId);
                    // console.log(roleId);
                }
            })
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "role_accessadm") : ?>
    <script>
        $('.administrator-sidesa').on('click', function() {
            var csrfName = $('.txt_csrfname_sidesa').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sidesa').val(); // CSRF hash
            const menuIdad = $(this).data('menuad');
            const roleIdad = $(this).data('rolead');
            $.ajax({
                url: "<?= base_url('user/administrator/changeaccessadm'); ?>",
                type: 'post',
                data: {
                    menuIdad: menuIdad,
                    roleIdad: roleIdad,
                    [csrfName]: csrfHash
                },
                success: function() {
                    document.location.href = "<?= base_url('user/administrator/role_accessadm'); ?>" + "/" + roleIdad;
                    // console.log(menuId);
                    // console.log(roleId);
                }
            })
        });
    </script>

<?php elseif ($request->uri->getSegment(3) == "role_accessm") : ?>
    <script>
        $('.moderator-sidesa').on('click', function() {
            var csrfName = $('.txt_csrfname_sidesa').attr('name'); // CSRF Token name
            var csrfHash = $('.txt_csrfname_sidesa').val(); // CSRF hash
            const menuIdm = $(this).data('menum');
            const roleIdm = $(this).data('rolem');
            $.ajax({
                url: "<?= base_url('user/moderator/changeaccessm'); ?>",
                type: 'post',
                data: {
                    menuIdm: menuIdm,
                    roleIdm: roleIdm,
                    [csrfName]: csrfHash
                },
                success: function() {
                    document.location.href = "<?= base_url('user/moderator/role_accessm'); ?>" + "/" + roleIdm;
                    // console.log(menuId);
                    // console.log(roleId);
                }
            })
        });
    </script>

<?php elseif ($request->uri->getSegment(2) == "inputdata") : ?>
    <script>
        function previewImgUser() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php elseif ($request->uri->getSegment(3) == "jml_anggaran") : ?>
    <!-- format numbering rupiah untuk inputan yang ber id=rupiah -->
    <script>
        var rupiah1 = document.getElementById('danadesa1');
        rupiah1.addEventListener('keyup', function(e) {
            rupiah1.value = formatRupiah1(this.value, '');
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
            return prefix == undefined ? rupiah1 : (rupiah1 ? '' + rupiah1 : '');
        }
    </script>

    <script>
        var rupiah2 = document.getElementById('danadesa2');
        rupiah2.addEventListener('keyup', function(e) {
            rupiah2.value = formatRupiah2(this.value, '');
        });

        function formatRupiah2(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah2 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah2 += separator + ribuan.join('.');
            }

            rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
            return prefix == undefined ? rupiah2 : (rupiah2 ? '' + rupiah2 : '');
        }
    </script>

    <script>
        var rupiah3 = document.getElementById('danadesa3');
        rupiah3.addEventListener('keyup', function(e) {
            rupiah3.value = formatRupiah3(this.value, '');
        });

        function formatRupiah3(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah3 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah3 += separator + ribuan.join('.');
            }

            rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
            return prefix == undefined ? rupiah3 : (rupiah3 ? '' + rupiah3 : '');
        }
    </script>

    <script>
        var rupiah4 = document.getElementById('danadesa4');
        rupiah4.addEventListener('keyup', function(e) {
            rupiah4.value = formatRupiah4(this.value, '');
        });

        function formatRupiah4(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah4 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah4 += separator + ribuan.join('.');
            }

            rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
            return prefix == undefined ? rupiah4 : (rupiah4 ? '' + rupiah4 : '');
        }
    </script>

    <script>
        var rupiah5 = document.getElementById('danadesa5');
        rupiah5.addEventListener('keyup', function(e) {
            rupiah5.value = formatRupiah5(this.value, '');
        });

        function formatRupiah5(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah5 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah5 += separator + ribuan.join('.');
            }

            rupiah5 = split[1] != undefined ? rupiah5 + ',' + split[1] : rupiah5;
            return prefix == undefined ? rupiah5 : (rupiah5 ? '' + rupiah5 : '');
        }
    </script>

    <script>
        var rupiah6 = document.getElementById('danadesa6');
        rupiah6.addEventListener('keyup', function(e) {
            rupiah6.value = formatRupiah6(this.value, '');
        });

        function formatRupiah6(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah6 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah6 += separator + ribuan.join('.');
            }

            rupiah6 = split[1] != undefined ? rupiah6 + ',' + split[1] : rupiah6;
            return prefix == undefined ? rupiah6 : (rupiah6 ? '' + rupiah6 : '');
        }
    </script>

    <script>
        var rupiah7 = document.getElementById('danadesa7');
        rupiah7.addEventListener('keyup', function(e) {
            rupiah7.value = formatRupiah7(this.value, '');
        });

        function formatRupiah7(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah7 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah7 += separator + ribuan.join('.');
            }

            rupiah7 = split[1] != undefined ? rupiah7 + ',' + split[1] : rupiah7;
            return prefix == undefined ? rupiah7 : (rupiah7 ? '' + rupiah7 : '');
        }
    </script>

    <script>
        var rupiah8 = document.getElementById('danadesa8');
        rupiah8.addEventListener('keyup', function(e) {
            rupiah8.value = formatRupiah8(this.value, '');
        });

        function formatRupiah8(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah8 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah8 += separator + ribuan.join('.');
            }

            rupiah8 = split[1] != undefined ? rupiah8 + ',' + split[1] : rupiah8;
            return prefix == undefined ? rupiah8 : (rupiah8 ? '' + rupiah8 : '');
        }
    </script>

    <script>
        var rupiah9 = document.getElementById('danadesa9');
        rupiah9.addEventListener('keyup', function(e) {
            rupiah9.value = formatRupiah9(this.value, '');
        });

        function formatRupiah9(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah9 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah9 += separator + ribuan.join('.');
            }

            rupiah9 = split[1] != undefined ? rupiah9 + ',' + split[1] : rupiah9;
            return prefix == undefined ? rupiah9 : (rupiah9 ? '' + rupiah9 : '');
        }
    </script>

    <script>
        var rupiah10 = document.getElementById('danadesa10');
        rupiah10.addEventListener('keyup', function(e) {
            rupiah10.value = formatRupiah10(this.value, '');
        });

        function formatRupiah10(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah10 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah10 += separator + ribuan.join('.');
            }

            rupiah10 = split[1] != undefined ? rupiah10 + ',' + split[1] : rupiah10;
            return prefix == undefined ? rupiah10 : (rupiah10 ? '' + rupiah10 : '');
        }
    </script>

    <script>
        var rupiah11 = document.getElementById('danadesa11');
        rupiah11.addEventListener('keyup', function(e) {
            rupiah11.value = formatRupiah11(this.value, '');
        });

        function formatRupiah11(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah11 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah11 += separator + ribuan.join('.');
            }

            rupiah11 = split[1] != undefined ? rupiah11 + ',' + split[1] : rupiah11;
            return prefix == undefined ? rupiah11 : (rupiah11 ? '' + rupiah11 : '');
        }
    </script>

    <script>
        var rupiah12 = document.getElementById('danadesa12');
        rupiah12.addEventListener('keyup', function(e) {
            rupiah12.value = formatRupiah12(this.value, '');
        });

        function formatRupiah12(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah12 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah12 += separator + ribuan.join('.');
            }

            rupiah12 = split[1] != undefined ? rupiah12 + ',' + split[1] : rupiah12;
            return prefix == undefined ? rupiah12 : (rupiah12 ? '' + rupiah12 : '');
        }
    </script>

    <script>
        var rupiah13 = document.getElementById('danadesa13');
        rupiah13.addEventListener('keyup', function(e) {
            rupiah13.value = formatRupiah13(this.value, '');
        });

        function formatRupiah13(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah13 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah13 += separator + ribuan.join('.');
            }

            rupiah13 = split[1] != undefined ? rupiah13 + ',' + split[1] : rupiah13;
            return prefix == undefined ? rupiah13 : (rupiah13 ? '' + rupiah13 : '');
        }
    </script>

    <script>
        var rupiah14 = document.getElementById('danadesa14');
        rupiah14.addEventListener('keyup', function(e) {
            rupiah14.value = formatRupiah14(this.value, '');
        });

        function formatRupiah14(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah14 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah14 += separator + ribuan.join('.');
            }

            rupiah14 = split[1] != undefined ? rupiah14 + ',' + split[1] : rupiah14;
            return prefix == undefined ? rupiah14 : (rupiah14 ? '' + rupiah14 : '');
        }
    </script>

    <script>
        var rupiah15 = document.getElementById('danadesa15');
        rupiah15.addEventListener('keyup', function(e) {
            rupiah15.value = formatRupiah15(this.value, '');
        });

        function formatRupiah15(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah15 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah15 += separator + ribuan.join('.');
            }

            rupiah15 = split[1] != undefined ? rupiah15 + ',' + split[1] : rupiah15;
            return prefix == undefined ? rupiah15 : (rupiah15 ? '' + rupiah15 : '');
        }
    </script>

    <script>
        var rupiah16 = document.getElementById('danadesa16');
        rupiah16.addEventListener('keyup', function(e) {
            rupiah16.value = formatRupiah16(this.value, '');
        });

        function formatRupiah16(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah16 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah16 += separator + ribuan.join('.');
            }

            rupiah16 = split[1] != undefined ? rupiah16 + ',' + split[1] : rupiah16;
            return prefix == undefined ? rupiah16 : (rupiah16 ? '' + rupiah16 : '');
        }
    </script>

    <script>
        var rupiah17 = document.getElementById('danadesa17');
        rupiah17.addEventListener('keyup', function(e) {
            rupiah17.value = formatRupiah17(this.value, '');
        });

        function formatRupiah17(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah17 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah17 += separator + ribuan.join('.');
            }

            rupiah17 = split[1] != undefined ? rupiah17 + ',' + split[1] : rupiah17;
            return prefix == undefined ? rupiah17 : (rupiah17 ? '' + rupiah17 : '');
        }
    </script>

    <script>
        var rupiah18 = document.getElementById('danadesa18');
        rupiah18.addEventListener('keyup', function(e) {
            rupiah18.value = formatRupiah18(this.value, '');
        });

        function formatRupiah18(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah18 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah18 += separator + ribuan.join('.');
            }

            rupiah18 = split[1] != undefined ? rupiah18 + ',' + split[1] : rupiah18;
            return prefix == undefined ? rupiah18 : (rupiah18 ? '' + rupiah18 : '');
        }
    </script>

    <script>
        var rupiah19 = document.getElementById('danadesa19');
        rupiah19.addEventListener('keyup', function(e) {
            rupiah19.value = formatRupiah19(this.value, '');
        });

        function formatRupiah19(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah19 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah19 += separator + ribuan.join('.');
            }

            rupiah19 = split[1] != undefined ? rupiah19 + ',' + split[1] : rupiah19;
            return prefix == undefined ? rupiah19 : (rupiah19 ? '' + rupiah19 : '');
        }
    </script>

    <script>
        var rupiah20 = document.getElementById('danadesa20');
        rupiah20.addEventListener('keyup', function(e) {
            rupiah20.value = formatRupiah20(this.value, '');
        });

        function formatRupiah20(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah20 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah20 += separator + ribuan.join('.');
            }

            rupiah20 = split[1] != undefined ? rupiah20 + ',' + split[1] : rupiah20;
            return prefix == undefined ? rupiah20 : (rupiah20 ? '' + rupiah20 : '');
        }
    </script>

    <script>
        var rupiah21 = document.getElementById('danadesa21');
        rupiah21.addEventListener('keyup', function(e) {
            rupiah21.value = formatRupiah21(this.value, '');
        });

        function formatRupiah21(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah21 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah21 += separator + ribuan.join('.');
            }

            rupiah21 = split[1] != undefined ? rupiah21 + ',' + split[1] : rupiah21;
            return prefix == undefined ? rupiah21 : (rupiah21 ? '' + rupiah21 : '');
        }
    </script>

    <script>
        var rupiah22 = document.getElementById('danadesa22');
        rupiah22.addEventListener('keyup', function(e) {
            rupiah22.value = formatRupiah22(this.value, '');
        });

        function formatRupiah22(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah22 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah22 += separator + ribuan.join('.');
            }

            rupiah22 = split[1] != undefined ? rupiah22 + ',' + split[1] : rupiah22;
            return prefix == undefined ? rupiah22 : (rupiah22 ? '' + rupiah22 : '');
        }
    </script>

    <script>
        var rupiah23 = document.getElementById('danadesa23');
        rupiah23.addEventListener('keyup', function(e) {
            rupiah23.value = formatRupiah23(this.value, '');
        });

        function formatRupiah23(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah23 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah23 += separator + ribuan.join('.');
            }

            rupiah23 = split[1] != undefined ? rupiah23 + ',' + split[1] : rupiah23;
            return prefix == undefined ? rupiah23 : (rupiah23 ? '' + rupiah23 : '');
        }
    </script>

    <script>
        var rupiah24 = document.getElementById('danadesa24');
        rupiah24.addEventListener('keyup', function(e) {
            rupiah24.value = formatRupiah24(this.value, '');
        });

        function formatRupiah24(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah24 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah24 += separator + ribuan.join('.');
            }

            rupiah24 = split[1] != undefined ? rupiah24 + ',' + split[1] : rupiah24;
            return prefix == undefined ? rupiah24 : (rupiah24 ? '' + rupiah24 : '');
        }
    </script>

    <script>
        var rupiah25 = document.getElementById('danadesa25');
        rupiah25.addEventListener('keyup', function(e) {
            rupiah25.value = formatRupiah25(this.value, '');
        });

        function formatRupiah25(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah25 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah25 += separator + ribuan.join('.');
            }

            rupiah25 = split[1] != undefined ? rupiah25 + ',' + split[1] : rupiah25;
            return prefix == undefined ? rupiah25 : (rupiah25 ? '' + rupiah25 : '');
        }
    </script>

    <script>
        var rupiah26 = document.getElementById('danadesa26');
        rupiah26.addEventListener('keyup', function(e) {
            rupiah26.value = formatRupiah26(this.value, '');
        });

        function formatRupiah26(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah26 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah26 += separator + ribuan.join('.');
            }

            rupiah26 = split[1] != undefined ? rupiah26 + ',' + split[1] : rupiah26;
            return prefix == undefined ? rupiah26 : (rupiah26 ? '' + rupiah26 : '');
        }
    </script>

    <script>
        var rupiah27 = document.getElementById('danadesa27');
        rupiah27.addEventListener('keyup', function(e) {
            rupiah27.value = formatRupiah27(this.value, '');
        });

        function formatRupiah27(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah27 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah27 += separator + ribuan.join('.');
            }

            rupiah27 = split[1] != undefined ? rupiah27 + ',' + split[1] : rupiah27;
            return prefix == undefined ? rupiah27 : (rupiah27 ? '' + rupiah27 : '');
        }
    </script>

    <script>
        var rupiah28 = document.getElementById('danadesa28');
        rupiah28.addEventListener('keyup', function(e) {
            rupiah28.value = formatRupiah28(this.value, '');
        });

        function formatRupiah28(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah28 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah28 += separator + ribuan.join('.');
            }

            rupiah28 = split[1] != undefined ? rupiah28 + ',' + split[1] : rupiah28;
            return prefix == undefined ? rupiah28 : (rupiah28 ? '' + rupiah28 : '');
        }
    </script>

    <script>
        var rupiah29 = document.getElementById('danadesa29');
        rupiah29.addEventListener('keyup', function(e) {
            rupiah29.value = formatRupiah29(this.value, '');
        });

        function formatRupiah29(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah29 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah29 += separator + ribuan.join('.');
            }

            rupiah29 = split[1] != undefined ? rupiah29 + ',' + split[1] : rupiah29;
            return prefix == undefined ? rupiah29 : (rupiah29 ? '' + rupiah29 : '');
        }
    </script>
<?php endif; ?>

<?php if ($request->uri->getSegment(3) == "prioritas_penggunaan") : ?>
    <!-- format numbering rupiah untuk inputan yang ber id=rupiah -->
    <script>
        var reguler = document.getElementById('reguler');
        reguler.addEventListener('keyup', function(e) {
            reguler.value = formatReguler(this.value, '');
        });

        function formatReguler(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                reguler = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                reguler += separator + ribuan.join('.');
            }

            reguler = split[1] != undefined ? reguler + ',' + split[1] : reguler;
            return prefix == undefined ? reguler : (reguler ? '' + reguler : '');
        }
    </script>

    <script>
        var bltdd = document.getElementById('bltdd');
        bltdd.addEventListener('keyup', function(e) {
            bltdd.value = formatBltdd(this.value, '');
        });

        function formatBltdd(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                bltdd = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                bltdd += separator + ribuan.join('.');
            }

            bltdd = split[1] != undefined ? bltdd + ',' + split[1] : bltdd;
            return prefix == undefined ? bltdd : (bltdd ? '' + bltdd : '');
        }
    </script>

    <script>
        var kph = document.getElementById('kph');
        kph.addEventListener('keyup', function(e) {
            kph.value = formatKph(this.value, '');
        });

        function formatKph(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                kph = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                kph += separator + ribuan.join('.');
            }

            kph = split[1] != undefined ? kph + ',' + split[1] : kph;
            return prefix == undefined ? kph : (kph ? '' + kph : '');
        }
    </script>

    <script>
        var covid = document.getElementById('covid');
        covid.addEventListener('keyup', function(e) {
            covid.value = formatCovid(this.value, '');
        });

        function formatCovid(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                covid = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                covid += separator + ribuan.join('.');
            }

            covid = split[1] != undefined ? covid + ',' + split[1] : covid;
            return prefix == undefined ? covid : (covid ? '' + covid : '');
        }
    </script>

    <script>
        var kpm = document.getElementById('kpm');
        kpm.addEventListener('keyup', function(e) {
            kpm.value = formatKpm(this.value, '');
        });

        function formatKpm(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                kpm = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                kpm += separator + ribuan.join('.');
            }

            kpm = split[1] != undefined ? kpm + ',' + split[1] : kpm;
            return prefix == undefined ? kpm : (kpm ? '' + kpm : '');
        }
    </script>
<?php endif; ?>

<?php if ($request->uri->getSegment(3) == "salur" || $request->uri->getSegment(3) == "reguler" || $request->uri->getSegment(3) == "bltdd" || $request->uri->getSegment(3) == "kph" || $request->uri->getSegment(3) == "covid") : ?>
    <script>
        var januari = document.getElementById('januari');
        januari.addEventListener('keyup', function(e) {
            januari.value = formatJanuari(this.value, '');
        });

        function formatJanuari(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                januari = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                januari += separator + ribuan.join('.');
            }

            januari = split[1] != undefined ? januari + ',' + split[1] : januari;
            return prefix == undefined ? januari : (januari ? '' + januari : '');
        }
    </script>

    <script>
        var februari = document.getElementById('februari');
        februari.addEventListener('keyup', function(e) {
            februari.value = formatFebruari(this.value, '');
        });

        function formatFebruari(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                februari = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                februari += separator + ribuan.join('.');
            }

            februari = split[1] != undefined ? februari + ',' + split[1] : februari;
            return prefix == undefined ? februari : (februari ? '' + februari : '');
        }
    </script>

    <script>
        var maret = document.getElementById('maret');
        maret.addEventListener('keyup', function(e) {
            maret.value = formatMaret(this.value, '');
        });

        function formatMaret(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                maret = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                maret += separator + ribuan.join('.');
            }

            maret = split[1] != undefined ? maret + ',' + split[1] : maret;
            return prefix == undefined ? maret : (maret ? '' + maret : '');
        }
    </script>

    <script>
        var april = document.getElementById('april');
        april.addEventListener('keyup', function(e) {
            april.value = formatApril(this.value, '');
        });

        function formatApril(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                april = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                april += separator + ribuan.join('.');
            }

            april = split[1] != undefined ? april + ',' + split[1] : april;
            return prefix == undefined ? april : (april ? '' + april : '');
        }
    </script>

    <script>
        var mei = document.getElementById('mei');
        mei.addEventListener('keyup', function(e) {
            mei.value = formatMei(this.value, '');
        });

        function formatMei(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                mei = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                mei += separator + ribuan.join('.');
            }

            mei = split[1] != undefined ? mei + ',' + split[1] : mei;
            return prefix == undefined ? mei : (mei ? '' + mei : '');
        }
    </script>

    <script>
        var juni = document.getElementById('juni');
        juni.addEventListener('keyup', function(e) {
            juni.value = formatJuni(this.value, '');
        });

        function formatJuni(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                juni = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                juni += separator + ribuan.join('.');
            }

            juni = split[1] != undefined ? juni + ',' + split[1] : juni;
            return prefix == undefined ? juni : (juni ? '' + juni : '');
        }
    </script>

    <script>
        var juli = document.getElementById('juli');
        juli.addEventListener('keyup', function(e) {
            juli.value = formatJuli(this.value, '');
        });

        function formatJuli(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                juli = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                juli += separator + ribuan.join('.');
            }

            juli = split[1] != undefined ? juli + ',' + split[1] : juli;
            return prefix == undefined ? juli : (juli ? '' + juli : '');
        }
    </script>

    <script>
        var agustus = document.getElementById('agustus');
        agustus.addEventListener('keyup', function(e) {
            agustus.value = formatAgustus(this.value, '');
        });

        function formatAgustus(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                agustus = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                agustus += separator + ribuan.join('.');
            }

            agustus = split[1] != undefined ? agustus + ',' + split[1] : agustus;
            return prefix == undefined ? agustus : (agustus ? '' + agustus : '');
        }
    </script>

    <script>
        var september = document.getElementById('september');
        september.addEventListener('keyup', function(e) {
            september.value = formatSeptember(this.value, '');
        });

        function formatSeptember(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                september = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                september += separator + ribuan.join('.');
            }

            september = split[1] != undefined ? september + ',' + split[1] : september;
            return prefix == undefined ? september : (september ? '' + september : '');
        }
    </script>

    <script>
        var oktober = document.getElementById('oktober');
        oktober.addEventListener('keyup', function(e) {
            oktober.value = formatOktober(this.value, '');
        });

        function formatOktober(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                oktober = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                oktober += separator + ribuan.join('.');
            }

            oktober = split[1] != undefined ? oktober + ',' + split[1] : oktober;
            return prefix == undefined ? oktober : (oktober ? '' + oktober : '');
        }
    </script>

    <script>
        var november = document.getElementById('november');
        november.addEventListener('keyup', function(e) {
            november.value = formatNovember(this.value, '');
        });

        function formatNovember(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                november = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                november += separator + ribuan.join('.');
            }

            november = split[1] != undefined ? november + ',' + split[1] : november;
            return prefix == undefined ? november : (november ? '' + november : '');
        }
    </script>

    <script>
        var desember = document.getElementById('desember');
        desember.addEventListener('keyup', function(e) {
            desember.value = formatDesember(this.value, '');
        });

        function formatDesember(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                desember = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                desember += separator + ribuan.join('.');
            }

            desember = split[1] != undefined ? desember + ',' + split[1] : desember;
            return prefix == undefined ? desember : (desember ? '' + desember : '');
        }
    </script>
<?php endif; ?>

<?php if ($request->uri->getSegment(2) == "provinsi5a" && $request->uri->getSegment(3) == "dashboard") : ?>
    <script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>
    <script>
        Highcharts.setOptions({
            lang: {
                decimalPoint: ',',
                thousandsSep: '.'
            },
            colors: Highcharts.getOptions().colors.map(function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        // piechart postur danadesa provjateng
        Highcharts.chart('postur_danadesa', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'pie'
            },
            title: {
                text: 'POSTUR DANA DESA PROVINSI JAWA TENGAH'
            },
            subtitle: {
                text: 'Total Anggaran Rp. <?= number_format($grand_total_anggaran, 0, '', '.'); ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>Rp. {point.y:,.0f}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: Rp. {point.y:,.0f}',
                        connectorColor: 'silver'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                data: [{
                        name: 'Reguler (<?= $persen_reg ?>%)',
                        y: <?= $grand_total_reg ?>
                    },
                    {
                        name: 'BLTDD (<?= $persen_bltdd ?>%)',
                        y: <?= $grand_total_bltdd ?>
                    },
                    {
                        name: 'KPH (<?= $persen_kph ?>%)',
                        y: <?= $grand_total_kph ?>
                    },
                    {
                        name: 'Covid-19 (<?= $persen_covid ?>%)',
                        y: <?= $grand_total_covid ?>
                    },
                ]
            }]
        });

        // basicbar realisasi_danadesa
        Highcharts.chart('realisasi_danadesa_reguler', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'PERSENTASE CAPAIAN REALISASI DANADESA REGULER (<?= $persen_reg ?>%)'
            },
            subtitle: {
                text: 'Per Kabupaten'
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }, {
                linkedTo: 0,
                opposite: true,
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                data: [<?= $capaian_cilacap_reg ?>, <?= $capaian_banyumas_reg ?>, <?= $capaian_purbalingga_reg ?>, <?= $capaian_banjarnegara_reg ?>, <?= $capaian_kebumen_reg ?>, <?= $capaian_purworejo_reg ?>, <?= $capaian_wonosobo_reg ?>, <?= $capaian_magelang_reg ?>, <?= $capaian_boyolali_reg ?>, <?= $capaian_klaten_reg ?>, <?= $capaian_sukoharjo_reg ?>, <?= $capaian_wonogiri_reg ?>, <?= $capaian_karanganyar_reg ?>, <?= $capaian_sragen_reg ?>, <?= $capaian_grobogan_reg ?>, <?= $capaian_blora_reg ?>, <?= $capaian_rembang_reg ?>, <?= $capaian_pati_reg ?>, <?= $capaian_kudus_reg ?>, <?= $capaian_jepara_reg ?>, <?= $capaian_demak_reg ?>, <?= $capaian_semarang_reg ?>, <?= $capaian_temanggung_reg ?>, <?= $capaian_kendal_reg ?>, <?= $capaian_batang_reg ?>, <?= $capaian_pekalongan_reg ?>, <?= $capaian_pemalang_reg ?>, <?= $capaian_tegal_reg ?>, <?= $capaian_brebes_reg ?>],
                tooltip: {
                    valueSuffix: ' %'
                },
                showInLegend: false,
            }]
        });

        Highcharts.chart('realisasi_danadesa_bltdd', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'PERSENTASE CAPAIAN REALISASI DANADESA BLTDD (<?= $persen_bltdd ?>%)'
            },
            subtitle: {
                text: 'Per Kabupaten'
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }, {
                linkedTo: 0,
                opposite: true,
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                data: [<?= $capaian_cilacap_bltdd ?>, <?= $capaian_banyumas_bltdd ?>, <?= $capaian_purbalingga_bltdd ?>, <?= $capaian_banjarnegara_bltdd ?>, <?= $capaian_kebumen_bltdd ?>, <?= $capaian_purworejo_bltdd ?>, <?= $capaian_wonosobo_bltdd ?>, <?= $capaian_magelang_bltdd ?>, <?= $capaian_boyolali_bltdd ?>, <?= $capaian_klaten_bltdd ?>, <?= $capaian_sukoharjo_bltdd ?>, <?= $capaian_wonogiri_bltdd ?>, <?= $capaian_karanganyar_bltdd ?>, <?= $capaian_sragen_bltdd ?>, <?= $capaian_grobogan_bltdd ?>, <?= $capaian_blora_bltdd ?>, <?= $capaian_rembang_bltdd ?>, <?= $capaian_pati_bltdd ?>, <?= $capaian_kudus_bltdd ?>, <?= $capaian_jepara_bltdd ?>, <?= $capaian_demak_bltdd ?>, <?= $capaian_semarang_bltdd ?>, <?= $capaian_temanggung_bltdd ?>, <?= $capaian_kendal_bltdd ?>, <?= $capaian_batang_bltdd ?>, <?= $capaian_pekalongan_bltdd ?>, <?= $capaian_pemalang_bltdd ?>, <?= $capaian_tegal_bltdd ?>, <?= $capaian_brebes_bltdd ?>],
                tooltip: {
                    valuePrefix: 'Rp. '
                },
                showInLegend: false,
            }]
        });

        Highcharts.chart('realisasi_danadesa_kph', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'PERSENTASE CAPAIAN REALISASI DANADESA KETAHANAN PANGAN & HEWANI (<?= $persen_kph ?>%)'
            },
            subtitle: {
                text: 'Per Kabupaten'
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }, {
                linkedTo: 0,
                opposite: true,
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                data: [<?= $capaian_cilacap_kph ?>, <?= $capaian_banyumas_kph ?>, <?= $capaian_purbalingga_kph ?>, <?= $capaian_banjarnegara_kph ?>, <?= $capaian_kebumen_kph ?>, <?= $capaian_purworejo_kph ?>, <?= $capaian_wonosobo_kph ?>, <?= $capaian_magelang_kph ?>, <?= $capaian_boyolali_kph ?>, <?= $capaian_klaten_kph ?>, <?= $capaian_sukoharjo_kph ?>, <?= $capaian_wonogiri_kph ?>, <?= $capaian_karanganyar_kph ?>, <?= $capaian_sragen_kph ?>, <?= $capaian_grobogan_kph ?>, <?= $capaian_blora_kph ?>, <?= $capaian_rembang_kph ?>, <?= $capaian_pati_kph ?>, <?= $capaian_kudus_kph ?>, <?= $capaian_jepara_kph ?>, <?= $capaian_demak_kph ?>, <?= $capaian_semarang_kph ?>, <?= $capaian_temanggung_kph ?>, <?= $capaian_kendal_kph ?>, <?= $capaian_batang_kph ?>, <?= $capaian_pekalongan_kph ?>, <?= $capaian_pemalang_kph ?>, <?= $capaian_tegal_kph ?>, <?= $capaian_brebes_kph ?>],
                tooltip: {
                    valuePrefix: 'Rp. '
                },
                showInLegend: false,
            }]
        });

        Highcharts.chart('realisasi_danadesa_covid', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'PERSENTASE CAPAIAN REALISASI DANADESA COVID-19 (<?= $persen_covid ?>%)'
            },
            subtitle: {
                text: 'Per Kabupaten'
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }, {
                linkedTo: 0,
                opposite: true,
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                data: [<?= $capaian_cilacap_covid ?>, <?= $capaian_banyumas_covid ?>, <?= $capaian_purbalingga_covid ?>, <?= $capaian_banjarnegara_covid ?>, <?= $capaian_kebumen_covid ?>, <?= $capaian_purworejo_covid ?>, <?= $capaian_wonosobo_covid ?>, <?= $capaian_magelang_covid ?>, <?= $capaian_boyolali_covid ?>, <?= $capaian_klaten_covid ?>, <?= $capaian_sukoharjo_covid ?>, <?= $capaian_wonogiri_covid ?>, <?= $capaian_karanganyar_covid ?>, <?= $capaian_sragen_covid ?>, <?= $capaian_grobogan_covid ?>, <?= $capaian_blora_covid ?>, <?= $capaian_rembang_covid ?>, <?= $capaian_pati_covid ?>, <?= $capaian_kudus_covid ?>, <?= $capaian_jepara_covid ?>, <?= $capaian_demak_covid ?>, <?= $capaian_semarang_covid ?>, <?= $capaian_temanggung_covid ?>, <?= $capaian_kendal_covid ?>, <?= $capaian_batang_covid ?>, <?= $capaian_pekalongan_covid ?>, <?= $capaian_pemalang_covid ?>, <?= $capaian_tegal_covid ?>, <?= $capaian_brebes_covid ?>],
                tooltip: {
                    valuePrefix: 'Rp. '
                },
                showInLegend: false,
            }]
        });
    </script>
<?php endif; ?>

<?php if ($request->uri->getSegment(2) == "kabupaten5a" && $request->uri->getSegment(3) == "dashboard") : ?>
    <script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
    <script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>
    <script>
        Highcharts.setOptions({
            lang: {
                decimalPoint: ',',
                thousandsSep: '.'
            },
            colors: Highcharts.getOptions().colors.map(function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        Highcharts.chart('postur_danadesa_kab', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'pie'
            },
            title: {
                text: 'POSTUR DANA DESA'
            },
            subtitle: {
                text: 'Total Anggaran Rp. <?= number_format($anggaran_danadesa, 0, '', '.'); ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>Rp. {point.y:,.0f}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: Rp. {point.y:,.0f}',
                        connectorColor: 'silver'
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                data: [{
                        name: 'Reguler (<?= $persen_reg ?>%)',
                        y: <?= $grand_total_reg ?>
                    },
                    {
                        name: 'BLTDD (<?= $persen_bltdd ?>%)',
                        y: <?= $grand_total_bltdd ?>
                    },
                    {
                        name: 'KPH (<?= $persen_kph ?>%)',
                        y: <?= $grand_total_kph ?>
                    },
                    {
                        name: 'Covid-19 (<?= $persen_covid ?>%)',
                        y: <?= $grand_total_covid ?>
                    },
                ]
            }]
        });

        Highcharts.chart('capaian_danadesa', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                type: 'bar'
            },
            title: {
                text: 'PERSENTASE CAPAIAN REALISASI DANADESA'
            },
            subtitle: {
                text: 'Kabupaten <?= $kab ?>'
            },
            xAxis: {
                categories: ['Reguler', 'BLTDD', 'KPH', 'Covid-19'],
                title: {
                    text: null
                }
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'Persentase Realisasi (%)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                    }
                }
            }],
            plotOptions: {
                bar: {
                    dataLabels: {
                        formatter: function() {
                            return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                        },
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                data: [<?= $capaian_reg ?>, <?= $capaian_bltdd ?>, <?= $capaian_kph ?>, <?= $capaian_covid ?>],
                tooltip: {
                    valueSuffix: ' %'
                },
                showInLegend: false,
            }]
        });

        Highcharts.chart('realisasi_danadesa_reguler_bulanan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: 'REALISASI DANA DESA REGULER'
            },
            subtitle: {
                text: 'Kabupaten <?= $kab ?>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Realisasi (Rp.)'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                type: 'column',
                colorByPoint: true,
                data: [<?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['desember'] : 0 ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    valuePrefix: 'Rp. '
                },
            }]
        });

        Highcharts.chart('realisasi_danadesa_bltdd_bulanan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: 'REALISASI DANA DESA BLTDD'
            },
            subtitle: {
                text: 'Kabupaten <?= $kab ?>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Realisasi (Rp.)'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                type: 'column',
                colorByPoint: true,
                data: [<?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['desember'] : 0 ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    valuePrefix: 'Rp. '
                },
            }]
        });

        Highcharts.chart('realisasi_danadesa_kph_bulanan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: 'REALISASI DANA DESA KPH'
            },
            subtitle: {
                text: 'Kabupaten <?= $kab ?>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Realisasi (Rp.)'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                type: 'column',
                colorByPoint: true,
                data: [<?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['desember'] : 0 ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    valuePrefix: 'Rp. '
                },
            }]
        });

        Highcharts.chart('realisasi_danadesa_covid_bulanan', {
            chart: {
                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: 'REALISASI DANA DESA COVID-19'
            },
            subtitle: {
                text: 'Kabupaten <?= $kab ?>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                title: {
                    text: 'Realisasi (Rp.)'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Realisasi',
                type: 'column',
                colorByPoint: true,
                data: [<?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['desember'] : 0 ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    valuePrefix: 'Rp. '
                },
            }]
        });
    </script>
<?php endif; ?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>

</html>