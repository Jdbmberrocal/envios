<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Mantenimiento', 
            'pagina' => 'Listado de conductores'
        );
        $this->load->model('MantenimientoModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['mantenimientos'] = $this->MantenimientoModel->list();
		$this->load->view('mantenimiento/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Mantenimiento', 
            'pagina' => 'Editar Camión'
        );
        $this->load->model('CamionesModel');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['camiones'] = $this->CamionesModel->list();
		$this->load->view('mantenimiento/agregar', $data);
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
        $this->load->model('MantenimientoModel');
        $this->load->library('form_validation');

		$placa = $this->input->post('placa');
		$fecha = $this->input->post('fecha');
		$descripcion = $this->input->post('descripcion');

		$this->form_validation->set_rules("placa","placa","required|min_length[1]|max_length[7]|trim|numeric");
		$this->form_validation->set_rules("fecha","fecha","required|min_length[3]|max_length[12]|trim");
		$this->form_validation->set_rules("descripcion","descripción","min_length[10]|max_length[255]|trim");
		
		if($this->form_validation->run())
		{
			
			$data = array(
				'idcamion' => $placa,
				'fecha' => $fecha,
				'descripcion' => $descripcion,
			);
            
            if($this->MantenimientoModel->addMantenimiento($data))
            {
            redirect(base_url("mantenimiento/"));
            }else{
            redirect(base_url("mantenimiento/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}
    

    public function editar($idmantenimiento)
	{
        $data = array(
            'titulo' => 'Mantenimiento', 
            'pagina' => 'Editar Control de Mantenimiento'
        );
        $this->load->model('CamionesModel');
        $this->load->model('MantenimientoModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['mantenimiento'] = $this->MantenimientoModel->getMantenimientoId($idmantenimiento);
        $data['camiones'] = $this->CamionesModel->list();
		$this->load->view('mantenimiento/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('MantenimientoModel');
	    $this->load->library('form_validation');

	    $idmantenimiento = $this->input->post('idmantenimiento');
	    $placa = $this->input->post('placa');
		$fecha = $this->input->post('fecha');
		$descripcion = $this->input->post('descripcion');

		$this->form_validation->set_rules("placa","placa","required|min_length[1]|max_length[7]|trim|numeric");
		$this->form_validation->set_rules("fecha","fecha","required|min_length[3]|max_length[12]|trim");
		$this->form_validation->set_rules("descripcion","descripción","min_length[10]|max_length[255]|trim");
		
        if($this->form_validation->run())
        {

            $data = array(
				'idcamion' => $placa,
				'fecha' => $fecha,
				'descripcion' => $descripcion,
			);

            if($this->MantenimientoModel->update($idmantenimiento,$data))
            {
                redirect(base_url("mantenimiento"));
            }else{
                redirect(base_url("mantenimiento/editar/".$idmantenimiento));
            }

        }else{
            $this->editar($idmantenimiento);
        }
	  }


		public function eliminar($idmantenimiento='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('MantenimientoModel');

			if($this->MantenimientoModel->delete($idmantenimiento))
			{
				redirect(base_url("mantenimiento"));
			}else{
				redirect(base_url("mantenimiento"));
			}
        }
        


}
