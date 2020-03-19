<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('login/Login_model');
    }

	public function index()
	{
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$this->load->view('login/login_view',$data);
				break;
			case 'administrador':
				redirect(base_url());
				break;
			case 'editor':
				redirect(base_url().'editor');
				break;
			case 'suscriptor':
				redirect(base_url().'suscriptor');
				break;
			default:
				$this->load->view('login/login_view');
				break;
		}
	}

	public function accesso()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){
				$this->form_validation->set_rules('demoemail','Correo','required|valid_email',
					array(
						'required'=>'El campo %s es obligatorio',
						'valid_email'=>'El %s proporcionado no es valido'
					)
				);
				$this->form_validation->set_rules('wordpass','Contraseña','required|trim|min_length[5]|max_length[150]',
					array(
						'required'=>'El campo %s es obligatorio',
						'min_length'=>'Caracteres minimos de contraseña 5',
						'max_length'=>'Excedio el maximo de caracteres de contraseña'
					)
				);
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger" >', '</div>');

					if($this->form_validation->run() == FALSE)
				{
					$this->index();
				}
				else
				{
							$username = $this->input->post('demoemail');
							$pass=$this->input->post('wordpass');
							$password = hash('sha256',$pass);
							$check_user = $this->Login_model->check_user($username,$password);
							if($check_user == TRUE)
							{
								$data = array(
								'is_logued_in' 	=> 		TRUE,
								'id_usuario' 	=> 		$check_user->id_usuario,
								'perfil'		=>		'administrador',//$check_user->perfil,
								'username' 		=> 		$check_user->nick
								);
								$this->session->set_userdata($data);
								$this->index();
							}else{
								$this->session->set_flashdata('usuario_incorrecto','<span style="color:red;">¡Los datos introducidos son incorrectos!</span>');
								$this->index();
							}
				}
		}
		else{
			$this->session->set_flashdata('usuario_incorrecto','<center><p><span style="color:red;">¡Ah¡, ¡Ah¡, ¡Ah¡</span><br/><img style="width:30%;" src="'.base_url().'assets/images/magic_word.gif" alt="magic word" ></p></center>');
			$this->index();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	function calendario()
	{
		$prefs = array (
			'show_next_prev' => TRUE,
			'next_prev_url' => base_url().'login/calendario',
		);
		$this->load->library('calendar');
		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
	}

}
