<?php

class Consulta_general extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }

    public function _inserta($tabla,$datos)
	{
		$this->db->insert($tabla,$datos);
		return $this->db->insert_id();
	}

	public function _seleccionar_uno($tabla,$campo_select='*',$campo_where=TRUE,$valor=TRUE)
	{
		$this->db->select($campo_select);
		$this->db->from($tabla);
		$this->db->where($campo_where,$valor);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return false;
		}
	}

	public function _seleccionar_muchos($tabla,$campo_select='*',$campo_where=TRUE,$valor=TRUE)
	{
		$this->db->select($campo_select);
		$this->db->from($tabla);
		$this->db->where($campo_where,$valor);
		$query = $this->db->get();
		if($query->num_rows() >=	 1)
		{
			return $query->result();
		}else{
			return false;
		}
	}

	public function _seleccionar_muchos_oder_by($tabla,$campo_select='*',$campo_where=TRUE,$valor=TRUE)
	{
		$this->db->select($campo_select);
		$this->db->from($tabla);
		$this->db->where($campo_where,$valor);
		$this->db->order_by($campo_where,$valor);
		$query = $this->db->get();
		if($query->num_rows() >=	 1)
		{
			return $query->result();
		}else{
			return false;
		}
	}

	public function _actualiza($tabla,$datos,$campo_where=TRUE,$valor=TRUE)
	{
		$this->db->where($campo_where,$valor);
		$this->db->update($tabla,$datos);
	}
}
