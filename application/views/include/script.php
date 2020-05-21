    <!-- jQuery -->
    <script src="<?=base_url('plantilla/')?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('plantilla/')?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('plantilla/')?>assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('plantilla/')?>assets/js/demo.js"></script>

    <?php if(($this->uri->segment(1) == 'camiones' || $this->uri->segment(1) == 'conductor' || $this->uri->segment(1) == 'mantenimiento') &&  $this->uri->segment(2) == ''): ?>

        <!-- DataTables -->
        <script src="<?=base_url('plantilla/')?>assets/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url('plantilla/')?>assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url('plantilla/')?>assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url('plantilla/')?>assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <script>
            $(function () {
                $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
            });
        </script>
    <?php endif; ?>

    <?php if(($this->uri->segment(1) == 'conductor' || $this->uri->segment(1) == 'mantenimiento') &&  ($this->uri->segment(2) == 'agregar' || $this->uri->segment(2) == 'insertar')): ?>

    <!-- DataTables -->
    <script src="<?=base_url('plantilla/')?>assets/moment/moment.min.js"></script>
    <script src="<?=base_url('plantilla/')?>assets/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <script>
  $(function () {
    //Formato del campo celular
    $('[data-mask]').inputmask()
  })
</script>
    

    <?php endif; ?>

</body>
</html>