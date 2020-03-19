<?php

class Login_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }


		public function check_user($correo,$password)
		{
			$this->db->from('brc_usuarios');
			$this->db->where('correo',$correo);
			$this->db->where('pass',$password);
			$query = $this->db->get();
			if($query->num_rows() == 1)
			{
				return $query->row();
			}else{
				return FALSE;
			}
		}
}
