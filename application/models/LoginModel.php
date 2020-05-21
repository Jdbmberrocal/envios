<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


    public function getLoginUsuario($usuario='', $contrasena='')
    {
        $this->db->select('idusuario, nombre_usuario, tipo');
        $this->db->from('usuario');
        $this->db->where('nombre_usuario', $usuario);
        $this->db->where('contrasena', $contrasena);
        $result = $this->db->get();
        if($result)
        {
            return $result->row();
        }else{
            return FALSE;
        }
        
    }

}