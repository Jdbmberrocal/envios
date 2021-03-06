
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mantenimiento</h1>
            <a href="<?=base_url('mantenimiento/agregar')?>" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('mantenimiento')?>">Mantenimiento</a></li>
              <li class="breadcrumb-item active">listado</li>
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
          <h3 class="card-title">Listado de controles de mantenimiento</h3>
          

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($mantenimientos as $control): ?>
                    <tr>
                        <td><?=$control->placa?></td>
                        <td><?=$control->fecha?></td>
                        <td><?=$control->descripcion?></td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                            <a href="<?=base_url('mantenimiento/editar/'.$control->idcontrolmantenimiento)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url('mantenimiento/eliminar/'.$control->idcontrolmantenimiento)?>" onclick="if(!confirm('Quieres eliminar este registro?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Placa</th>
                      <th>Fecha</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                    </tfoot>
                    </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->