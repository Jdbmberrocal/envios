<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function index()
	{
        $data = array(
            'titulo' => 'Pedidos', 
            'pagina' => 'Listado de Pedidos'
        );
        $this->load->model('PedidosModel');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['pedidos'] = $this->PedidosModel->list();
		$this->load->view('pedidos/listado', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }


    public function agregar()
	{
        $data = array(
            'titulo' => 'Pedidos', 
            'pagina' => 'Agregar Pedido'
        );
        $this->load->model('ClienteModel');
        $this->load->model('ConductorModel');
        $this->load->library('form_validation');
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
		$this->load->view('include/menu');
		$data['clientes'] = $this->ClienteModel->list();
		$data['conductores'] = $this->ConductorModel->list();
		$this->load->view('pedidos/agregar', $data);
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
        $this->load->model('PedidosModel');
        $this->load->library('form_validation');

		$clientes = $this->input->post('clientes');
		$conductor = $this->input->post('conductor');
		$factura = $this->input->post('factura');
		$kg = $this->input->post('kg');
		$fecha_carga = $this->input->post('fecha_carga');
		$hora_carga = $this->input->post('hora_carga');
		$estado = $this->input->post('estado');
		$fecha_descarga = $this->input->post('fecha_descarga');
		$hora_descarga = $this->input->post('hora_descarga');
		$observaciones = $this->input->post('observaciones');

		$this->form_validation->set_rules("clientes","clientes","required|min_length[1]|max_length[50]|trim|numeric");
		$this->form_validation->set_rules("conductor","conductor","required|min_length[1]|max_length[50]|trim|numeric");
		$this->form_validation->set_rules("factura","factura","required|exact_length[12]|trim|regex_match[/^[A-Z0-9-]+$/i]");
		$this->form_validation->set_rules("kg","kilogramos","required|min_length[1]|max_length[2]|trim|numeric");
		$this->form_validation->set_rules("fecha_carga","fecha carga","required|trim");
		$this->form_validation->set_rules("hora_carga","hora carga","required|trim");
		$this->form_validation->set_rules("estado","estado","required|min_length[7]|max_length[10]|trim|regex_match[/^[A-Z]+$/i]");
		$this->form_validation->set_rules("fecha_descarga","fecha descarga","trim");
		$this->form_validation->set_rules("hora_descarga","hora descarga","trim");
		$this->form_validation->set_rules("observaciones","observaciones","min_length[5]|max_length[255]|trim");
		
		if($this->form_validation->run())
		{
			$fecha = date('Y-m-d');
			$idusuario = $this->session->userdata('idusuario');
			
			$data = array(
				'idclientes' => $clientes,
				'idconductor' => $conductor,
				'idusuario' => $idusuario,
				'codigo_factura' => $factura,
				'kg' => $kg,
				'fecha_carga' => $fecha_carga,
				'hora_carga' => $hora_carga,
				'estado' => $estado,
				'fecha_descarga' => $fecha_descarga,
				'hora_descarga' => $hora_descarga,
				'observaciones' => $observaciones,
			);
            
            if($this->PedidosModel->addPedido($data))
            {
            redirect(base_url("pedidos/"));
            }else{
            redirect(base_url("pedidos/agregar"));
            }
			

		}else{
			$this->agregar();
		}
	}

	public function visualizar($idpedidos)
	{
        $data = array(
            'titulo' => 'Pedidos', 
            'pagina' => 'Visualizar Pedido'
        );
        $this->load->model('PedidosModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['pedido'] = $this->PedidosModel->getViewPedidoId($idpedidos);
		$this->load->view('pedidos/visualizar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function editar($idpedido)
	{
        $data = array(
            'titulo' => 'Pedidos', 
            'pagina' => 'Editar Pedido'
        );
        $this->load->model('PedidosModel');
        $this->load->model('ClienteModel');
        $this->load->model('ConductorModel');
        $this->load->library('form_validation');
        
		$this->load->view('include/head', $data);
		$this->load->view('include/barra');
        $this->load->view('include/menu');
        $data['pedido'] = $this->PedidosModel->getPedidoId($idpedido);
        $data['clientes'] = $this->ClienteModel->list();
        $data['conductores'] = $this->ConductorModel->list();
		$this->load->view('pedidos/editar', $data);
        $this->load->view('include/footer');
        $this->load->view('include/script');
    }
    

    public function actualizar()
	  {
		if(!$this->session->userdata('login'))
	    {
	        header("Location: ".base_url('login'));
	    }
		
	    $this->load->model('PedidosModel');
	    $this->load->library('form_validation');

	    $idpedido = $this->input->post('idpedido');
	    $cliente = $this->input->post('cliente');
		$conductor = $this->input->post('conductor');
		$factura = $this->input->post('factura');
		$kg = $this->input->post('kg');
		$fecha_carga = $this->input->post('fecha_carga');
		$hora_carga = $this->input->post('hora_carga');
		$estado = $this->input->post('estado');
		$fecha_descarga = $this->input->post('fecha_descarga');
		$hora_descarga = $this->input->post('hora_descarga');
		$observaciones = $this->input->post('observaciones');

		$this->form_validation->set_rules("cliente","cliente","required|min_length[1]|max_length[50]|trim|numeric");
		$this->form_validation->set_rules("conductor","conductor","required|min_length[1]|max_length[50]|trim|numeric");
		$this->form_validation->set_rules("factura","factura","required|exact_length[12]|trim|regex_match[/^[A-Z0-9-]+$/i]");
		$this->form_validation->set_rules("kg","kilogramos","required|min_length[1]|max_length[2]|trim|numeric");
		$this->form_validation->set_rules("fecha_carga","fecha carga","required|trim");
		$this->form_validation->set_rules("hora_carga","hora carga","required|trim");
		$this->form_validation->set_rules("estado","estado","required|min_length[7]|max_length[10]|trim|regex_match[/^[A-Z]+$/i]");
		$this->form_validation->set_rules("fecha_descarga","fecha descarga","trim");
		$this->form_validation->set_rules("hora_descarga","hora descarga","trim");
		$this->form_validation->set_rules("observaciones","observaciones","min_length[5]|max_length[255]|trim");
		
        if($this->form_validation->run())
        {

            $data = array(
				'idclientes' => $cliente,
				'idconductor' => $conductor,
				'codigo_factura' => $factura,
				'kg' => $kg,
				'fecha_carga' => $fecha_carga,
				'hora_carga' => $hora_carga,
				'estado' => $estado,
				'fecha_descarga' => $fecha_descarga,
				'hora_descarga' => $hora_descarga,
				'observaciones' => $observaciones,
			);

            if($this->PedidosModel->update($idpedido,$data))
            {
                redirect(base_url("pedidos"));
            }else{
                redirect(base_url("pedidos/editar/".$idpedido));
            }

        }else{
            $this->editar($idpedido);
        }
	  }


		public function eliminar($idpedido='')
		{
			if(!$this->session->userdata('login'))
            {
                header("Location: ".base_url('login'));
            }
            $this->load->model('PedidosModel');

			if($this->PedidosModel->delete($idpedido))
			{
				redirect(base_url("pedidos"));
			}else{
				redirect(base_url("pedidos"));
			}
        }
        


}
