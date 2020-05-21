<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CamionesModel extends CI_Model {


    public function list()
    {
        $result = $this->db->get('camion');
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }

    public function getCamionId($idcamion)
    {
        $this->db->where('idcamion',$idcamion);
        $result = $this->db->get('camion');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addCamion($data)
    {
        if ($this->db->insert('camion',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addCamionId($data)
  {
      if ($this->db->insert('camion',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idcamion, $data)
  {
      $this->db->where('idcamion',$idcamion);
      if ($this->db->update('camion',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idcamion)
  {
      $this->db->where('idcamion',$idcamion);
      if ($this->db->delete('camion')) {
          return true;
      }else{
          return false;
      }
  }
}
