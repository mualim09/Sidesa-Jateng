<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="text-center">
        <p>Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Catatan Sipil Provinsi Jawa Tengah</p>
    </div>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Tanah Kas Desa</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah ini jika anda ingin mengakhiri session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('sitkd/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('sbadmin2/sb-admin-2.js'); ?>"></script>

<!-- datatables jq coy biar mantap tapi jangan kebanyakan pake datatables jq mbokan meledak -->
<script src="<?= base_url('datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- ajax buat urusan role access management punya admin-->
<script>
    $('.form-check-input-admin').on('click', function() {
        var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
        var csrfHash = $('.txt_csrfname').val(); // CSRF hash
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('sitkd/admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId,
                [csrfName]: csrfHash
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/admin/roleaccess/'); ?>" + "/" + roleId;

                // console.log(menuId);
                // console.log(roleId);
            }
        })
    });
</script>

<!-- ajax buat urusan role access management punya moderator-->
<script>
    $('.form-check-input-moderator').on('click', function() {
        const menuIdm = $(this).data('menum');
        const roleIdm = $(this).data('rolem');

        $.ajax({
            url: "<?= base_url('sitkd/moderator/changeaccess'); ?>",
            type: 'post',
            data: {
                menuIdm: menuIdm,
                roleIdm: roleIdm
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/moderator/roleaccess/'); ?>" + "/" + roleIdm;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile1 punya member di detailuraian-->
<script>
    $('#update1').on('click', function() {
        const keteranganfile1 = $(this).data('keteranganfile1');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile1'); ?>",
            type: 'post',
            data: {
                keteranganfile1: keteranganfile1,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile2 punya member di detailuraian-->
<script>
    $('#update2').on('click', function() {
        const keteranganfile2 = $(this).data('keteranganfile2');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile2'); ?>",
            type: 'post',
            data: {
                keteranganfile2: keteranganfile2,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile3 punya member di detailuraian-->
<script>
    $('#update3').on('click', function() {
        const keteranganfile3 = $(this).data('keteranganfile3');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile3'); ?>",
            type: 'post',
            data: {
                keteranganfile3: keteranganfile3,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile4 punya member di detailuraian-->
<script>
    $('#update4').on('click', function() {
        const keteranganfile4 = $(this).data('keteranganfile4');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile4'); ?>",
            type: 'post',
            data: {
                keteranganfile4: keteranganfile4,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile5 punya member di detailuraian-->
<script>
    $('#update5').on('click', function() {
        const keteranganfile5 = $(this).data('keteranganfile5');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile5'); ?>",
            type: 'post',
            data: {
                keteranganfile5: keteranganfile5,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile6 punya member di detailuraian-->
<script>
    $('#update6').on('click', function() {
        const keteranganfile6 = $(this).data('keteranganfile6');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile6'); ?>",
            type: 'post',
            data: {
                keteranganfile6: keteranganfile6,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile7 punya member di detailuraian-->
<script>
    $('#update7').on('click', function() {
        const keteranganfile7 = $(this).data('keteranganfile7');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile7'); ?>",
            type: 'post',
            data: {
                keteranganfile7: keteranganfile7,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile8 punya member di detailuraian-->
<script>
    $('#update8').on('click', function() {
        const keteranganfile8 = $(this).data('keteranganfile8');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile8'); ?>",
            type: 'post',
            data: {
                keteranganfile8: keteranganfile8,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile9 punya member di detailuraian-->
<script>
    $('#update9').on('click', function() {
        const keteranganfile9 = $(this).data('keteranganfile9');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile9'); ?>",
            type: 'post',
            data: {
                keteranganfile9: keteranganfile9,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile10 punya member di detailuraian-->
<script>
    $('#update10').on('click', function() {
        const keteranganfile10 = $(this).data('keteranganfile10');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile10'); ?>",
            type: 'post',
            data: {
                keteranganfile10: keteranganfile10,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile11 punya member di detailuraian-->
<script>
    $('#update11').on('click', function() {
        const keteranganfile11 = $(this).data('keteranganfile11');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile11'); ?>",
            type: 'post',
            data: {
                keteranganfile11: keteranganfile11,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile12 punya member di detailuraian-->
<script>
    $('#update12').on('click', function() {
        const keteranganfile12 = $(this).data('keteranganfile12');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile12'); ?>",
            type: 'post',
            data: {
                keteranganfile12: keteranganfile12,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile13 punya member di detailuraian-->
<script>
    $('#update13').on('click', function() {
        const keteranganfile13 = $(this).data('keteranganfile13');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile13'); ?>",
            type: 'post',
            data: {
                keteranganfile13: keteranganfile13,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile14 punya member di detailuraian-->
<script>
    $('#update14').on('click', function() {
        const keteranganfile14 = $(this).data('keteranganfile14');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile14'); ?>",
            type: 'post',
            data: {
                keteranganfile14: keteranganfile14,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile15 punya member di detailuraian-->
<script>
    $('#update15').on('click', function() {
        const keteranganfile15 = $(this).data('keteranganfile15');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile15'); ?>",
            type: 'post',
            data: {
                keteranganfile15: keteranganfile15,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- ajax buat urusan update keteranganfile16 punya member di detailuraian-->
<script>
    $('#update16').on('click', function() {
        const keteranganfile16 = $(this).data('keteranganfile16');
        const fileid = $(this).data('fileid');

        $.ajax({
            url: "<?= base_url('sitkd/member/hapusketeranganfile16'); ?>",
            type: 'post',
            data: {
                keteranganfile16: keteranganfile16,
                fileid: fileid
            },
            success: function() {
                document.location.href = "<?= base_url('sitkd/member/detailuraian/'); ?>" + "/" + fileid;
            }
        })
    });
</script>

<!-- format numbering rupiah untuk inputan yang ber id=rupiah -->
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

<!-- format numbering rupiah untuk inputan yang ber id=rupiah1 -->
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

<!-- format numbering m2 untuk inputan yang ber id=m2 -->
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

<!-- format numbering m2 untuk inputan yang ber id=m21 -->
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

<!-- Punya user member untuk milih 18 jenis kepentingan umum di modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();

        $(document).on('click', '#18jenis', function(e) {
            document.getElementById("kode").value = $(this).attr('data-kode');
            document.getElementById("jenis").value = $(this).attr('data-nama');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles1');

        $(document).on('click', '#reviewers1', function(e) {
            document.getElementById("keterangan1").value = $(this).attr('data-ket');
            document.getElementById("statusuraian1").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles2');

        $(document).on('click', '#reviewers2', function(e) {
            document.getElementById("keterangan2").value = $(this).attr('data-ket');
            document.getElementById("statusuraian2").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles3');

        $(document).on('click', '#reviewers3', function(e) {
            document.getElementById("keterangan3").value = $(this).attr('data-ket');
            document.getElementById("statusuraian3").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles4');

        $(document).on('click', '#reviewers4', function(e) {
            document.getElementById("keterangan4").value = $(this).attr('data-ket');
            document.getElementById("statusuraian4").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles5');

        $(document).on('click', '#reviewers5', function(e) {
            document.getElementById("keterangan5").value = $(this).attr('data-ket');
            document.getElementById("statusuraian5").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles6');

        $(document).on('click', '#reviewers6', function(e) {
            document.getElementById("keterangan6").value = $(this).attr('data-ket');
            document.getElementById("statusuraian6").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles7');

        $(document).on('click', '#reviewers7', function(e) {
            document.getElementById("keterangan7").value = $(this).attr('data-ket');
            document.getElementById("statusuraian7").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles8');

        $(document).on('click', '#reviewers8', function(e) {
            document.getElementById("keterangan8").value = $(this).attr('data-ket');
            document.getElementById("statusuraian8").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles9');

        $(document).on('click', '#reviewers9', function(e) {
            document.getElementById("keterangan9").value = $(this).attr('data-ket');
            document.getElementById("statusuraian9").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles10');

        $(document).on('click', '#reviewers10', function(e) {
            document.getElementById("keterangan10").value = $(this).attr('data-ket');
            document.getElementById("statusuraian10").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles11');

        $(document).on('click', '#reviewers11', function(e) {
            document.getElementById("keterangan11").value = $(this).attr('data-ket');
            document.getElementById("statusuraian11").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles12');

        $(document).on('click', '#reviewers12', function(e) {
            document.getElementById("keterangan12").value = $(this).attr('data-ket');
            document.getElementById("statusuraian12").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles13');

        $(document).on('click', '#reviewers13', function(e) {
            document.getElementById("keterangan13").value = $(this).attr('data-ket');
            document.getElementById("statusuraian13").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles14');

        $(document).on('click', '#reviewers14', function(e) {
            document.getElementById("keterangan14").value = $(this).attr('data-ket');
            document.getElementById("statusuraian14").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles15');

        $(document).on('click', '#reviewers15', function(e) {
            document.getElementById("keterangan15").value = $(this).attr('data-ket');
            document.getElementById("statusuraian15").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- Punya user moderator/admin untuk milih keterangan-file di select pada reviewfile brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reviewfiles16');

        $(document).on('click', '#reviewers16', function(e) {
            document.getElementById("keterangan16").value = $(this).attr('data-ket');
            document.getElementById("statusuraian16").value = $(this).attr('data-sta');
            $('#KeteranganModal').modal('hide');
        });
    });
</script>

<!-- buat preview gambar waktu edit profile -->
<script>
    function previewImg() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        const fileImage = new FileReader();
        fileImage.readAsDataURL(image.files[0]);
        fileImage.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<!-- buat preview pdf waktu member revisifile -->
<script>
    function previewPDF() {
        const pdf = document.querySelector('#file');
        const pdfPreview = document.querySelector('.pdf-preview');
        const filePDF = new FileReader();
        filePDF.readAsDataURL(pdf.files[0]);
        filePDF.onload = function(e) {
            pdfPreview.src = e.target.result;
        }
    }
</script>

<!-- Datatables Punya member dan moderator/admin untuk nampilin all notifikasi request mas dika brobrow -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#allnotifikasi').DataTable();
    });
</script>

<!-- supaya gada error resubmission (ntar aja nunggu upgrade CI4 aktifin)-->
<script>
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }
</script>

</body>

</html>