<?php



class Almacenajes extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		$this->auth->is_admin();

	}

	

	function index() {

		$data['module'] = 'almacenaje';

		$data['template'] = 'home_view';
		
		$this->load->model('tarimas_model');

		$data["almacenajes"] = $this->tarimas_model->getAllAlmacenajes();

		$this->load->view('template', $data);	

	}
	function imprimir($id = NULL) {
		$this->load->model('clients_model');
		$this->load->model('tarimas_model');
		$data["almacenaje"] = $this->tarimas_model->getAlmacenajeById($id);
		$data["cliente"] = $this->clients_model->getClientById($data["almacenaje"]->cliente);
		$this->load->view('almacenaje/print', $data);		
	}		
	function eliminar($id = NULL) {


		$this->load->model('tarimas_model');

		$this->tarimas_model->eliminar_almacenaje($id);
		redirect("almacenajes");		

	}		
	function reporte_inventario() {

		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'admin';

		$data['template'] = 'inventario_view';
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
	function save_almacenaje() {

		$cliente = $this->input->post("cliente");
		$codigo_producto = $this->input->post("codigo_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$descripcion_empaque = $this->input->post("descripcion_empaque");
		$valor_reposicion = $this->input->post("valor_reposicion");
		$refrigerado_congelado = $this->input->post("refri_conge");
		$temperatura_optima = $this->input->post("temperatura_optima");
		$tipo_empaque = $this->input->post("tipo_empaque");
		$peso_bruto = $this->input->post("peso_bruto");
		$peso_neto = $this->input->post("peso_neto");
		$peso_variable = $this->input->post("peso_variable");
		$largo = $this->input->post("largo");
		$alto = $this->input->post("alto");
		$ancho = $this->input->post("ancho");
		$empaques_por_cama = $this->input->post("empaques_por_cama");
		$camas_por_pallet = $this->input->post("camas_por_pallet");
		$empaques_por_pallet = $this->input->post("empaques_por_pallet");
		$minima_para_recibo = $this->input->post("minima_para_recibo");
		$minima_para_embarque = $this->input->post("minima_para_embarque");
		$instrucciones = $this->input->post("instrucciones");
		$for_save = array(
			'cliente'=>$cliente,
			'codigo_producto'=>$codigo_producto,
			'nombre_producto'=>$nombre_producto,
			'descripcion_empaque'=>$descripcion_empaque,
			'valor_reposicion'=>$valor_reposicion,
			'refrigerado_congelado'=>$refrigerado_congelado,
			'temperatura_optima'=>$temperatura_optima,
			'tipo_empaque'=>$tipo_empaque,
			'peso_bruto'=>$peso_bruto,
			'peso_neto'=>$peso_neto,
			'peso_variable'=>$peso_variable,
			'largo'=>$largo,
			'alto'=>$alto,
			'ancho'=>$ancho,
			'empaques_por_cama'=>$empaques_por_cama,
			'camas_por_pallet'=>$camas_por_pallet,
			'empaques_por_pallet'=>$empaques_por_pallet,
			'minima_recibo'=>$minima_para_recibo,
			'minima_embarque'=>$minima_para_embarque,
			'instrucciones'=>$instrucciones
			);

		$data['module'] = 'almacenaje';

		$data['template'] = 'home_view';
		
		$this->load->model('tarimas_model');
		$id_almacenaje = $this->tarimas_model->saveAlmacenaje($for_save);
		$data["almacenajes"] = $this->tarimas_model->getAllAlmacenajes();
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}
	function actualizar() {

		$id = $this->input->post("id");
		$cliente = $this->input->post("cliente");
		$codigo_producto = $this->input->post("codigo_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$descripcion_empaque = $this->input->post("descripcion_empaque");
		$valor_reposicion = $this->input->post("valor_reposicion");
		$refrigerado_congelado = $this->input->post("refri_conge");
		$temperatura_optima = $this->input->post("temperatura_optima");
		$tipo_empaque = $this->input->post("tipo_empaque");
		$peso_bruto = $this->input->post("peso_bruto");
		$peso_neto = $this->input->post("peso_neto");
		$peso_variable = $this->input->post("peso_variable");
		$largo = $this->input->post("largo");
		$alto = $this->input->post("alto");
		$ancho = $this->input->post("ancho");
		$empaques_por_cama = $this->input->post("empaques_por_cama");
		$camas_por_pallet = $this->input->post("camas_por_pallet");
		$empaques_por_pallet = $this->input->post("empaques_por_pallet");
		$minima_para_recibo = $this->input->post("minima_para_recibo");
		$minima_para_embarque = $this->input->post("minima_para_embarque");
		$instrucciones = $this->input->post("instrucciones");
		$for_save = array(
			'cliente'=>$cliente,
			'codigo_producto'=>$codigo_producto,
			'nombre_producto'=>$nombre_producto,
			'descripcion_empaque'=>$descripcion_empaque,
			'valor_reposicion'=>$valor_reposicion,
			'refrigerado_congelado'=>$refrigerado_congelado,
			'temperatura_optima'=>$temperatura_optima,
			'tipo_empaque'=>$tipo_empaque,
			'peso_bruto'=>$peso_bruto,
			'peso_neto'=>$peso_neto,
			'peso_variable'=>$peso_variable,
			'largo'=>$largo,
			'alto'=>$alto,
			'ancho'=>$ancho,
			'empaques_por_cama'=>$empaques_por_cama,
			'camas_por_pallet'=>$camas_por_pallet,
			'empaques_por_pallet'=>$empaques_por_pallet,
			'minima_recibo'=>$minima_para_recibo,
			'minima_embarque'=>$minima_para_embarque,
			'instrucciones'=>$instrucciones
			);

		$data['module'] = 'almacenaje';

		$data['template'] = 'edit_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');

		$this->tarimas_model->updateAlmacenaje($for_save,$id);
		$data["almacenaje"] = $this->tarimas_model->getAlmacenajeById($id);

		$data["clientes"] = $this->clients_model->getAllClients();		
		
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}
	function editar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'almacenaje';

		$data['template'] = 'edit_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		
		$data["almacenaje"] = $this->tarimas_model->getAlmacenajeById($id);
		
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