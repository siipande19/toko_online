<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/rating/bootstrap4-rating-input.js"></script> <!--penambahan-->
    <script src="<?php echo base_url() ?>assets/vendor/rating/5ac93d4ca8.js"></script><!--penambahan-->
    <script type="text/javascript">
        var base_url = "<?=base_url()?>";
            $('.rrr').on('change', function () {
                var id_invoice = $(this).attr('data-id_invoice');
                var kode_invoice = $(this).attr('data-kode_invoice');
                var id_barang = $(this).attr('data-id_barang');
                var value = $(this).val();
                // alert("Changed: " + $(this).val()+" ;;"+kode_invoice+" ;;"+id_barang)
                window.location = base_url+"pesanan/input_rating/"+id_invoice+"/"+kode_invoice+"/"+id_barang+"/"+value;

            });
    </script>
</body>

</html>