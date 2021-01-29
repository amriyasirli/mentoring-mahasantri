
    <!-- Required Js -->
	<script src="<?= base_url('assets/template/') ?>assets/js/vendor-all.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>assets/js/pcoded.min.js"></script>

    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>files\bower_components\bootstrap-datepicker\js\bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="<?= base_url('assets/') ?>files\bower_components\bootstrap-daterangepicker\js\daterangepicker.js"></script>
    <!-- Custom js -->

    <script type="text/javascript" src="<?= base_url('assets/') ?>files\assets\pages\advance-elements\custom-picker.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>files\assets\js\script.js"></script>

    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + '-' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
</script>


    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
  

  $(document).ready( function () {
        $('#myTable').DataTable();
        $('#perusahaan_tabel').DataTable();
        $('#tabel_bulanan').DataTable();
    } );

  
  </script>

</body>
</html>
