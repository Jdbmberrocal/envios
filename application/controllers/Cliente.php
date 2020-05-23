<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Clientes', 
            'pagina' => 'Listado de Clientes'
        );
        $this->load->model('ClienteModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['clientes'] = $this->ClienteModel->list();
		$this->load->view('cliente/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Clientes', 
            'pagina' => 'Agregar Cliente'
        );
        $this->load->model('ClienteModel');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
		$this->load->view('cliente/agregar');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function insertar()
    {
        if(!$this->session->userdata('login'))
        {
                header("Location: ".base_url('login'));
        }
        date_default_timezone_set("America/Bogota");
        $this->load->model('ClienteModel');
        $this->load->library('form_validation');

		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$direccion = $this->input->post('direccion');
		$telefono = $this->input->post('telefono');
		$correo = $this->input->post('correo');

		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("direccion","dirección","required|min_length[3]|max_length[200]|trim|regex_match[/^[A-Z0-9 -_áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("telefono","telefono","required|min_length[7]|max_length[10]|trim|numeric");
		$this->form_validation->set_rules("correo","correo","required|min_length[3]|max_length[255]|trim|valid_email");
		
		if($this->form_validation->run())
		{
            $fecha = date('Y-m-d');
			
			$data = array(
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'direccion' => $direccion,
				'telefono' => $telefono,
				'correo' => $correo,
				'fecha' => $fecha,
			);
            
            if($this->ClienteModel->addCliente($data))
            {
            redirect(base_url("cliente/"));
            }else{
            redirect(base_url("cliente/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}
    

    public function editar($idcliente)
	{
        $data = array(
            'titulo' => 'Clientes', 
            'pagina' => 'Editar Cliente'
        );
        $this->load->model('ClienteModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['cliente'] = $this->ClienteModel->getClienteId($idcliente);
		$this->load->view('cliente/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('ClienteModel');
	    $this->load->library('form_validation');

	    $idcliente = $this->input->post('idcliente');
	    $nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$direccion = $this->input->post('direccion');
		$telefono = $this->input->post('telefono');
		$correo = $this->input->post('correo');

		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("direccion","dirección","required|min_length[3]|max_length[200]|trim|regex_match[/^[A-Z0-9 -_áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("telefono","telefono","required|min_length[7]|max_length[10]|trim|numeric");
		$this->form_validation->set_rules("correo","correo","required|min_length[3]|max_length[255]|trim|valid_email");
		
        if($this->form_validation->run())
        {

            $data = array(
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'direccion' => $direccion,
				'telefono' => $telefono,
				'correo' => $correo,
				'fecha' => $fecha,
			);

            if($this->ClienteModel->update($idcliente,$data))
            {
                redirect(base_url("cliente"));
            }else{
                redirect(base_url("cliente/editar/".$idcliente));
            }

        }else{
            $this->editar($idcliente);
        }
	  }


		public function eliminar($idcliente='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('ClienteModel');

			if($this->ClienteModel->delete($idcliente))
			{
				redirect(base_url("cliente"));
			}else{
				redirect(base_url("cliente"));
			}
        }
        


}
