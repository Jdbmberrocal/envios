    <!-- jQuery -->
    <script src="<?=base_url('plantilla/')?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('plantilla/')?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('plantilla/')?>assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('plantilla/')?>assets/js/demo.js"></script>

    <?php if(($this->uri->segment(1) == 'camiones' || $this->uri->segment(1) == 'conductor' || $this->uri->segment(1) == 'mantenimiento' || $this->uri->segment(1) == 'cliente' || $this->uri->segment(1) == 'pedidos' || $this->uri->segment(1) == 'zona' || $this->uri->segment(1) == 'usuario') &&  $this->uri->segment(2) == ''): ?>

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

    <?php if($this->uri->segment(1) == 'panel'): ?>

        <!-- Chart.js -->
        <script src="<?=base_url('plantilla/')?>assets/chart.js/Chart.min.js"></script>

        <script>
            $(function () {
                'use strict'

                var ticksStyle = {
                    fontColor: '#495057',
                    fontStyle: 'bold'
                }

                var mode      = 'index'
                var intersect = true

                var $salesChart = $('#sales-chart')
                var salesChart  = new Chart($salesChart, {
                    type   : 'bar',
                    data   : {
                    labels  : [
                        <?php foreach($pedidos_anio as $pa): ?> 
                        '<?=$pa->anio?>',
                        <?php endforeach; ?>
                    ],
                    datasets: [
                        {
                        backgroundColor: '#007bff',
                        borderColor    : '#007bff',
                        data           : [
                            <?php foreach($pedidos_anio as $pa): ?> 
                            <?=$pa->num_pedidos?>,
                            <?php endforeach; ?>
                        ]
                        }
                    ]
                    },
                    options: {
                    maintainAspectRatio: false,
                    tooltips           : {
                        mode     : mode,
                        intersect: intersect
                    },
                    hover              : {
                        mode     : mode,
                        intersect: intersect
                    },
                    legend             : {
                        display: false
                    },
                    scales             : {
                        yAxes: [{
                        // display: false,
                        gridLines: {
                            display      : true,
                            lineWidth    : '4px',
                            color        : 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks    : $.extend({
                            beginAtZero: true,

                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                            if (value >= 1000) {
                                value /= 1000
                                value += 'k'
                            }
                            return  value
                            }
                        }, ticksStyle)
                        }],
                        xAxes: [{
                        display  : true,
                        gridLines: {
                            display: false
                        },
                        ticks    : ticksStyle
                        }]
                    }
                    }
                })

                var $visitorsChart = $('#visitors-chart')
                var visitorsChart  = new Chart($visitorsChart, {
                    data   : {
                    //labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                    labels  : [
                        <?php foreach($mant_por_anio as $mpa): ?> 
                        '<?=$mpa->anio?>',
                        <?php endforeach; ?>
                        ],
                    datasets: [{
                        type                : 'line',
                        data                : [
                            <?php foreach($mant_por_anio as $mpa): ?> 
                            <?=$mpa->cantidad?>,
                            <?php endforeach; ?>
                        ],
                        backgroundColor     : 'transparent',
                        borderColor         : '#007bff',
                        pointBorderColor    : '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill                : false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    }]
                    },
                    options: {
                    maintainAspectRatio: false,
                    tooltips           : {
                        mode     : mode,
                        intersect: intersect
                    },
                    hover              : {
                        mode     : mode,
                        intersect: intersect
                    },
                    legend             : {
                        display: false
                    },
                    scales             : {
                        yAxes: [{
                        // display: false,
                        gridLines: {
                            display      : true,
                            lineWidth    : '4px',
                            color        : 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks    : $.extend({
                            beginAtZero : true,
                            suggestedMax: 20
                        }, ticksStyle)
                        }],
                        xAxes: [{
                        display  : true,
                        gridLines: {
                            display: false
                        },
                        ticks    : ticksStyle
                        }]
                    }
                    }
                })
            })
        </script>
    <?php endif; ?>

</body>
</html>