<?php



class Camara extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		$this->auth->is_admin();

	}

	

	function index($camara = NULL) {

		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'camara';

		$data['template'] = 'home_view';
		$this->load->model('tarimas_model');
		$data["total_tarimas"] = $this->tarimas_model->getCountTarimasByCamara($camara);
		$data["total_vacias"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus($camara,'vacio');
		$data["total_ocupadas"] = $this->tarimas_model->getAllTarimasByCamaraAndStatus($camara,'ocupado');
		$data["tarimas"] = $this->tarimas_model->getAllTarimasByCamara($camara);
		
		$data['camara'] = $camara;

		$this->load->view('template', $data);	

	}

	function usuarios() {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'users_view';

		$this->load->model('user');

		$data["usuarios"] = $this->user->getAllUsers();

		$this->load->view('template', $data);	

	}
	function nuevo_almacenaje() {

		$data['module'] = 'admin';

		$data['template'] = 'almacenaje_nuevo';
		
		$this->load->model('user');
		$this->load->model('clients_model');
		$data["clientes"] = $this->clients_model->getAllClients();
		$this->load->view('template', $data);	

	}
	function editar_usuario($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'edit_user_view';
		
		$this->load->model('user');
		$this->load->model('clients_model');
		$data["usuario"] = $this->user->getUserById($id);
		$data["clientes"] = $this->clients_model->getAllClients();
		$this->load->view('template', $data);	

	}
	function eliminar_usuario($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'users_view';
		
		$this->load->model('user');

		$this->user->deleteUserById($id);
		
		$data["usuarios"] = $this->user->getAllUsers();

		$this->load->view('template', $data);	

	}
	function actualizar_usuario() {

		$id = $this->input->post("id");
		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$role = $this->input->post("role");
		$cliente = $this->input->post("cliente");

		$data['module'] = 'admin';

		$data['template'] = 'edit_user_view';
		
		$this->load->model('user');
		if (!empty($password)) {
			$password = sha1('envysea_top_secret_salt'.$password);
			$this->user->updateUserPass($id,$username,$email,$password,$first_name,$last_name,$role);
		}else{
			if ($cliente>0) {
				$this->user->updateUserClient($id,$username,$email,$first_name,$last_name,$role,$cliente);	
			}
			$this->user->updateUser($id,$username,$email,$first_name,$last_name,$role);
		}
		
		$data["usuario"] = $this->user->getUserById($id);
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