<?php

class Servicios_model extends CI_Model {

	function getServices($camara = NULL) {
		$query = $this->db->get('servicios');
		return $query->result(); 
	}
	function getServicesForPrintByClient($id = NULL) {
		$rs = $this->db->query('SELECT s.rubro,s.concepto,sc.costo FROM servicios AS s INNER JOIN servicios_xref_clientes AS sc ON s.id = sc.id_servicio AND  sc.id_cliente = '.$id.' ORDER BY sc.creacted_date DESC');
		return $rs->result(); 
	}	
	function getServicesByCient($cliente = NULL) {
		$this->db->where('id_cliente', $cliente);
		$query = $this->db->get('servicios_xref_clientes');
		return $query->result(); 
	}	
	function save($new_service_array) {
		$this->db->insert('servicios', $new_service_array);
	}
	function save_service_client($new_service_array) {
		$this->db->insert('servicios_xref_clientes', $new_service_array);
	}	

	function getAllTarimasByCamara($camara = NULL) {
		$this->db->order_by("bloque", "desc");
		$this->db->order_by("calle", "asc");
		$this->db->where('camara', $camara);
		$query = $this->db->get('tarimas');
		return $query->result(); 
	}

	function getAllTarimasByCamaraAndStatus($camara = NULL, $status = NULL) {
		$this->db->where('camara', $camara);
		$this->db->where('status', $status);
		$this->db->from('tarimas');
		return $this->db->count_all_results();	
	}	


	function getServiceById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('servicios');
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
			$this->db->delete('servicios'); 
	}	
	function reset_service_client($cliente) {
			$this->db->where('id_cliente', $cliente);
			$this->db->delete('servicios_xref_clientes'); 
	}	
	
	function update($id,$data) {
			$this->db->where('id', $id);
			$this->db->update('servicios', $data); 
	}	
	
}