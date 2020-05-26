<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductosModel extends CI_Model {


    public function list()
    {
        $result = $this->db->get('usuario');
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }


    public function getTotalProductos()
    {
        $result = $this->db->query("SELECT COUNT(*) as 'total_productos' FROM productos");
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
        
    }
    
   
    public function getUsuarioId($idusuario)
    {
        $this->db->where('idusuario',$idusuario);
        $result = $this->db->get('usuario');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addUsuario($data)
    {
        if ($this->db->insert('usuario',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addUsuarioId($data)
  {
      if ($this->db->insert('usuario',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idusuario, $data)
  {
      $this->db->where('idusuario',$idusuario);
      if ($this->db->update('usuario',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idusuario)
  {
      $this->db->where('idusuario',$idusuario);
      if ($this->db->delete('usuario')) {
          return true;
      }else{
          return false;
      }
  }
}
