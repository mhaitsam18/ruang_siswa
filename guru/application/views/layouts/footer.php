<!-- Footer Start -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <!-- <div class="col-12">
        2019 &copy; Shreyu. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="https://coderthemes.com/" target="_blank">Coderthemes</a>
      </div> -->
    </div>
  </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
<div class="rightbar-title">
<a href="javascript:void(0);" class="right-bar-toggle float-right">
  <i data-feather="x-circle"></i>
</a>
<h5 class="m-0">Customization</h5>
</div>
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="<?php echo base_url() ?>assets/js/vendor.min.js"></script>

<!-- optional plugins -->
<script src="<?php echo base_url() ?>assets/libs/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- page js -->
<script src="<?php echo base_url() ?>assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?php echo base_url() ?>assets/js/app.min.js"></script>


<!-- plugin js -->
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-core/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-bootstrap/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-daygrid/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-timegrid/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-list/main.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/fullcalendar-interaction/main.min.js"></script>

<!-- Calendar init -->
<script src="<?php echo base_url() ?>assets/js/pages/calendar.init.js"></script>

<!-- Tabel init -->
<script src="<?php echo base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.print.min.js"></script>

<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.select.min.js"></script>

<!-- Datatables init -->
<script src="<?php echo base_url() ?>assets/js/pages/datatables.init.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script type="text/javascript">
    const flashData = $('.flash-data').data('flashdata');
    const objek = $('.flash-data').data('objek');
    if (flashData) {
        //'Data ' + 
        Swal.fire({
            title: objek,
            text: flashData,
            icon: 'success'
        });
    }
    $('.tombol-hapus').on('click', function(e) {
        const hapus = $(this).data('hapus');
        const href = $(this).attr('href');
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data " + hapus + " akan dihapus!",
            icon: 'warning',
            confirmButtonText: 'Hapus',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });

    $('.tombol-terima').on('click', function(e) {
        const href = $(this).attr('href');
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Pesanan yang diterima, tidak dapat dikembalikan!",
            icon: 'warning',
            confirmButtonText: 'diterima',
            showCancelButton: true,
            confirmButtonColor: '#32a852',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
    $('.tombol-yakin').on('click', function(e) {
        const href = $(this).attr('href');
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "",
            icon: 'warning',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            showCancelButton: true,
            confirmButtonColor: '#32a852',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
    $('.minta-password').on('click', function(e) {
        Swal.fire({
            title: 'Masukkan Password',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Look up',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return fetch(`//api.github.com/users/${login}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                })
            }
        })
    });
</script>

</body>


</html>
