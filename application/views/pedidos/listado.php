
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pedidos</h1>
            <a href="<?=base_url('pedidos/agregar')?>" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('pedidos')?>">Pedidos</a></li>
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
          <h3 class="card-title">Listado de pedidos</h3>
          

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
                        <th>Cliente</th>
                        <th>Conductor</th>
                        <th>Administrador</th>
                        <th>Kilogramos</th>
                        <th>Fecha Carga</th>
                        <th>Estado</th>
                        <th>Fecha Descarga</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pedidos as $pedido): ?>
                    <tr <?php if($pedido->estado == 'cancelado'){echo "class='table-danger'";}elseif($pedido->estado == 'entregado'){echo "class='table-success'";}elseif($pedido->estado == 'devuelto'){echo "class='table-warning'";}elseif($pedido->estado == 'pendiente'){echo "class='table-info'";} ?>>
                        <td><?=$pedido->nom_cliente.' '.$pedido->ape_cliente?></td>
                        <td><?=$pedido->nom_conductor.' '.$pedido->ape_conductor?></td>
                        <td><?=$pedido->nombre_usuario?></td>
                        <td><?=$pedido->kg?> kg</td>
                        <td><?=$pedido->fecha_carga.' - '.$pedido->hora_carga?></td>
                        <td><?=$pedido->estado?></td>
                        <td><?=$pedido->fecha_descarga.' - '.$pedido->hora_descarga?></td>
                        <td style="width: 100px;">
                          <div class="btn-group">
                            <a href="<?=base_url('pedidos/editar/'.$pedido->idpedido)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="<?=base_url('pedidos/visualizar/'.$pedido->idpedido)?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            <a href="<?=base_url('pedidos/eliminar/'.$pedido->idpedido)?>" onclick="if(!confirm('Quieres eliminar este registro?')){return false}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Cliente</th>
                      <th>Conductor</th>
                      <th>Administrador</th>
                      <th>Kilogramos</th>
                      <th>Fecha Carga</th>
                      <th>Estado</th>
                      <th>Fecha Descarga</th>
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