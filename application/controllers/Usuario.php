<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Usuario', 
            'pagina' => 'Listado de Usuarios'
        );
        $this->load->model('UsuarioModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['usuarios'] = $this->UsuarioModel->list();
		$this->load->view('usuario/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Usuario', 
            'pagina' => 'Agregar Usuario'
        );
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
		$this->load->view('usuario/agregar');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function insertar()
    {
        if(!$this->session->userdata('login'))
        {
                header("Location: ".base_url('login'));
        }
        $this->load->model('UsuarioModel');
        $this->load->library('form_validation');

		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$usuario = $this->input->post('usuario');
		$contrasena = $this->input->post('contrasena');
		$ccontrasena = $this->input->post('ccontrasena');
        
        
		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("usuario","usuario","required|min_length[3]|max_length[200]|trim|regex_match[/^[A-Z0-9-_áéíóúÁÉÍÓÚ]+$/i]|is_unique[usuario.nombre_usuario]");
		$this->form_validation->set_rules("contrasena","contraseña","required|min_length[8]|max_length[30]|trim|regex_match[/^[A-Z0-9 -_áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("ccontrasena","Confirmar contraseña","required|min_length[8]|max_length[30]|trim|regex_match[/^[A-Z0-9 -_áéíóúÁÉÍÓÚ]+$/i]|matches[contrasena]");
		
		if($this->form_validation->run())
		{
            $tipo = "admin";
			
			$data = array(
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'nombre_usuario' => $usuario,
				'contrasena' => sha1($contrasena),
				'tipo' => $tipo
			);
            
            if($this->UsuarioModel->addUsuario($data))
            {
            redirect(base_url("usuario/"));
            }else{
            redirect(base_url("usuario/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}
    

    public function editar($idusuario)
	{
        $data = array(
            'titulo' => 'Usuario', 
            'pagina' => 'Editar Usuario'
        );
        $this->load->model('UsuarioModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['usuario'] = $this->UsuarioModel->getUsuarioId($idusuario);
		$this->load->view('usuario/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('UsuarioModel');
	    $this->load->library('form_validation');

	    $idusuario = $this->input->post('idusuario');
	    $nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$usuario = $this->input->post('usuario');
        
        
		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("usuario","usuario","required|min_length[3]|max_length[200]|trim|regex_match[/^[A-Z0-9-_áéíóúÁÉÍÓÚ]+$/i]");
		
        if($this->form_validation->run())
        {

            $data = array(
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'nombre_usuario' => $usuario
			);

            if($this->UsuarioModel->update($idusuario,$data))
            {
                redirect(base_url("usuario"));
            }else{
                redirect(base_url("usuario/editar/".$idusuario));
            }

        }else{
            $this->editar($idusuario);
        }
	  }


		public function eliminar($idusuario='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('UsuarioModel');

			if($this->UsuarioModel->delete($idusuario))
			{
				redirect(base_url("usuario"));
			}else{
				redirect(base_url("usuario"));
			}
        }
        


}
