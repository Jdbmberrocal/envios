<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('login/login');
	}


	public function sesion()
  	{
    	$this->load->model('LoginModel');
    	$this->load->library('form_validation');

    	$usuario = $this->input->post('usuario');
    	$password  = $this->input->post('contrasena');

		$this->form_validation->set_rules("usuario","usuario","required|min_length[3]|max_length[25]|trim");
		$this->form_validation->set_rules("contrasena","contraseña","required|min_length[6]|max_length[20]|trim|regex_match[/^[A-Z0-9 -_áéíóúñÑÁÉÍÓÚ]+$/i]");

		if($this->form_validation->run())
		{
			$contrasena = sha1($password);
			$fila = $this->LoginModel->getLoginUsuario($usuario, $contrasena);

			if($fila != null)
			{
			
				$data = array(
					'idusuario' => $fila->idusuario,
					'usuario' => $fila->nombre_usuario,
					'tipo' => $fila->tipo,
					'login' => true
				);
				$this->session->set_userdata($data);
				header("Location: " . base_url("panel"));//aqui va la ruta a donde va a redirigir luego de haberse logeado
			
			}else{
					//header("Location: " . base_url());
			$this->session->set_flashdata("error", "El usuario o contraseña son incorrectos");
			redirect(base_url("login"));
			}
		}else{
			$this->index();
		}
	}

	public function salir()
	{
		if($this->session->userdata('login'))
	  {
			$this->session->sess_destroy();
	    header("Location: ".base_url('login'));
	  }
		header("Location: ".base_url('panel'));
	}


}
