<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClienteModel extends CI_Model {


    public function list()
    {
        $result = $this->db->get('clientes');
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }

    public function getClienteId($idclientes)
    {
        $this->db->where('idclientes',$idclientes);
        $result = $this->db->get('clientes');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addCliente($data)
    {
        if ($this->db->insert('clientes',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addClienteId($data)
  {
      if ($this->db->insert('clientes',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idclientes, $data)
  {
      $this->db->where('idclientes',$idclientes);
      if ($this->db->update('clientes',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idclientes)
  {
      $this->db->where('idclientes',$idclientes);
      if ($this->db->delete('clientes')) {
          return true;
      }else{
          return false;
      }
  }
}
