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
        $this->load->model('ClienteModel');
        $this->load->model('ProductosModel');
        $this->load->model('PedidosModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['camion'] = $this->CamionesModel->getTotalCamiones();
        $data['cliente'] = $this->ClienteModel->getTotalClientes();
        $data['producto'] = $this->ProductosModel->getTotalProductos();
        $data['pedido'] = $this->PedidosModel->getTotalPedidos();
        $data['pedido_realizados'] = $this->PedidosModel->getUltimosPedidosRealizados();
		$this->load->view('panel/principal', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
}
