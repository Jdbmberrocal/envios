
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('pedidos')?>">Pedidos</a></li>
              <li class="breadcrumb-item active">visualizar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Visualizar pedidos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="position-relative p-3 bg-gray" style="height: 280px">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-secondary">
                                <?=$pedido->estado?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                Cliente <br>
                                <small><?=$pedido->nom_cliente.' '.$pedido->ape_cliente?></small>    
                            </div>
                            <div class="col-md-4">
                                <br>Conductor <br>
                                <small><?=$pedido->nom_conductor.' '.$pedido->ape_conductor?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Usuario Administrador <br>
                                <small><?=$pedido->nombre_usuario?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Código factura <br>
                                <small><?=$pedido->codigo_factura?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Kilogramos <br>
                                <small><?=$pedido->kg?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Fecha Carga <br>
                                <small><?=$pedido->fecha_carga.' - '.$pedido->hora_carga?></small>
                        
                            </div>
                            <div class="col-md-4">
                                <br>Estado <br>
                                <small><?=$pedido->estado?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Observaciones <br>
                                <small><?=$pedido->observaciones?></small>
                            </div>
                            <div class="col-md-4">
                                <br>Fecha Descarga <br>
                                <small><?=$pedido->fecha_descarga.' - '.$pedido->hora_descarga?></small>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->