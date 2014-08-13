<?php

class Tarimas_model extends CI_Model {

	function getCountTarimasByCamara($camara = NULL) {
		$this->db->where('camara', $camara);
		$this->db->from('tarimas');
		return $this->db->count_all_results();
	}
	function getTarimaAjax($tarima = NULL) {
		$query = $this->db->query("select *, t.id as tarimaid from entradas_xref_tarimas as ex inner join tarimas as t on ex.tarima = t.id inner join almacenajes as a on a.id = ex.almacenaje where t.id  = ".$tarima);
		return $query->result();
	}
	function verificar_tarima($tarima = NULL) {
		$this->db->where('id', $tarima);
		$query = $this->db->get('tarimas');
		return $query->row(); 
	}	
	function asigna_tarima($entrada = NULL, $tarima = NULL, $producto = NULL, $lote = NULL, $kilos = NULL, $caducidad = NULL) {
		 $this->db->insert('entradas_xref_tarimas',array('entrada'=>$entrada,'almacenaje'=>$producto,'lote'=>$lote,'kilos'=>$kilos,'caducidad'=>$caducidad,'tarima'=>$tarima));
		 $this->db->where('id', $tarima);
		 $query = $this->db->update('tarimas', array('status'=>'ocupado'));
	}		
	function saca_producto($insert_array) {
		$this->db->insert('salidas_xref_tarimas', $insert_array);
		return $this->db->insert_id();
	}	
	function getAllTarimasByCamara($camara = NULL) {
		$this->db->order_by("bloque", "desc");
		$this->db->order_by("calle", "asc");
		$this->db->where('camara', $camara);
		$query = $this->db->get('tarimas');
		return $query->result(); 
	}
	function getTarimasByEntrada($entrada = NULL) {
		$this->db->where('entrada', $entrada);
		$this->db->join('tarimas', 'tarimas.id = entradas_xref_tarimas.tarima');
		$this->db->join('almacenajes', 'almacenajes.id = entradas_xref_tarimas.almacenaje');
		$query = $this->db->get('entradas_xref_tarimas');
		return $query->result(); 
	}
	function getTarimasBySalida($salida = NULL) {
		$this->db->where('salida', $salida);
		$this->db->join('tarimas', 'tarimas.id = salidas_xref_tarimas.tarima');
		$this->db->join('almacenajes', 'almacenajes.id = salidas_xref_tarimas.almacenaje');
		$query = $this->db->get('salidas_xref_tarimas');
		return $query->result(); 
	}	
	function getTarimasByEntradaJustDistinct($entrada = NULL) {
		$query = $this->db->query("select count(*) from entradas_xref_tarimas inner join tarimas on tarimas.id = entradas_xref_tarimas.tarima inner join almacenajes on almacenajes.id = entradas_xref_tarimas.almacenaje where entradas_xref_tarimas.entrada = ".$entrada." group by tarimas.id ");
		return $query->result(); 
	}	
	function getTarimasByCliente($cliente = NULL) {
		$query = $this->db->query('SELECT t.id, t.camara, t.bloque, t.calle FROM entradas_xref_tarimas AS ext INNER JOIN entradas AS e ON e.id = ext.entrada INNER JOIN tarimas AS t ON t.id = ext.tarima WHERE e.cliente = ' . $cliente);
		return $query->result(); 
	}

	
	function getAllEntradas() {
		$this->db->order_by("created_date", "desc");
		$this->db->select("entradas.id as entrada_id, entradas.folio as folio, clients.razon_comercial as cliente, entradas.nombre_recibe, entradas.operador, entradas.created_date");
		$this->db->join('clients', 'clients.id = entradas.cliente');
		$query = $this->db->get('entradas');
		return $query->result(); 
	}	
	function getAllSalidas() {
		$this->db->order_by("salidas.created_date", "desc");
		$this->db->select("salidas.id as salida_id, salidas.folio as folio, clients.razon_comercial as cliente, salidas.recoge, salidas.created_date");
		$this->db->join('clients', 'clients.id = salidas.cliente');
		$query = $this->db->get('salidas');
		return $query->result(); 
	}	
	function getTarifasByCliente($cliente = NULL) {
		$this->db->where('id_cliente', $cliente);
		$query = $this->db->get('tarifas_almacenamiento');
		return $query->row();  
	}		

