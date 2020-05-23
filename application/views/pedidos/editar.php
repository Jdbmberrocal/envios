
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
          <h3 class="card-title">Editar pedido</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <form role="form" action="<?=base_url('pedidos/actualizar')?>" method="POST" enctype="application/x-www-form-urlencoded">
              <input type="hidden" name="idpedido" value="<?=$pedido->idpedido?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <select class="form-control" name="cliente">
                            <option value="">Seleccione la placa de su Camión</option>
                            <?php foreach($clientes as $cliente): ?>
                              <?php if ($cliente->idclientes == $pedido->idclientes): ?>
                                <option value="<?=$cliente->idclientes?>" selected><?=$cliente->nombre.' '.$cliente->apellidos?></option>
                              <?php else: ?>
                                <option value="<?=$cliente->idclientes?>" <?php echo  set_select('cliente', $cliente->idclientes); ?>><?=$cliente->nombre.' '.$cliente->apellidos?></option>
                              <?php endif ?>
                              <?php endforeach; ?>
                            </select>
                            <?php echo form_error("cliente","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="conductor">Conductor</label>
                            <select class="form-control" name="conductor">
                            <option value="">Seleccione la placa de su Camión</option>
                            <?php foreach($conductores as $conductor): ?>
                              <?php if ($conductor->idconductor == $conductor->idconductor): ?>
                                <option value="<?=$conductor->idconductor?>" selected><?=$conductor->nombre.' '.$conductor->apellidos?></option>
                              <?php else: ?>
                                <option value="<?=$conductor->idconductor?>" <?php echo  set_select('conductor', $conductor->idconductor); ?>><?=$conductor->nombre.' '.$conductor->apellidos?></option>
                              <?php endif ?>
                              <?php endforeach; ?>
                            </select>
                            <?php echo form_error("conductor","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="factura">Código factura</label>
                            <input type="text" class="form-control" name="factura" placeholder="FAC-00000000" value="<?=$pedido->codigo_factura?>">
                            <?php echo form_error("factura","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="kg">Kilogramos</label>
                            <input type="text" class="form-control" name="kg" placeholder="" value="<?=$pedido->kg?>">
                            <?php echo form_error("kg","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha_carga">Fecha Carga</label>
                            <input type="date" class="form-control" name="fecha_carga" placeholder="3001234567"  value="<?=$pedido->fecha_carga?>">
                            <?php echo form_error("fecha_carga","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_carga">Hora Carga</label>
                            <input type="time" class="form-control" name="hora_carga" placeholder=""  value="<?=$pedido->hora_carga?>">
                            <?php echo form_error("hora_carga","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado">
                              <option value=""></option>
                              <?php if($pedido->estado == 'entregado'):?>
                                <option value="entregado" selected <?php echo  set_select('estado', 'entregado'); ?>>Entregado</option>
                                <option value="pendiente" <?php echo  set_select('estado', 'pendiente'); ?>>Pendiente</option>
                                <option value="devuelto" <?php echo  set_select('estado', 'devuelto'); ?>>Devuelto</option>
                                <option value="cancelado" <?php echo  set_select('estado', 'cancelado'); ?>>Cancelado</option>
                                <?php elseif($pedido->estado == 'pendiente'):?>
                                <option value="entregado" <?php echo  set_select('estado', 'entregado'); ?>>Entregado</option>
                                <option value="pendiente" selected <?php echo  set_select('estado', 'pendiente'); ?>>Pendiente</option>
                                <option value="devuelto" <?php echo  set_select('estado', 'devuelto'); ?>>Devuelto</option>
                                <option value="cancelado" <?php echo  set_select('estado', 'cancelado'); ?>>Cancelado</option>
                                <?php elseif($pedido->estado == 'devuelto'):?>
                                <option value="entregado" <?php echo  set_select('estado', 'entregado'); ?>>Entregado</option>
                                <option value="pendiente" <?php echo  set_select('estado', 'pendiente'); ?>>Pendiente</option>
                                <option value="devuelto" selected <?php echo  set_select('estado', 'devuelto'); ?>>Devuelto</option>
                                <option value="cancelado" <?php echo  set_select('estado', 'cancelado'); ?>>Cancelado</option>
                                <?php elseif($pedido->estado == 'cancelado'):?>
                                <option value="entregado" <?php echo  set_select('estado', 'entregado'); ?>>Entregado</option>
                                <option value="pendiente" <?php echo  set_select('estado', 'pendiente'); ?>>Pendiente</option>
                                <option value="devuelto" <?php echo  set_select('estado', 'devuelto'); ?>>Devuelto</option>
                                <option value="cancelado" selected <?php echo  set_select('estado', 'cancelado'); ?>>Cancelado</option>
                                <?php endif; ?>

                            </select>
                            <?php echo form_error("estado","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha_descarga">Fecha Descarga</label>
                            <input type="date" class="form-control" name="fecha_descarga" placeholder="3001234567"  value="<?=$pedido->fecha_descarga?>">
                            <?php echo form_error("fecha_descarga","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_descarga">Hora Descarga</label>
                            <input type="time" class="form-control" name="hora_descarga" placeholder="12:00 pm"  value="<?=$pedido->hora_descarga?>">
                            <?php echo form_error("hora_descarga","<span class='text-danger'>","</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea name="observaciones" cols="30" class="form-control"><?=$pedido->observaciones?></textarea>
                            <?php echo form_error("observaciones","<span class='text-danger'>","</span>"); ?>
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