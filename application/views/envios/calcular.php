
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Envíos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('envios')?>">Envíos</a></li>
              <li class="breadcrumb-item active">calcular envíos</li>
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
          <h3 class="card-title">Calcular envíos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form role="form" method="POST" action="<?=base_url('envios/calcular')?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="zona">Zona</label>
                          <select class="form-control" name="zona">
                            <option value="">Seleccione la zona del envío</option>
                            <?php foreach($zonas as $zona): ?>
                              <option value="<?=$zona->costo?>" <?php echo  set_select('zona', $zona->costo); ?>><?=$zona->nombre?></option>
                            <?php endforeach; ?>
                          </select>
                          <?php echo form_error("zona","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="text" class="form-control" name="peso" placeholder="kg" value="<?php echo set_value("peso") ?>">
                            <?php echo form_error("peso","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ancho">Ancho</label>
                            <input type="text" class="form-control" name="ancho" placeholder="mtrs" value="<?php echo set_value("ancho") ?>">
                            <?php echo form_error("ancho","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="alto">Alto</label>
                            <input type="text" class="form-control" name="alto" placeholder="mtrs"  value="<?php echo set_value("alto") ?>">
                            <?php echo form_error("alto","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="total">Costo total</label>
                            <input type="text" class="form-control" disabled name="total" placeholder="$00000" value="<?=number_format($this->session->flashdata("resultado"),0);?>">
                            <?php echo form_error("total","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                </div>
                  
                <button type="submit" class="btn btn-success">Guardar</button>
                
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