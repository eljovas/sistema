<?php

class Cosmetologas extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	
	function index() {
		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'cosmetologas';

		$data['template'] = 'home_view';
		//$this->load->model('tarimas_model');

		$this->load->model('user');
		$this->load->model('procedimientos');
		$sucursal = $this->session->userdata('sucursal')->id;
		$data["cosmetologas"] = $this->user->getCosmetologas($sucursal);
		$data["doctores"] = $this->user->getDoctores($sucursal);
		
		$data["procedimientos"] = $this->procedimientos->getAll();

		$this->load->view('template', $data);	
	}

	/* Example of Adding Pages to the Secure section
	--------------------------------------*/
	function getById($id = NULL) {
		$this->load->model('user');		
		$cosmeto =  $this->user->getUserById($id);
		echo $cosmeto->first_name."/".$cosmeto->user_level;
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