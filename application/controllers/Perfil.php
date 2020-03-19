<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->library(array('form_validation','session'));
        $this->load->helper('nexus_helper');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Consulta_general');
    }

	public function index()
	{
		$datos['datos_cliente']=$this->Consulta_general->_seleccionar_muchos('brc_usuarios','*','id_usuario',$this->session->id_usuario);
        $datos['token']=token();
		$datos['title_page']="Perfil";
		vista_privilegios('perfil_view',$datos);
	}

    function salva_cambios()
    {
        $this->form_validation->set_rules(
            'first_name','Nombre',
            'trim|required|min_length[3]|max_length[60]',
            array('required'=>'Campo %s requerido','min_length'=>'Minimo de caracteres 3','max_length'=>'Supero el maximo de caracteres de %s'));
        $this->form_validation->set_rules(
            'last_name','Apellidos',
            'required|trim|min_length[3]|max_length[75]',
            array('required'=>'Campo %s requerido','min_length'=>'Minimo de caracteres 3','max_length'=>'Supero el maximo de caracteres de %s'));
        $this->form_validation->set_rules(
            'email','Email',
            'required|trim|valid_email',
            array('required'=>'Campo %s requerido','valid_email'=>'Correo no valido'));
		if($this->input->post('password')!='' || $this->input->post('password_confirmation')!='' || $this->input->post('new_pass')!='')
		{
			$this->form_validation->set_rules('password','Contraseña','trim|min_length[8]|callback_password_check',array('min_length'=>'Minimo 8 caracteres'));
			$this->form_validation->set_rules('password_confirmation','Contraseña Verificacion','min_length[8]|matches[password]',array('min_length'=>'Minimo 8 caracteres','matches'=>'Las contraseñas no coinciden'));
			$this->form_validation->set_rules('new_pass','Nueva cotraseña','trim|callback_new_password[password]');
		}
        $this->form_validation->set_error_delimiters('<span style="color:red;" class="form-group has-error">','</span>');

        if($this->form_validation->run()==FALSE){ //Probamos si las reglas de validacion
            $this->index();
        }else{
            if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')){//Validacion de token
                if($this->input->post('password')==$this->input->post('password_confirmation'))//Validacion de passwords
                {
                    $datos_update=array(
                        "nombre"=>$this->input->post('first_name'),
                        "apellidos"=>$this->input->post('last_name'),
                        "correo"=>$this->input->post('email'),
                        "pass"=>hash('sha256',$this->input->post('new_pass')),
                    );
                    $this->Consulta_general->_actualiza('brc_usuarios',$datos_update,'id_usuario',$this->session->userdata('id_usuario'));
                    redirect(base_url());
                }else{
                    $this->session->set_flashdata('error_form','Las contraseñas no coinciden');
                    $this->index();
                }
            }else{
                $this->session->set_flashdata('error_form','<center><p><span style="color:red;">¡Ah¡, ¡Ah¡, ¡Ah¡</span><br/><img style="width:30%;" src="'.base_url().'assets/images/magic_word.gif" alt="magic word" ></p></center>');
                $this->index();
            }
        }
    }

	function password_check($str)
    {
        $patron="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}$^";
		$pass=$this->Consulta_general->_seleccionar_uno('brc_usuarios','pass','id_usuario',$this->session->id_usuario);
        $sujeto=$str;
		$contraseña=hash('sha256',$str);
        if(preg_match($patron, $sujeto)===1 && $contraseña==$pass->pass)
        {
            return TRUE;
        }else{
            $this->form_validation->set_message('password_check', 'La contraseña no es valida');
            return FALSE;
        }
    }

	function new_password($str,$old_password)
    {
        $patron="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}$^";
        $sujeto=$str;
        if(preg_match($patron, $sujeto)===1 && $old_password!='')
        {
            return TRUE;
        }
		else{
            $this->form_validation->set_message('password_check', 'La contraseña no cumple con los requisitos');
            return FALSE;
        }
    }
}
