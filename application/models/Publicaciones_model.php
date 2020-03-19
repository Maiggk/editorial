<?php

class Publicaciones_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }

		public function salvar_publicacion($datos)
		{

			if($query->num_rows() == 1)
			{
				return $query->row();
			}else{
				return FALSE;
			}
		}
}
