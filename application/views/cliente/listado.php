
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cliente</h1>
            <a href="<?=base_url('cliente/agregar')?>" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('cliente')?>">Cliente</a></li>
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
          <h3 class="card-title">Listado de clientes</h3>
          

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
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clientes as $cliente): ?>
                    <tr>
                        <td><?=$cliente->nombre?></td>
                        <td><?=$cliente->apellidos?></td>
                        <td><?=$cliente->direccion?></td>
                        <td><?=$cliente->telefono?></td>
                        <td><?=$cliente->correo?></td>
                        <td><?=$cliente->fecha?></td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                            <a href="<?=base_url('cliente/editar/'.$cliente->idclientes)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url('cliente/eliminar/'.$cliente->idclientes)?>" onclick="if(!confirm('Quieres eliminar este registro?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha</th>
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