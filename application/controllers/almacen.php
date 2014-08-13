<?php



class Almacen extends CI_Controller {



	function __construct() {

		parent::__construct();

		//$this->auth->is_logged_in();

	}

	
	function imprimir($id = NULL) {
		$data['title'] = '';

		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		
		$data["entrada"] = $this->tarimas_model->getEntradaById($id);
		$data["cliente"] = $this->clients_model->getClientById($data["entrada"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($id);
		$this->load->view('secure/print_view', $data);	
	}
	function buscartarimajax($tarima = NULL) {
		
		$this->load->model('tarimas_model');
		$tarimas = $this->tarimas_model->getTarimaAjax($tarima);
		$tabla = "";
		foreach ($tarimas as $tarima) {
			$tabla .= "<tr>";
			$tabla .="<td>".$tarima->codigo_producto."</td>";
			$tabla .="<td>".$tarima->kilos."</td>";
			$tabla .= "</tr>";
		}
		
		echo $tabla;
	}	
	function imprimir_salida($id = NULL) {
		$data['title'] = '';

		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		
		$data["salida"] = $this->tarimas_model->getSalidaById($id);
		$data["cliente"] = $this->clients_model->getClientById($data["salida"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasBySalida($id);
		$this->load->view('salidas/print_view', $data);	
	}
	function index() {

		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'almacen';

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
	function eliminar($id = NULL) {
		$this->load->model('tarimas_model');
		$this->tarimas_model->eliminar_entrada($id);
		redirect("almacen/entradas");		
	}	
	function eliminar_salida($id = NULL) {
		$this->load->model('tarimas_model');
		$this->tarimas_model->eliminar_salida($id);
		redirect("almacen/salidas");		
	}	
	function entrada() {

		$data['title'] = 'Admin | Envysea Codeigniter Authentication';

		$data['module'] = 'secure';

		$data['template'] = 'create_view';
		$this->load->model('clients_model');
		$data["clientes"] = $this->clients_model->getAllClients();
		$this->load->view('template', $data);	

	}	

	function salida() {
		$data['module'] = 'salidas';
		$data['template'] = 'create_view';
		$this->load->model('clients_model');
		$data["clientes"] = $this->clients_model->getAllClients();
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
	function entradas() {

		$data['module'] = 'secure';

		$data['template'] = 'entradas_view';
		
		$this->load->model('tarimas_model');

		$data["entradas"] = $this->tarimas_model->getAllEntradas();

		$this->load->view('template', $data);	
	}	
	function movimientos() {

		$data['module'] = 'movimientos';

		$data['template'] = 'home_view';
		
		$this->load->model('tarimas_model');

		$data["movimientos"] = $this->tarimas_model->getAllEntradas();

		$this->load->view('template', $data);	
	}	
	function salidas() {

		$data['module'] = 'salidas';

		$data['template'] = 'home_view';
		
		$this->load->model('tarimas_model');

		$data["salidas"] = $this->tarimas_model->getAllSalidas();

		$this->load->view('template', $data);	
	}		
	function asignar($id = NULL) {

		$data['module'] = 'secure';

		$data['template'] = 'assigment_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');

		$data["entrada"] = $this->tarimas_model->getEntradaById($id);
		$data["cliente"] = $this->clients_model->getClientById($data["entrada"]->cliente);
		$data["productos"] = $this->tarimas_model->getAlmacenajesByClient($data["entrada"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($id);
		$data["tarimas_total"] = $this->tarimas_model->getTarimasByEntradaJustDistinct($id);
		$this->load->view('template', $data);	
	}	
	function salida_producto($id = NULL) {

		$data['module'] = 'salidas';

		$data['template'] = 'assigment_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');

		$data["salida"] = $this->tarimas_model->getSalidaById($id);
		$data["cliente"] = $this->clients_model->getClientById($data["salida"]->cliente);
		$data["productos"] = $this->tarimas_model->getAlmacenajesByClient($data["salida"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($id);
		$data["tarimas_salida"] = $this->tarimas_model->getTarimasBySalida($id);
		$data["tarimas_total"] = $this->tarimas_model->getTarimasByEntradaJustDistinct($id);
		$this->load->view('template', $data);	
	}	
	function bloquear_tarima() {
		$entrada = $this->input->post("entrada");
		$tarima = $this->input->post("tarima");
		$producto = $this->input->post("producto");
		$lote = $this->input->post("lote");
		$kilos = $this->input->post("kilos");
		$caducidad = $this->input->post("caducidad");
		$data['module'] = 'secure';

		$data['template'] = 'assigment_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		$data["verificacion"] = $this->tarimas_model->verificar_tarima($tarima);
		//if (!empty($data["verificacion"]) && $data["verificacion"]->status=="vacio") {
		if (!empty($data["verificacion"])) {
			$this->tarimas_model->asigna_tarima($entrada,$tarima,$producto,$lote,$kilos,$caducidad);
		}else{
			$data["message"] = "folio de tarima no disponible: ". $tarima;	
			$data["message_type"] = "error";	
		}
		$data["entrada"] = $this->tarimas_model->getEntradaById($entrada);
		$data["cliente"] = $this->clients_model->getClientById($data["entrada"]->cliente);
		$data["productos"] = $this->tarimas_model->getAlmacenajesByClient($data["entrada"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($entrada);
		$data["tarimas_total"] = $this->tarimas_model->getTarimasByEntradaJustDistinct($entrada);
		$this->load->view('template', $data);	
	}	
	function grabar_salida_producto() {
		$salida = $this->input->post("salida");
		$tarima = $this->input->post("tarima");
		$producto = $this->input->post("producto");
		$cajas = $this->input->post("cajas");
		$kilos = $this->input->post("kilos");
		
		$data['module'] = 'salidas';

		$data['template'] = 'assigment_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		$data["verificacion"] = $this->tarimas_model->verificar_tarima($tarima);
		//if (!empty($data["verificacion"]) && $data["verificacion"]->status=="vacio") {
		if (!empty($data["verificacion"])) {
			$this->tarimas_model->saca_producto(array('salida'=>$salida,'almacenaje'=>$producto,'kilos'=>$kilos,'cajas'=>$cajas,'tarima'=>$tarima));
		}else{
			$data["message"] = "folio de tarima no disponible: ". $tarima;	
			$data["message_type"] = "error";	
		}
		$data["salida"] = $this->tarimas_model->getSalidaById($salida);
		$data["cliente"] = $this->clients_model->getClientById($data["salida"]->cliente);
		$data["productos"] = $this->tarimas_model->getAlmacenajesByClient($data["salida"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($salida);
		$data["tarimas_salida"] = $this->tarimas_model->getTarimasBySalida($salida);
		$data["tarimas_total"] = $this->tarimas_model->getTarimasByEntradaJustDistinct($salida);
		$this->load->view('template', $data);	
	}		
	
	function nueva() {
		$cliente = $this->input->post("cliente");
		$folio = $this->input->post("folio");
		$nombre_recibe = $this->input->post("nombre_recibe");
		$operador = $this->input->post("operador");
		$placas = $this->input->post("placas");
		$placas_contenedor = $this->input->post("placas_contenedor");
		$contenedor_danos = $this->input->post("contenedor_danos");
		$revision_contenedor_danos_obervaciones = $this->input->post("revision_contenedor_danos_obervaciones");
		$sin_danos_limpieza = $this->input->post("sin_danos_limpieza");
		$sin_danos_limpieza_observaciones = $this->input->post("sin_danos_limpieza_observaciones");
		$temperatura_adecuada = $this->input->post("temperatura_adecuada");
		$temperatura_adecuada_observaciones = $this->input->post("temperatura_adecuada_observaciones");
		$acondicionamiento_temperatura = $this->input->post("acondicionamiento_temperatura");
		$acondicionamiento_temperatura_observaciones = $this->input->post("acondicionamiento_temperatura_observaciones");
		$descarga_producto_agranel = $this->input->post("descarga_producto_agranel");
		$descarga_producto_tarima = $this->input->post("descarga_producto_tarima");
		$cajas_empaques_sin_danos = $this->input->post("cajas_empaques_sin_danos");
		$cajas_empaques_sin_danos_observaciones = $this->input->post("cajas_empaques_sin_danos_observaciones");
		$sellos_cajas_empaques_sin_danos = $this->input->post("sellos_cajas_empaques_sin_danos");
		$sellos_cajas_empaques_sin_danos_observaciones = $this->input->post("sellos_cajas_empaques_sin_danos_observaciones");
		$tarimas_sin_danos = $this->input->post("tarimas_sin_danos");
		$tarimas_sin_danos_observaciones = $this->input->post("tarimas_sin_danos_observaciones");
		$producto_caducado = $this->input->post("producto_caducado");
		$producto_caducado_observaciones = $this->input->post("producto_caducado_observaciones");
		$producto_coincide = $this->input->post("producto_coincide");
		$producto_coincide_observaciones = $this->input->post("producto_coincide_observaciones");
		$comentarios_adicionales = $this->input->post("comentarios_adicionales");

		$for_save = array(
			'cliente'=>$cliente,
			'folio'=>str_replace("KM-", "", $folio),
			'nombre_recibe'=>$nombre_recibe,
			'operador'=>$operador,
			'placas'=>$placas,
			'placas_contenedor'=>$placas_contenedor,
			'contenedor_danos'=>$contenedor_danos,
			'revision_contenedor_danos_obervaciones'=>$revision_contenedor_danos_obervaciones,
			'sin_danos_limpieza'=>$sin_danos_limpieza,
			'sin_danos_limpieza_observaciones'=>$sin_danos_limpieza_observaciones,
			'temperatura_adecuada'=>$temperatura_adecuada,
			'temperatura_adecuada_observaciones'=>$temperatura_adecuada_observaciones,
			'acondicionamiento_temperatura'=>$acondicionamiento_temperatura,
			'acondicionamiento_temperatura_observaciones'=>$acondicionamiento_temperatura_observaciones,
			'descarga_producto_agranel'=>$descarga_producto_agranel,
			'descarga_producto_tarima'=>$descarga_producto_tarima,
			'cajas_empaques_sin_danos'=>$cajas_empaques_sin_danos,
			'cajas_empaques_sin_danos_observaciones'=>$cajas_empaques_sin_danos_observaciones,
			'sellos_cajas_empaques_sin_danos'=>$sellos_cajas_empaques_sin_danos,
			'sellos_cajas_empaques_sin_danos_observaciones'=>$sellos_cajas_empaques_sin_danos_observaciones,
			'tarimas_sin_danos'=>$tarimas_sin_danos,
			'tarimas_sin_danos_observaciones'=>$tarimas_sin_danos_observaciones,
			'producto_caducado'=>$producto_caducado,
			'producto_caducado_observaciones'=>$producto_caducado_observaciones,
			'producto_coincide'=>$producto_coincide,
			'producto_coincide_observaciones'=>$producto_coincide_observaciones,
			'comentarios_adicionales'=>$comentarios_adicionales
			);
		$data['module'] = 'secure';
		$data['template'] = 'entradas_view';
		$this->load->model('tarimas_model');
		$this->tarimas_model->saveEntrada($for_save);
		$data["entradas"] = $this->tarimas_model->getAllEntradas();
		$data["mensaje"] = "Entrada guardada con exito.";
		$this->load->view('template', $data);	
	}
	function grabar_salida() {

		$cliente = $this->input->post("cliente");
		$folio = $this->input->post("folio");
		$recoge = $this->input->post("recoge");
		$destino = $this->input->post("destino");
		$transporte = $this->input->post("transporte");
		$placas = $this->input->post("placas");
		$descripcion = $this->input->post("descripcion");

		$for_save = array(
			'cliente'=>$cliente,
			'folio'=>str_replace("KM-", "", $folio),
			'recoge'=>$recoge,
			'destino'=>$destino,
			'transporte'=>$transporte,
			'placas'=>$placas,
			'descripcion'=>$descripcion
			);

		$data['module'] = 'salidas';

		$data['template'] = 'home_view';
		
		$this->load->model('tarimas_model');
		$this->tarimas_model->saveSalida($for_save);
		$data["salidas"] = $this->tarimas_model->getAllSalidas();
		$data["mensaje"] = "Salida Registrada con éxito.";
		$this->load->view('template', $data);	

	}	
	
	function actualizar() {
		$id = $this->input->post("id");
		$cliente = $this->input->post("cliente");
		$folio = $this->input->post("folio");
		$nombre_recibe = $this->input->post("nombre_recibe");
		$operador = $this->input->post("operador");
		$placas = $this->input->post("placas");
		$placas_contenedor = $this->input->post("placas_contenedor");
		$contenedor_danos = $this->input->post("contenedor_danos");
		$revision_contenedor_danos_obervaciones = $this->input->post("revision_contenedor_danos_obervaciones");
		$sin_danos_limpieza = $this->input->post("sin_danos_limpieza");
		$sin_danos_limpieza_observaciones = $this->input->post("sin_danos_limpieza_observaciones");
		$temperatura_adecuada = $this->input->post("temperatura_adecuada");
		$temperatura_adecuada_observaciones = $this->input->post("temperatura_adecuada_observaciones");
		$acondicionamiento_temperatura = $this->input->post("acondicionamiento_temperatura");
		$acondicionamiento_temperatura_observaciones = $this->input->post("acondicionamiento_temperatura_observaciones");
		$descarga_producto_agranel = $this->input->post("descarga_producto_agranel");
		$descarga_producto_tarima = $this->input->post("descarga_producto_tarima");
		$cajas_empaques_sin_danos = $this->input->post("cajas_empaques_sin_danos");
		$cajas_empaques_sin_danos_observaciones = $this->input->post("cajas_empaques_sin_danos_observaciones");
		$sellos_cajas_empaques_sin_danos = $this->input->post("sellos_cajas_empaques_sin_danos");
		$sellos_cajas_empaques_sin_danos_observaciones = $this->input->post("sellos_cajas_empaques_sin_danos_observaciones");
		$tarimas_sin_danos = $this->input->post("tarimas_sin_danos");
		$tarimas_sin_danos_observaciones = $this->input->post("tarimas_sin_danos_observaciones");
		$producto_caducado = $this->input->post("producto_caducado");
		$producto_caducado_observaciones = $this->input->post("producto_caducado_observaciones");
		$producto_coincide = $this->input->post("producto_coincide");
		$producto_coincide_observaciones = $this->input->post("producto_coincide_observaciones");
		$comentarios_adicionales = $this->input->post("comentarios_adicionales");

		$for_save = array(
			'cliente'=>$cliente,
			'folio'=>str_replace("KM-", "", $folio),
			'nombre_recibe'=>$nombre_recibe,
			'operador'=>$operador,
			'placas'=>$placas,
			'placas_contenedor'=>$placas_contenedor,
			'contenedor_danos'=>$contenedor_danos,
			'revision_contenedor_danos_obervaciones'=>$revision_contenedor_danos_obervaciones,
			'sin_danos_limpieza'=>$sin_danos_limpieza,
			'sin_danos_limpieza_observaciones'=>$sin_danos_limpieza_observaciones,
			'temperatura_adecuada'=>$temperatura_adecuada,
			'temperatura_adecuada_observaciones'=>$temperatura_adecuada_observaciones,
			'acondicionamiento_temperatura'=>$acondicionamiento_temperatura,
			'acondicionamiento_temperatura_observaciones'=>$acondicionamiento_temperatura_observaciones,
			'descarga_producto_agranel'=>$descarga_producto_agranel,
			'descarga_producto_tarima'=>$descarga_producto_tarima,
			'cajas_empaques_sin_danos'=>$cajas_empaques_sin_danos,
			'cajas_empaques_sin_danos_observaciones'=>$cajas_empaques_sin_danos_observaciones,
			'sellos_cajas_empaques_sin_danos'=>$sellos_cajas_empaques_sin_danos,
			'sellos_cajas_empaques_sin_danos_observaciones'=>$sellos_cajas_empaques_sin_danos_observaciones,
			'tarimas_sin_danos'=>$tarimas_sin_danos,
			'tarimas_sin_danos_observaciones'=>$tarimas_sin_danos_observaciones,
			'producto_caducado'=>$producto_caducado,
			'producto_caducado_observaciones'=>$producto_caducado_observaciones,
			'producto_coincide'=>$producto_coincide,
			'producto_coincide_observaciones'=>$producto_coincide_observaciones,
			'comentarios_adicionales'=>$comentarios_adicionales
			);


		$data['module'] = 'secure';

		$data['template'] = 'editar_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');

		$this->tarimas_model->updateEntrada($for_save,$id);
		$data["entrada"] = $this->tarimas_model->getEntradaById($id);
		$data["clientes"] = $this->clients_model->getAllClients();
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}
	function actualizar_salida() {
		
		$cliente = $this->input->post("cliente");
		$id = $this->input->post("id");
		$recoge = $this->input->post("recoge");
		$destino = $this->input->post("destino");
		$transporte = $this->input->post("transporte");
		$placas = $this->input->post("placas");
		$descripcion = $this->input->post("descripcion");

		$for_update = array(
			'cliente'=>$cliente,
			'recoge'=>$recoge,
			'destino'=>$destino,
			'transporte'=>$transporte,
			'placas'=>$placas,
			'descripcion'=>$descripcion
			);
		$data['module'] = 'salidas';

		$data['template'] = 'editar_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');

		$this->tarimas_model->updateSalida($for_update,$id);
		
		$data["clientes"] = $this->clients_model->getAllClients();
		$data["mensaje"] = "Datos actualizados correctamente";

		$data["salida"] = $this->tarimas_model->getSalidaById($id);

		$data["productos"] = $this->tarimas_model->getAlmacenajesByClient($data["salida"]->cliente);
		$data["tarimas"] = $this->tarimas_model->getTarimasByEntrada($id);
		$data["clientes"] = $this->clients_model->getAllClients();
		$data["tarimas_salida"] = $this->tarimas_model->getTarimasBySalida($id);
		$data["tarimas_total"] = $this->tarimas_model->getTarimasByEntradaJustDistinct($id);		
		$this->load->view('template', $data);	

	}
	
	function editar($id = NULL) {
		$data['title'] = '';

		$data['module'] = 'secure';

		$data['template'] = 'editar_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		
		$data["entrada"] = $this->tarimas_model->getEntradaById($id);
		$data["clientes"] = $this->clients_model->getAllClients();
		$this->load->view('template', $data);	
	}
	function editar_salida($id = NULL) {
		$data['title'] = '';

		$data['module'] = 'salidas';

		$data['template'] = 'editar_view';
		
		$this->load->model('tarimas_model');
		$this->load->model('clients_model');
		
		$data["salida"] = $this->tarimas_model->getSalidaById($id);
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

	


	

}