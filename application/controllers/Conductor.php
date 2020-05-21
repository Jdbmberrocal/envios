<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductor extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Conductor', 
            'pagina' => 'Listado de conductores'
        );
        $this->load->model('ConductorModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['conductores'] = $this->ConductorModel->list();
		$this->load->view('conductor/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Camiones', 
            'pagina' => 'Editar Camión'
        );
        $this->load->model('CamionesModel');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['camiones'] = $this->CamionesModel->list();
		$this->load->view('conductor/agregar', $data);
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
        $this->load->model('ConductorModel');
        $this->load->library('form_validation');

		$placa = $this->input->post('placa');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$celular = $this->input->post('celular');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');

		$this->form_validation->set_rules("placa","placa","required|min_length[1]|max_length[7]|trim|numeric");
		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z0-9 áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z0-9 áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("celular","celular","required|exact_length[10]|trim|regex_match[/^[0-9 -()]+$/i]");
		$this->form_validation->set_rules("fecha_nacimiento","fecha_nacimiento","required|exact_length[10]|trim");

		if($this->form_validation->run())
		{
			
			$data = array(
				'idcamion' => $placa,
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'celular' => $celular,
				'fecha_nacimiento' => $fecha_nacimiento,
			);
            
            if($this->ConductorModel->addConductor($data))
            {
            redirect(base_url("conductor/"));
            }else{
            redirect(base_url("conductor/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}
    

    public function editar($idconductor)
	{
        $data = array(
            'titulo' => 'Conductor', 
            'pagina' => 'Editar Conductor'
        );
        $this->load->model('CamionesModel');
        $this->load->model('ConductorModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['conductor'] = $this->ConductorModel->getConductorId($idconductor);
        $data['camiones'] = $this->CamionesModel->list();
		$this->load->view('conductor/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('ConductorModel');
	    $this->load->library('form_validation');

	    $idconductor = $this->input->post('idconductor');
	    $placa = $this->input->post('placa');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$celular = $this->input->post('celular');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');

		$this->form_validation->set_rules("placa","placa","required|min_length[1]|max_length[7]|trim|numeric");
		$this->form_validation->set_rules("nombre","nombre","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z0-9 áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("apellidos","apellidos","required|min_length[3]|max_length[50]|trim|regex_match[/^[A-Z0-9 áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("celular","celular","required|exact_length[10]|trim|regex_match[/^[0-9 -()]+$/i]");
		$this->form_validation->set_rules("fecha_nacimiento","fecha_nacimiento","required|exact_length[10]|trim");

        if($this->form_validation->run())
        {

            $data = array(
				'idcamion' => $placa,
				'nombre' => $nombre,
				'apellidos' => $apellidos,
				'celular' => $celular,
				'fecha_nacimiento' => $fecha_nacimiento,
			);

            if($this->ConductorModel->update($idconductor,$data))
            {
                redirect(base_url("conductor"));
            }else{
                redirect(base_url("conductor/editar/".$idconductor));
            }

        }else{
            $this->editar($idconductor);
        }
	  }


		public function eliminar($idconductor='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('ConductorModel');

			if($this->ConductorModel->delete($idconductor))
			{
				redirect(base_url("conductor"));
			}else{
				redirect(base_url("conductor"));
			}
        }
        


}
