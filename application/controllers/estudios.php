<?php



class Estudios extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		$this->auth->is_admin();

	}

	

	function index() {
		$data['title'] = '';

		$data['module'] = 'estudios';

		$data['template'] = 'estudios_view';

		$this->load->model('estudios_model');
		//$sucursal = $this->session->userdata('sucursal')->id;
//		$data["estudios"] = $this->estudios_model->getAllEstudios($sucursal);
		$data["estudios"] = $this->estudios_model->getAll();

		$this->load->view('template', $data);		
	}
	function upload() {
			$directory = './assets/img/uploaded'; 
		  	$config['upload_path'] = $directory ; /* NB! create this dir! */
		  	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		  	$config['max_size']  = '0';
		  	$config['max_width']  = '0';
		  	$config['max_height']  = '0';
		  	$this->load->library('upload', $config);
		  	$upload = $this->upload->do_upload('qqfile');	
		  	if($upload){
		  		//$data_image = $this->upload->data();
		  		$return = array("success"=>true);
		  	}else{
		  		$return = array("success"=>false,"error"=>"npi");
		  	}

		  	echo json_encode($return);
	}

	function imprimir($id = NULL) {
		$this->load->model('clients_model');
		$this->load->model('servicios_model');
		$this->load->model('tarimas_model');
		$data["cliente"] = $this->clients_model->getClientById($id);
		$data["servicios"] = $this->servicios_model->getServicesForPrintByClient($id);
		$data["almacenajes"] = $this->tarimas_model->getAlmacenajesByClient($id);
		$data["tarimas"] = $this->tarimas_model->getTarimasByCliente($id);
		if ($data["cliente"]->esquema_cobranza=="variable") {
			$data["tarifas"] = $this->tarimas_model->getTarifasByCliente($id);
		}
		
		$this->load->view('clientes/print', $data);		
	}	

	function nuevo() {
		$data['title'] = '';
		$data['module'] = 'estudios';
		//$data['template'] = 'edit_client_view';
		$data['template'] = 'estudios_new_view';
		
		$this->load->model('estudios_model');
		
		$new_estudio = array(
			'nombre'=>"",
			'descripcion'=>""
			);
		//$id_cliente = $this->clients_model->save($new_cliente);		
		//$data["cliente"] = $this->clients_model->getClientById($id_cliente);
		$this->load->view('template', $data);		
	}	
	function save() {
		

		$new_estudio = array(
			'nombre'=>$this->input->post("nombre"),
			'descripcion'=>$this->input->post("descripcion")
			);
		$data['module'] = 'estudios';
		$data['template'] = 'estudios_view';

		$this->load->model('estudios_model');
		$id_estudio = $this->estudios_model->save($new_estudio);
		
		$data["estudios"] = $this->estudios_model->getAll();
		if(is_int($id_estudio)){
		$data["mensaje"] = "Nuevo Estudio Agregado: " .$this->input->post("nombre");
		$data["class"] = "success";
		}else{
		$data["mensaje"] = "Nel: " .$this->input->post("nombre");
		$data["class"] = "error";
		}
		$this->load->view('template', $data);	

	}	


	function editar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'estudios';

		$data['template'] = 'estudios_edit_view';
		
		$this->load->model('estudios_model');
		$data["estudios"] = $this->estudios_model->getEstudioById($id);
		$this->load->view('template', $data);	

	}
	function eliminar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'clients_view';
		
		$this->load->model('clients_model');

		$this->clients_model->eliminar($id);
		
		$data["clientes"] = $this->clients_model->getAllClients();

		$this->load->view('template', $data);	
	}
	function update() {
		$id = $this->input->post("id");
		$update_estudio = array(
			'nombre'=>$this->input->post("nombre"),
			'descripcion'=>$this->input->post("descripcion")
			);

		$data['module'] = 'estudios';

		$data['template'] = 'estudios_edit_view';
		
		$this->load->model('estudios_model');
		$this->estudios_model->updateEstudio($id,$update_estudio);
		$data["estudio"] =$this->estudios_model->getEstudioById($id);
		
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}		

	//It is normal behavior for this function to display errors

	//To turn the errors off, go into the main index.php and switch the environment from 'production' to 'development'

	function panel($page) {

		if ($page == 'create') {

			$this->auth->create_user('admin');	

		} elseif ($page == 'update') {

			$this->auth->update_user('admin');	

		} elseif ($page == 'delete') {

			$this->auth->delete_user('admin');

		} elseif ($page == 'roles') {

			$this->auth->change_roles();

		} else {

			$data['title'] = 'Admin Panel | Envysea Codeigniter Authentication';

			$data['module'] = 'admin';

			$data['template'] = 'panel_view';



			$this->load->view('template', $data);

		}

	}

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _check_username_exist_create($username) {

		$this->load->model('user');

		$result = $this->user->check_username_exist($username);

		

		if ($result == TRUE) {

			$this->form_validation->set_message('_check_username_exist_create', 'The username "'.$username.'" already exists! Please pick a different username.');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _check_email_exist_create($email) {

		$this->load->model('user');

		$result = $this->user->check_email_exist($email);

		

		if ($result == TRUE) {

			$this->form_validation->set_message('_check_email_exist_create', 'The email "'.$email.'" already exists!');

			return FALSE;

		} else {

			return TRUE;

		}

	}	

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _verify_password($password) {

		$this->load->model('user');

		

		$user_id = $this->session->userdata('user_id');

		

		$result = $this->user->verify_password($user_id, sha1($this->config->item('salty_salt').$password));

		

		if ($result == FALSE) {

			$this->form_validation->set_message('_verify_password', 'Incorrect password submitted.');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	

}