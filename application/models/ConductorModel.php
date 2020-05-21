<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConductorModel extends CI_Model {


    public function list()
    {
        $result = $this->db->query("SELECT c.idconductor, ca.placa, c.nombre, c.apellidos, c.celular, c.fecha_nacimiento FROM conductor c, camion ca WHERE ca.idcamion = c.idcamion");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }

    public function getConductorId($idconductor)
    {
        $this->db->where('idconductor',$idconductor);
        $result = $this->db->get('conductor');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addConductor($data)
    {
        if ($this->db->insert('conductor',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addConductorId($data)
  {
      if ($this->db->insert('conductor',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idconductor, $data)
  {
      $this->db->where('idconductor',$idconductor);
      if ($this->db->update('conductor',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idconductor)
  {
      $this->db->where('idconductor',$idconductor);
      if ($this->db->delete('conductor')) {
          return true;
      }else{
          return false;
      }
  }
}
