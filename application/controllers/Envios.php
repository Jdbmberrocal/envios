<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envios extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Envios', 
            'pagina' => 'Calcular costo de envío'
        );
        $this->load->library('form_validation');
        $this->load->model('ZonaModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['zonas'] = $this->ZonaModel->list();
		$this->load->view('envios/calcular', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function calcular()
    {
        if(!$this->session->userdata('login'))
        {
                header("Location: ".base_url('login'));
        }
        $this->load->library('form_validation');

		$zona = $this->input->post('zona');
		$peso = $this->input->post('peso');
		$ancho = $this->input->post('ancho');
		$alto = $this->input->post('alto');
        $total = 0;

		$this->form_validation->set_rules("zona","zona","required|min_length[1]|max_length[8]|trim|numeric");
		$this->form_validation->set_rules("peso","peso","required|min_length[1]|max_length[8]|numeric");
		$this->form_validation->set_rules("ancho","ancho","required|min_length[1]|max_length[8]|numeric");
		$this->form_validation->set_rules("alto","alto","required|min_length[1]|max_length[8]|numeric");
		
		if($this->form_validation->run())
		{
			
			$total = $zona + ($peso * $ancho * $alto)*1000;
            
            $this->session->set_flashdata("resultado", $total);
            redirect(base_url("envios"));
			

		}else{
			$this->index();
		}
	}

}
