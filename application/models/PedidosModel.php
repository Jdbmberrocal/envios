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
