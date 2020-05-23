<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZonaModel extends CI_Model {


    public function list()
    {
        $result = $this->db->get('zona');
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    

    public function getZonaId($idzona)
    {
        $this->db->where('idzona',$idzona);
        $result = $this->db->get('zona');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addZona($data)
    {
        if ($this->db->insert('zona',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addZonaId($data)
  {
      if ($this->db->insert('zona',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idzona, $data)
  {
      $this->db->where('idzona',$idzona);
      if ($this->db->update('zona',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idzona)
  {
      $this->db->where('idzona',$idzona);
      if ($this->db->delete('zona')) {
          return true;
      }else{
          return false;
      }
  }
}
