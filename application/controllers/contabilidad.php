<?php

class Contabilidad extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	
	function index() {
		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'contabilidad';

		$data['template'] = 'home_view';
		$this->load->model('tarimas_model');

		$data["total_tarimas_camara_1"] = $this->tarimas_model->getCountTarimasByCamara(1);
		$data["total_vacias_camara_1"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(1,'vacio');
		$data["total_ocupadas_camara_1"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(1,'ocupado');
		$data["porcentaje_camara_1"] = @($data["total_ocupadas_camara_1"] / $data["total_tarimas_camara_1"]) * 100;

		$data["total_tarimas_camara_2"] = $this->tarimas_model->getCountTarimasByCamara(2);
		$data["total_vacias_camara_2"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(2,'vacio');
		$data["total_ocupadas_camara_2"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(2,'ocupado');
		$data["porcentaje_camara_2"] = ($data["total_ocupadas_camara_2"] / $data["total_tarimas_camara_2"]) * 100;

		$data["total_tarimas_camara_3"] = $this->tarimas_model->getCountTarimasByCamara(3);
		$data["total_vacias_camara_3"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(3,'vacio');
		$data["total_ocupadas_camara_3"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus(3,'ocupado');
		$data["porcentaje_camara_3"] = @($data["total_ocupadas_camara_3"] / $data["total_tarimas_camara_3"]) * 100;

		$this->load->view('template', $data);	
	}

	/* Example of Adding Pages to the Secure section
	--------------------------------------*/
	function page1() {
		$data['title'] = 'page1 | Envysea Codeigniter Authentication';
		$data['module'] = 'secure';
		$data['template'] = 'page1_view';
	
		$this->load->view('template', $data);
	}
	
	function page2() {
		$data['title'] = 'page2 | Envysea Codeigniter Authentication';
		$data['module'] = 'secure';
		$data['template'] = 'page2_view';
	
		$this->load->view('template', $data);
	}
	
	function page3() {
		$data['title'] = 'page3 | Envysea Codeigniter Authentication';
		$data['module'] = 'secure';
		$data['template'] = 'page3_view';
	
		$this->load->view('template', $data);
	}
	
	function logout() {
		$this->auth->logout();		
		
		$data['message'] = '<div class="alert alsert-success">Sesion Cerrada!</div>';
		$data['title'] = 'Logged Out! | Envysea Codeigniter Authentication';
		$data['module'] = 'envysea';
		$data['template'] = 'login_view';
		
		$this->load->view('template', $data);
	}
}