	function getAlmacenajeById($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('almacenajes');
		return $query->row(); 
	}	
	function getAlmacenajesByClient($id = NULL) {
		$this->db->where('cliente', $id);
		$query = $this->db->get('almacenajes');
		return $query->result(); 
	}	
	function getEntradaById($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('entradas');
		return $query->row(); 
	}
	function getSalidaById($id = NULL) {
		$this->db->where('id', $id);
		$query = $this->db->get('salidas');
		return $query->row(); 
	}
	
	function updateAlmacenaje($for_save, $id) {
		$this->db->where('id', $id);
		$query = $this->db->update('almacenajes', $for_save);
	}

	function updateTarifasCliente($id, $for_update) {
		$this->db->where('id_cliente', $id);
		$query = $this->db->update('tarifas_almacenamiento', $for_update);
	}

	function updateEntrada($for_save, $id) {
		$this->db->where('id', $id);
		$query = $this->db->update('entradas', $for_save);
	}		
	function updateSalida($for_update, $id) {
		$this->db->where('id', $id);
		$query = $this->db->update('salidas', $for_update);
	}	
	function getAllAlmacenajes() {
		$this->db->order_by('created_date','DESC');
		$this->db->select("clients.razon_comercial as cliente1,almacenajes.id as id1, almacenajes.codigo_producto,almacenajes.nombre_producto,almacenajes.descripcion_empaque,almacenajes.valor_reposicion,almacenajes.refrigerado_congelado,almacenajes.temperatura_optima,almacenajes.tipo_empaque,almacenajes.peso_bruto,almacenajes.peso_neto,almacenajes.peso_variable,almacenajes.largo,almacenajes.alto,almacenajes.ancho,almacenajes.diametro,almacenajes.empaques_por_cama,almacenajes.camas_por_pallet,almacenajes.empaques_por_pallet,almacenajes.minima_recibo,almacenajes.minima_embarque,almacenajes.instrucciones,almacenajes.created_date");
		$this->db->order_by("created_date", "desc");
		$this->db->join('clients', 'clients.id = almacenajes.cliente');
		$query = $this->db->get('almacenajes');
		return $query->result(); 
	}	

	function getAllTarimasByCamaraAndStatus($camara = NULL, $status = NULL) {
		$this->db->where('camara', $camara);
		$this->db->where('status', $status);
		$this->db->from('tarimas');
		return $this->db->count_all_results();	
	}	
	function save($social,$comercial,$contacto,$correo,$telefono) {
		$new_client_array = array('razon_social'=>$social,
			'razon_comercial'=>$comercial,
			'fecha_ingreso'=>date("Y-m-d"),
			'nombre_contacto'=>$contacto,
			'email_contacto'=>$correo,
			'telefono_contacto'=>$telefono
			);
		$query = $this->db->insert('clients', $new_client_array);
	}
	function saveAlmacenaje($new_almacenaje_array) {
		$this->db->insert('almacenajes', $new_almacenaje_array);
		return $this->db->insert_id();
	}
	function saveSalida($new_array) {
		$this->db->insert('salidas', $new_array);
		return $this->db->insert_id();
	}
	
	function saveTarifasCliente($tarifas){
		$query = $this->db->insert('tarifas_almacenamiento', $tarifas);
	}
	function saveEntrada($new_entrada_array) {
		$this->db->insert('entradas', $new_entrada_array);
	}		


