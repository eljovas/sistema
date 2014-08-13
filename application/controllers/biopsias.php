<?php



class Biopsias extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		//$this->auth->is_admin();

	}

	

	function index() {
		$data['title'] = '';

		$data['module'] = 'biopsias';

		$data['template'] = 'biopsias_view';

		$this->load->model('biopsias_model');
		$sucursal = $this->session->userdata('sucursal')->id;
		//$data["clientes"] = $this->clients_model->getAllClients($sucursal);

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
	function nueva() {
		$data['title'] = '';
		$data['module'] = 'biopsias';
		//$data['template'] = 'edit_client_view';
		$data['template'] = 'biopsias_new_view';
		
		$this->load->model('biopsias_model');

		$sucursal = $this->session->userdata('sucursal')->id;
		
		$new_biopsia = array(
			'nombre'=>"",
			'apellido'=>"",
			'telefono'=> "",
			'tipo_biopsia'=>"",
			'comentarios'=>"",
			);
		//$id_cliente = $this->clients_model->save($new_cliente);		
		//$data["cliente"] = $this->clients_model->getClientById($id_cliente);
		$this->load->view('template', $data);		
	}	
	function savequick() {
		$nombre = $this->input->post("nombre");
		$apellidos = $this->input->post("apellidos");
		$nombre_completo =$this->input->post("nombre").' '.$this->input->post("apellidos");
		$new_cliente = array(
			'id_user'=>$this->session->userdata('user_id'),
			'sucursal'=>$this->session->userdata('sucursal')->id,
			'nombre'=>$nombre,
			'apellido'=>$apellidos,
			'nombre_completo'=>$nombre_completo,
			'motivo'=>$this->input->post("motivo"),
			'doctor'=>$this->input->post("doctor")
			);
		
		$this->load->model('clients_model');
		$id_cliente = $this->clients_model->save($new_cliente);
		$return = array('id'=>$id_cliente,'nombre'=>$nombre." ".$apellidos);
		echo json_encode($return);
	}	


	function save() {
		
		$esquema =$this->input->post("esquema");
		$nombre_completo =$this->input->post("nombre").' '.$this->input->post("apellidos");
		$new_biopsia = array(
			'id_user'=>$this->session->userdata('user_id'),
			'sucursal'=>$this->session->userdata('sucursal')->id,
			'nombre'=>$this->input->post("nombre"),
			'apellido'=>$this->input->post("apellidos"),
			'nombre_completo'=>$nombre_completo,
			'email'=>$this->input->post("correo"),
			'telefono'=>preg_replace('/(\W*)/', '', $this->input->post("telefono")),
			'tipo_biopsia'=>$this->input->post("tipo_biopsia"),
			'comentarios'=>$this->input->post("comentarios"),
			);
		$data['module'] = 'biopsias';

		$data['template'] = 'biopsias_view';
		
		$this->load->model('biopsias_model');
		$id_biopsia = $this->biopsias_model->save($new_biopsia);
		//$sucursal = $this->session->userdata('sucursal')->id;
		redirect("biopsias");
		//$data["clientes"] = $this->clients_model->getAllClients($sucursal);
		//$data["mensaje"] = "Nuevo Paciente Agregado: " .$this->input->post("contacto");
		//$this->load->view('template', $data);	

	}	


	function editar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'clientes';

		$data['template'] = 'edit_client_view';
		
		$this->load->model('clients_model');
		$this->load->model('procedimientos');
		$this->load->model('user');
		$sucursal = $this->session->userdata('sucursal')->id;
		$data["doctores"] = $this->user->getUserByLevel(1,$sucursal);
		$data["procedimientos"] = $this->procedimientos->getAll();		
		$data["cliente"] = $this->clients_model->getClientById($id);
		
		$this->load->view('template', $data);	

	}

	function eliminar($id = NULL) {
		$data['title'] = '';
		$data['module'] = 'clientes';
		$data['template'] = 'clients_view';
		$this->load->model('clients_model');
		$this->clients_model->eliminar($id);

		redirect("clients");

//		$data["clientes"] = $this->clients_model->getAllClients();
//		$this->load->view('template', $data);	
	}

	function update() {
		$id = $this->input->post("id");
		
		$update_cliente = array(
			
			
			'nombre'=>$this->input->post("nombre"),
			'apellido'=>$this->input->post("apellidos"),
			'edo_civil'=>$this->input->post("estado_civil"),
			'profesion'=>$this->input->post("profesion"),
			'motivo'=>$this->input->post("motivo"),
			'doctor'=>$this->input->post("doctor"),
			'fecha_nacimiento'=>$this->input->post("fecha_nacimiento"),
			'fecha_ingreso'=>$this->input->post("fecha_ingreso"),
			'tipo_consulta'=>$this->input->post("tipo_consulta"),
			'empresa'=>$this->input->post("empresa"),
			'recomendacion'=>$this->input->post("recomendado"),
			'genero'=>$this->input->post("sexo"),
			'domicilio'=>$this->input->post("domicilio"),
			'telefono_contacto'=>preg_replace('/(\W*)/', '', $this->input->post("telefono")),
			'email_contacto'=>$this->input->post("correo"),
			'pais'=>$this->input->post("pais"),
			'estado'=>$this->input->post("estado"),
			'ciudad'=>$this->input->post("ciudad"),
			'emergencia_nombre'=>$this->input->post("nombre_emergencia"),
			'emergencia_telefono'=>preg_replace('/(\W*)/', '', $this->input->post("telefono_emergencia")),
			'emergencia_celular'=>preg_replace('/(\W*)/', '', $this->input->post("celular_emergencia"))
			);

		$data['module'] = 'admin';

		$data['template'] = 'edit_client_view';
		
		$this->load->model('clients_model');
		$this->clients_model->updateClient($id,$update_cliente);
		$data["cliente"] =$this->clients_model->getClientById($id);
		
//		redirect("clients/editar/".$id);
		redirect("clients");

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