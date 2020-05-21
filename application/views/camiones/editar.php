
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Camiones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('camiones')?>">Camiones</a></li>
              <li class="breadcrumb-item active">editar</li>
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
          <h3 class="card-title">Editar camión</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form role="form" action="<?=base_url('camiones/actualizar')?>" method="POST" enctype="application/x-www-form-urlencoded">
              <input type="hidden" name="idcamion" value="<?=$camion->idcamion?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="placa">Placa del camión</label>
                            <input type="text" class="form-control" name="placa" placeholder="Placa del camión" value="<?=$camion->placa?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="placa">Capacidad del camión</label>
                            <input type="text" class="form-control" name="capacidad" placeholder="Capacidad del camión" value="<?=$camion->capacidad?>">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                  
                <button type="submit" class="btn btn-primary">Actualizar</button>
                
            </form>
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