	function getClientById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('clients');
		return $query->row(); 
	}
	function updateClient($id,$social,$comercial,$contacto,$correo,$telefono) {
			$data = array(
               'razon_social' => $social,
               'razon_comercial' => $comercial,
               'nombre_contacto' => $contacto,
               'email_contacto' => $correo,
               'telefono_contacto' => $telefono,
            );
			$this->db->where('id', $id);
			$this->db->update('clients', $data); 
	}	
	function eliminar($id) {
			$this->db->where('id', $id);
			$this->db->delete('clients'); 
	}		
	function eliminar_almacenaje($id) {
			$this->db->where('id', $id);
			$this->db->delete('almacenajes'); 
	}		
	function eliminar_entrada($id) {
			$this->db->where('id', $id);
			$this->db->delete('entradas'); 
	}		
	function eliminar_salida($id) {
			$this->db->where('id', $id);
			$this->db->delete('salidas'); 
	}		
			
	function updateUserPass($id,$username,$email,$password,$first_name,$last_name,$role) {
			$data = array(
               'username' => $username,
               'email' => $email,
               'password' => $password,
               'first_name' => $first_name,
               'last_name' => $last_name,
               'user_level' => $role,
            );
			$this->db->where('user_id', $id);
			$this->db->update('user', $data); 
	}	
	function verify_and_get_user($username, $password) {
		$this->db->select('user_id, username, first_name, last_name, user_level');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('user');
	
		if ($query->num_rows() == 1) {
			//use reference code and dev message for logging/error handling here if needed
			$data['is_true'] = TRUE;
			$data['message'] = $this->config->item('welcome_message');
			$data['query_result'] = $query->result(); 
			//$data['query_result_array'] = $query->result_array(); 
			//$data['reference_code'] = '001';
			//$data['dev_message'] = 'User has logged in';
			return $data;
		} elseif ($query->num_rows() == 0) {
			$data['is_true'] = FALSE;
			$data['message'] = 'The username and password didn\'t match. If you forgot your password, you can recover it '.anchor('members/forgot/password', 'here').'.';
			return $data;
		} elseif ($query->num_rows() > 1) {
			$data['is_true'] = FALSE;
			$data['message'] = 'Dude, something went wrong! Please try again or contact the site administrator.';
			//$data['reference_code'] = '003';
			//$data['dev_message'] = 'The username and password match more than once in the database.';
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Something went wrong! Please try again, if the problem persists, contact a site administrator.';
			//$data['reference_code'] = '004';
			//$data['dev_message'] = 'Database, script, or site failure.';
			return $data;
		}
	}

	function check_username_exist($username) {
		$this->db->select('username');
		$this->db->where('username', $username);
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function check_email_exist($email) {
		$this->db->select('email');
		$this->db->where('email', $email);
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function create_user($new_user_array) {
		$query = $this->db->insert('user', $new_user_array);

		if ($query == TRUE) {
			$data['is_true'] = TRUE;
			$data['message'] = 'A new user has been successfully created.';
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to create user! Please try again, if the problem persists, contact a site admin.';
			return $data;
		}
	}
	
	//get users
	function get_user() {
		$this->db->select('user_id, username');
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			$data['is_true'] = TRUE;
			$data['query_result'] = $query->result();
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to get users.';
			return $data;
		}
	}
	
	//get user
	function get_user_by_username($username) {
		$this->db->select('user_id, username, first_name, last_name, user_level');
		$this->db->where('username', $username);
		$this->db->limit(1);
		
		$query = $this->db->get('user');
		
		if ($query == TRUE) {
			$data['is_true'] = TRUE;
			$data['query_result'] = $query->result();
			$data['message'] = 'Successfully retrieved user';
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to retrieved user';
			return $data;
		}
	}
	
	function verify_password($user_id, $password) {
		$this->db->select('user_id', 'password');
		$this->db->where('user_id', $user_id);
		$this->db->where('password', $password);
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	function update_user($user_id, $item) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->update('user', $item);
	
		if ($query == TRUE) {
			$data['is_true'] = TRUE;
			$data['message'] = 'Successfully updated user.';
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to update usesr.';
			return $data;
		}
	}	
	
	function delete_user($user_id) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->delete('user');
		
		if ($query) {
			$data['is_true'] = TRUE;
			$data['message'] = 'Successfully deleted user!';
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to delete user!';
			return $data;
		}
	}
	
	function get_username($email) {
		$this->db->select('username');
		$this->db->where('email', $email);
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() > 0) {
			$data['message'] = 'Successfully retrieved email!';
			$data['is_true'] = TRUE;
			$data['query_result'] = $query->result();
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to find any matching usernames!';
			return $data;
		}
	}
	
	function verify_recover_password($username, $email) {
		$this->db->select('user_id');
		$this->db->where('username', $username);
		$this->db->where('email', $email);
		
		$query = $this->db->get('user');
		
		if ($query->num_rows() == 1) {
			$data['query_result'] = $query->result();
			$data['message'] = 'The username and email match';
			$data['is_true'] = TRUE;
			return $data;
		} elseif ($query->num_rows() > 1) {
			$data['message'] = 'An error has occurred. Please contact a site admin';
			//$data['reference_code'] = '008';
			//$data['dev_message'] = 'User exists in the database twice (username and email)';
			$data['is_true'] = FALSE;
			return $data;
		} else {
			$data['is_true'] = FALSE;
			$data['message'] = 'Failed to find any matching data!';
			return $data;
		}
	}
	
}