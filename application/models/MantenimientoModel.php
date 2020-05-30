<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MantenimientoModel extends CI_Model {


    public function list()
    {
        $result = $this->db->query("SELECT cm.idcontrolmantenimiento, c.placa, cm.fecha, cm.descripcion FROM controlmantenimiento cm, camion c WHERE c.idcamion = cm.idcamion ");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }
    
    public function getMantenimientosEntre2010Y2020()
    {
        $result = $this->db->query("SELECT YEAR(fecha) as 'anio', COUNT(*) as 'cantidad' FROM controlmantenimiento WHERE YEAR(fecha) BETWEEN '2010' AND '2020' GROUP BY YEAR(fecha)");
        if($result)
        {
            return $result->result();
        }else{
            return FALSE;
        }
        
    }

    public function getMantenimientoId($idcontrolmantenimiento)
    {
        $this->db->where('idcontrolmantenimiento',$idcontrolmantenimiento);
        $result = $this->db->get('controlmantenimiento');
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
    }


    public function addMantenimiento($data)
    {
        if ($this->db->insert('controlmantenimiento',$data)) {
            return true;
        }else{
            return false;
        }
    }

  public function addMantenimientoId($data)
  {
      if ($this->db->insert('controlmantenimiento',$data)) {
          return $this->db->insert_id();
      }else{
          return false;
      }
  }

  public function update($idcontrolmantenimiento, $data)
  {
      $this->db->where('idcontrolmantenimiento',$idcontrolmantenimiento);
      if ($this->db->update('controlmantenimiento',$data)) {
          return true;
      }else{
          return false;
      }
  }

  public function delete($idcontrolmantenimiento)
  {
      $this->db->where('idcontrolmantenimiento',$idcontrolmantenimiento);
      if ($this->db->delete('controlmantenimiento')) {
          return true;
      }else{
          return false;
      }
  }
}
