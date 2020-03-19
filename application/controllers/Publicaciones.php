<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->library(array('form_validation','session'));
        $this->load->helper('nexus_helper');
		$this->load->helper('url');
		$this->load->library('recaptcha');
		$this->load->model('Publicaciones_model');
		$this->load->model('Consulta_general');
    }

	public function index()
	{
		if($this->session->userdata('is_logued_in')){
			$data['recaptcha']=$this->recaptcha->getWidget();
			$data['scriptCaptcha']=$this->recaptcha->getScriptTag();
			$data['token']=token();
			$data['categorias']=$this->Consulta_general->_seleccionar_muchos('brc_categorias');

			$data['title_page']="Nueva Publicacion";
			vista_principal_datos('nueva_publicacion',$data);

		}else{redirect(base_url());}
	}

	function salvar_publicacion()
	{

		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){ //Validacion de Tolen de seguridad
			$this->form_validation->set_rules('titulo_pub','Titulo','required',array('required'=>'El campo %s es obligatorio'));
			$this->form_validation->set_rules('category','Categoria','required',array('required'=>'El campo %s es obligatorio'));
			$this->form_validation->set_rules('bodymessage','Mensaje','required',array('required'=>'El campo %s es obligatorio'));
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');

			if($this->form_validation->run() == FALSE) //Validacion de campos vacios en formularios
			{
				$this->index();
			}else{
					$recaptcha = $this->input->post('g-recaptcha-response');
					$response = $this->recaptcha->verifyResponse($recaptcha);
					if (isset($response['success']) and $response['success'] === true) { //Validacion de Captcha

							$this->load->helper('string');
							$config['upload_path']          = 'assets/images/imagenes_publicacion';
							$config['allowed_types']        = 'gif|jpg|png';
							$config['max_size']             = 0;//Cero indica no limite(2mb php.ini). Kb
							$config['max_width']            = 0;//Maximo en pixeles ancho. 0 no limite
							$config['max_height']           = 0;//Maximo en pixeles alto. 0 no limite
							$config['file_name']           = random_string('alpha',15);//Cadena aleatoria para el nombre
							$this->load->library('upload', $config);
							$field_file="imagen_pub";

							$publicacion=array(
								"usuario_publicacion"=>$this->session->userdata('id_usuario'),
								"titulo"=>$this->input->post('titulo_pub'),
								"subtitulo"=>$this->input->post('sub_pub'),
								"contenido"=>$this->input->post('bodymessage'),
								"categoria"=>$this->input->post('category'),
							);

							if($this->upload->do_upload($field_file)){
								$data = $this->upload->data();
								$publicacion["portada_publicacion"]=$data['file_name'];
							}
							$this->Consulta_general->_insertar('brc_publicacion',$publicacion);
							redirect(base_url());

					}else{$this->session->set_flashdata('validacion_error','<span style="color:red;">¡Captcha no validado!</span>');
								$this->index();
					}
			}
		}else{$this->session->set_flashdata('validacion_error','Seguridad del formulario comprometido'); redirect(publicacion);}
	}


}
