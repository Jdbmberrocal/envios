<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Zona', 
            'pagina' => 'Listado de Zonas'
        );
        $this->load->model('ZonaModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['zonas'] = $this->ZonaModel->list();
		$this->load->view('zona/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Zona', 
            'pagina' => 'Agregar Zona'
        );
        $this->load->model('ZonaModel');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
		$this->load->view('include/menu');
		$this->load->view('zona/agregar');
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
        $this->load->model('ZonaModel');
        $this->load->library('form_validation');

		$nombre = $this->input->post('nombre');
		$codigo_postal = $this->input->post('codigo_postal');
		$costo = $this->input->post('costo');

		$this->form_validation->set_rules("nombre","nombre","required|min_length[1]|max_length[200]|trim|regex_match[/^[A-Z0-9 ._-áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("codigo_postal","código postal","required|min_length[2]|max_length[6]|trim|numeric");
		$this->form_validation->set_rules("costo","costo","required|exact_length[4]|trim|numeric");
		
		if($this->form_validation->run())
		{
			
			$data = array(
				'nombre' => $nombre,
				'codigo_postal' => $codigo_postal,
				'costo' => $costo
			);
            
            if($this->ZonaModel->addZona($data))
            {
            redirect(base_url("zona/"));
            }else{
            redirect(base_url("zona/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}

	
    public function editar($idzona)
	{
        $data = array(
            'titulo' => 'Zona', 
            'pagina' => 'Editar Zona'
        );
        $this->load->model('ZonaModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['zona'] = $this->ZonaModel->getZonaId($idzona);
        $this->load->view('zona/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('ZonaModel');
	    $this->load->library('form_validation');

	    $idzona = $this->input->post('idzona');
	    $nombre = $this->input->post('nombre');
		$codigo_postal = $this->input->post('codigo_postal');
		$costo = $this->input->post('costo');

		$this->form_validation->set_rules("nombre","nombre","required|min_length[1]|max_length[200]|trim|regex_match[/^[A-Z0-9 ._-áéíóúÁÉÍÓÚ]+$/i]");
		$this->form_validation->set_rules("codigo_postal","código postal","required|min_length[2]|max_length[6]|trim|numeric");
		$this->form_validation->set_rules("costo","costo","required|exact_length[4]|trim|numeric");
		
        if($this->form_validation->run())
        {

            $data = array(
				'nombre' => $nombre,
				'codigo_postal' => $codigo_postal,
				'costo' => $costo
			);

            if($this->ZonaModel->update($idzona,$data))
            {
                redirect(base_url("zona"));
            }else{
                redirect(base_url("zona/editar/".$idzona));
            }

        }else{
            $this->editar($idzona);
        }
	  }


		public function eliminar($idzona='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('ZonaModel');

			if($this->ZonaModel->delete($idzona))
			{
				redirect(base_url("zona"));
			}else{
				redirect(base_url("zona"));
			}
        }
        


}
