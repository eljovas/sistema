<?php

class envysea extends CI_Controller {

	/***************************************
	* Envysea Authentication for Codeigniter 2.0.3
	* 
	* Version 1.0.8
	* 
	* @author Nicholas Cerminara | envysea.com
	***************************************/
	function __construct() {
		parent::__construct();
		/* Check session to see if an admin or user is already logged in
		----------------------------------------------------------------*/
		if ($this->session->userdata('is_logged_in') == TRUE && $this->config->item('admin_level') == $this->session->userdata('user_level')) :
			redirect('admin', 'location');
		endif;
		if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('user_level')==1) :
			redirect('doctores', 'location');
		endif;
		if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('user_level')==2) :
			redirect('cosmetologas', 'location');
		endif;
		if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('user_level')==3) :
			redirect('recepcionistas', 'location');
		endif;
		if ($this->session->userdata('is_logged_in') == TRUE && $this->session->userdata('user_level')==4) :
			redirect('contabilidad', 'location');
		endif;
	}
		
	function index() {
		// Parameters "title", "page_description", and "page_keywords" are optional. To maximize SEO, it's best to individually fill each one for every separate function/page when loading a view.
		
		/* Alternate Syntax
		-----------------------------
		$data = array(
				'title' => 'Sample Page | Envysea Codeigniter Authentication',
				'module' => 'envysea',
				'page_keywords' => 'specific page keyword 1, keyword 2, keyword 3',
				'page_description' => 'Envysea authentication for Codeigniter',
				'template' => 'home_view'
				); */
		
		$data['title'] = 'Envysea Codeigniter Authentication';
		$data['page_description'] = 'Envysea authentication offers rapid application development for membership, authentication, and login sites.';
		$data['page_keywords'] = 'Authentication, Membership, Login, Codeigniter 2.0.3';
		$data['module'] = 'envysea';
		$data['template'] = 'home_view';
		
		$this->load->view('template', $data);
	}
	


}