<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {


	public function index()
	{
        if(!$this->session->userdata('login'))
        {
            header("Location: ".base_url('login'));
        }
        $data = array(
            'titulo' => 'Panel', 
            'pagina' => 'Reporte total del sistema'
        );
        $this->load->model('CamionesModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        //$data['camiones'] = $this->CamionesModel->list();
		$this->load->view('panel/principal');
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
}
