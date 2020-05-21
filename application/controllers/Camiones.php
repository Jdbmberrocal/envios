<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camiones extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Camiones', 
            'pagina' => 'Listado de camiones'
        );
        $this->load->model('CamionesModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['camiones'] = $this->CamionesModel->list();
		$this->load->view('camiones/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Camiones', 
            'pagina' => 'Editar Camión'
        );
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
		$this->load->view('camiones/agregar');
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
	$this->load->model('CamionesModel');
	$this->load->library('form_validation');

		$placa = $this->input->post('placa');
		$capacidad = $this->input->post('capacidad');

		$this->form_validation->set_rules("placa","placa","required|min_length[3]|max_length[7]|trim|regex_match[/^[A-Z0-9-]+$/i]");
		$this->form_validation->set_rules("capacidad","capacidad","required|min_length[2]|max_length[4]|trim|numeric");

		if($this->form_validation->run())
		{
			
			$data = array(
				'placa' => $placa,
				'capacidad' => $capacidad
			);
            
            if($this->CamionesModel->addCamion($data))
            {
            redirect(base_url("camiones/"));
            }else{
            redirect(base_url("camiones/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}
    

    public function editar($idcamion)
	{
        $data = array(
            'titulo' => 'Camiones', 
            'pagina' => 'Editar Camión'
        );
        $this->load->model('CamionesModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['camion'] = $this->CamionesModel->getCamionId($idcamion);
		$this->load->view('camiones/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('CamionesModel');
	    $this->load->library('form_validation');

	    $idcamion = $this->input->post('idcamion');
	    $placa = $this->input->post('placa');
	    $capacidad = $this->input->post('capacidad');

		$this->form_validation->set_rules("placa","placa","required|min_length[3]|max_length[7]|trim|regex_match[/^[A-Z0-9-]+$/i]");
	  	$this->form_validation->set_rules("capacidad","capacidad","required|min_length[2]|max_length[4]|trim|numeric");

        if($this->form_validation->run())
        {

            $data = array(
                'placa' => $placa,
                'capacidad' => $capacidad
            );

            if($this->CamionesModel->update($idcamion,$data))
            {
                redirect(base_url("camiones"));
            }else{
                redirect(base_url("camiones/editar/".$idcamion));
            }

        }else{
            $this->editar($idcamion);
        }
	  }


		public function eliminar($idcamion='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('CamionesModel');

			if($this->CamionesModel->delete($idcamion))
			{
				redirect(base_url("camiones"));
			}else{
				redirect(base_url("camiones"));
			}
        }
        


}
