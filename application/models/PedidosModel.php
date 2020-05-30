<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PedidosModel extends CI_Model {


    public function list()
    {
        $result = $this->db->query("SELECT p.idpedido, c.nombre as 'nom_cliente', c.apellidos as 'ape_cliente', cd.nombre as 'nom_conductor', cd.apellidos as 'ape_conductor', u.nombre_usuario, p.codigo_factura, p.kg, p.fecha_carga, p.hora_carga, p.estado, p.observaciones, p.fecha_descarga, p.hora_descarga FROM pedido p, clientes c, conductor cd, usuario u WHERE c.idclientes = p.idclientes AND cd.idconductor = p.idconductor AND u.idusuario = p.idusuario");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    public function getViewPedidoId($idpedido = '')
    {
        $result = $this->db->query("SELECT p.idpedido, c.nombre as 'nom_cliente', c.apellidos as 'ape_cliente', cd.nombre as 'nom_conductor', cd.apellidos as 'ape_conductor', u.nombre_usuario, p.codigo_factura, p.kg, p.fecha_carga, p.hora_carga, p.estado, p.observaciones, p.fecha_descarga, p.hora_descarga FROM pedido p, clientes c, conductor cd, usuario u WHERE c.idclientes = p.idclientes AND cd.idconductor = p.idconductor AND u.idusuario = p.idusuario AND p.idpedido = '".$idpedido."'");
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
        
    }

    public function getTotalPedidos()
    {
        $result = $this->db->query("SELECT COUNT(*) as 'total_pedidos' FROM pedido");
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
        
    }
    
    public function getUltimosPedidosRealizados()
    {
        $result = $this->db->query("SELECT pr.nombre, pr.codigo, pd.codigo_factura, c.nombre as 'cnombre', c.apellidos FROM pedido pd, productos pr, clientes c WHERE pr.idproductos = pd.idproductos AND c.idclientes = pd.idclientes ORDER BY pd.idpedido ASC LIMIT 7 ");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    public function getProductosPorCategorias()
    {
        $result = $this->db->query("SELECT categoria, COUNT(*) as 'cantidad' FROM productos WHERE 1 GROUP BY categoria");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    public function getNumeroPedidosEntre2000Y2020()
    {
        $result = $this->db->query("SELECT YEAR(fecha_carga) as 'anio', COUNT(*) as 'num_pedidos' FROM pedido WHERE YEAR(fecha_carga) BETWEEN '2000' AND '2020' GROUP BY YEAR(fecha_carga)");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }

    public function getPedidoId($idpedido)
    {
        $this->db->where('idpedido',$idpedido);
        $result = $this->db->get('pedido');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addPedido($data)
    {
        if ($this->db->insert('pedido',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addPedidoId($data)
  {
      if ($this->db->insert('pedido',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idpedido, $data)
  {
      $this->db->where('idpedido',$idpedido);
      if ($this->db->update('pedido',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idpedido)
  {
      $this->db->where('idpedido',$idpedido);
      if ($this->db->delete('pedido')) {
          return true;
      }else{
          return false;
      }
  }
}
