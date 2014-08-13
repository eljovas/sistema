<?php

class Citas_model extends CI_Model {

	function getAll($sucursal) {
		$this->db->select('*');
		$this->db->from('citas');
		$this->db->where('citas.status','vigente');
		$this->db->join('procedimientos', 'procedimientos.id = citas.asunto');
		$query = $this->db->get();		
		return $query->result();
	}
	function getCitasCosmetologas($sucursal) {
		$this->db->select('*,citas.id as id_cita,citas.tipo as tipo_cita,clients.id as id_cliente,clients.nombre as nombre_cliente,clients.apellido as apellido_cliente,procedimientos.concepto as concepto_procedimiento');
		$this->db->from('citas');
		$this->db->join('clients', 'clients.id = citas.paciente');
		$this->db->join('procedimientos', 'procedimientos.id = citas.asunto');
		$this->db->where('citas.status','vigente');
		$this->db->where('citas.tipo',"cosmetologa");
		$this->db->where('citas.sucursal',$sucursal);
		$this->db->where('citas.fecha_inicio >= DATE_SUB(now(), INTERVAL 8 DAY)',NULL,FALSE);
		$query = $this->db->get();		

		return $query->result();

	}
	function getCitasDoctores($sucursal) {
		$this->db->select('*,citas.id as id_cita,clients.id as id_cliente,clients.nombre as nombre_cliente,clients.apellido as apellido_cliente,procedimientos.concepto as concepto_procedimiento');
		$this->db->from('citas');

		$this->db->join('clients', 'clients.id = citas.paciente');
		$this->db->join('procedimientos', 'procedimientos.id = citas.asunto');
		$this->db->where('citas.status','vigente');
		$this->db->where('citas.tipo',"doctor");
		$this->db->where('citas.sucursal',$sucursal);
		$this->db->where('citas.fecha_inicio >= DATE_SUB(now(), INTERVAL 8 DAY)',NULL,FALSE);
		$query = $this->db->get();		
		return $query->result();
	}

	function save($new) {

		$query = $this->db->insert('citas', $new);
		return $this->db->insert_id();
	}

	function getCitaById($id) {
		$this->db->select('clients.id as id_cliente,clients.nombre, clients.apellido, clients.email_contacto, clients.telefono_contacto, clients.emergencia_celular, procedimientos.id as id_procedimiento, procedimientos.concepto,procedimientos.sesiones, procedimientos.costo_sesion, procedimientos.costo_paquete, citas.id as id_cita, citas.tipo, citas.fecha_inicio, citas.hora_inicio, citas.fecha_fin, citas.hora_fin, citas.comentarios, user.first_name');
		$this->db->from('citas');
		$this->db->join('clients', 'clients.id = citas.paciente');
		$this->db->join('procedimientos', 'procedimientos.id = citas.asunto');
		$this->db->join('user', 'clients.doctor = user.user_id');
		$this->db->where('citas.id', $id);
		$query = $this->db->get();
		return $query->row(); 
	}
	function getCitaByIdJhovasSeLaCome($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('citas');
		return $query->row(); row(); 
	}	
	function updateCita($id,$update_cita) {
			$this->db->where('id', $id);
			$this->db->update('citas', $update_cita); 
	}	
	function cancelar($id,$recepcionista) {
			$this->db->where('id', $id);
			$now  = date("Y-m-d H:i:s");
			$update = array("cancelada_por"=>$recepcionista,"fecha_cancelada"=>$now,"status"=>"cancelada");
			$this->db->update('citas', $update);
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