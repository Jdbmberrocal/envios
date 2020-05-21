
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mantenimiento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('mantenimiento')?>">Mantenimiento</a></li>
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
          <h3 class="card-title">Editar Control de Mantenimiento</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form role="form" action="<?=base_url('mantenimiento/actualizar')?>" method="POST" enctype="application/x-www-form-urlencoded">
              <input type="hidden" name="idmantenimiento" value="<?=$mantenimiento->idcontrolmantenimiento?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="placa">Placa del camión</label>
                            <select class="form-control" name="placa">
                            <option value="">Seleccione la placa de su Camión</option>
                            <?php foreach($camiones as $camion): ?>
                              <?php if ($camion->idcamion == $mantenimiento->idcamion): ?>
                                <option value="<?=$camion->idcamion?>" selected><?=$camion->placa?></option>
                              <?php else: ?>
                                <option value="<?=$camion->idcamion?>" <?php echo  set_select('placa', $camion->idcamion); ?>><?=$camion->placa?></option>
                              <?php endif ?>
                              <?php endforeach; ?>
                            </select>
                            <?php echo form_error("placa","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="text" class="form-control" name="fecha" placeholder="" value="<?=$mantenimiento->fecha?>">
                            <?php echo form_error("fecha","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="5" placeholder=""><?=$mantenimiento->descripcion?></textarea>
                            <?php echo form_error("descripcion","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
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