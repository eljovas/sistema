<?php



class Servicios extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		$this->auth->is_admin();

	}

	

	function index($camara = NULL) {
		$data['title'] = 'Admin | Envysea Codeigniter Authentication';
		$data['module'] = 'servicios';
		$data['template'] = 'home_view';
		$this->load->model('servicios_model');
		$data["servicios"] = $this->servicios_model->getServices();
		$this->load->view('template', $data);	
	}
	function asignar($cliente = NULL) {
		
		$data['module'] = 'servicios';
		$data['template'] = 'assignment_view';
		$this->load->model('clients_model');
		$this->load->model('servicios_model');
		$data["cliente"] = $this->clients_model->getClientById($cliente);
		$data["servicios"] = $this->servicios_model->getServices();
		$data["servicios_contratados"] = $this->servicios_model->getServicesByCient($cliente);
		
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
	function nuevo() {

		$data['module'] = 'servicios';

		$data['template'] = 'create_view';

		$this->load->view('template', $data);	

	}
	function editar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'servicios';

		$data['template'] = 'edit_view';
		
		$this->load->model('user');
		$this->load->model('servicios_model');
		$data["servicio"] = $this->servicios_model->getServiceById($id);
		$this->load->view('template', $data);	

	}
	function eliminar($id = NULL) {

		
		$this->load->model('servicios_model');

		$this->servicios_model->eliminar($id);
		redirect("servicios");

	}
	function actualizar() {
		$id = $this->input->post("id");
		$unidad = $this->input->post("unidad");
		$rubro = $this->input->post("rubro");
		$concepto = $this->input->post("concepto");
		$descripcion = $this->input->post("descripcion");
		$status = $this->input->post("status");

		$data['module'] = 'servicios';

		$data['template'] = 'edit_view';
		
		$this->load->model('servicios_model');
		$update_service = array('rubro'=>$rubro,'concepto'=>$concepto,'descripcion'=>$descripcion,'unida_aplicable'=>implode(",",$unidad),'status'=>$status);
		$this->servicios_model->update($id,$update_service);
		$data["servicio"] = $this->servicios_model->getServiceById($id);
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}		

	//It is normal behavior for this function to display errors

	//To turn the errors off, go into the main index.php and switch the environment from 'production' to 'development'

	function grabar() {
		$unidad = $this->input->post("unidad");
		$rubro = $this->input->post("rubro");
		$concepto = $this->input->post("concepto");
		$descripcion = $this->input->post("descripcion");
		$status = $this->input->post("status");

		$data['module'] = 'servicios';

		$data['template'] = 'home_view';
		
		$this->load->model('servicios_model');

		$new_service = array('rubro'=>$rubro,'concepto'=>$concepto,'descripcion'=>$descripcion,'unida_aplicable'=>implode(",",$unidad),'status'=>$status);
		$this->servicios_model->save($new_service);
		redirect("servicios");
	}

	function grabar_servicios_cliente() {
		$servicios = $this->input->post("servicio");
		$cliente = $this->input->post("id");
		$data['module'] = 'servicios';
		$data['template'] = 'assignment_editar';
		$this->load->model('clients_model');
		$this->load->model('servicios_model');		
		$this->servicios_model->reset_service_client($cliente);
		if(!empty($servicios)){
			foreach ($servicios as $servicio) {
				$this->servicios_model->save_service_client(array('id_servicio'=>$servicio,'costo'=>$this->input->post("servicio".$servicio),'id_cliente'=>$cliente));
			}
		}

		redirect("servicios-contratados/".$cliente);

	}
	

	
	

}