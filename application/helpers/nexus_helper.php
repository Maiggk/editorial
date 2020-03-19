<?php


function vista_principal($vista,$datos=NULL){

	//force_ssl(); //Descomentar para desatar todo el poder HTTPS
	$CI = &get_instance();
	$CI->load->library('session');
	$CI->load->library('calendar');

		$CI->load->view('estructura/header',array('title_page'=>(isset($datos['title_page']))?$datos['title_page']:''));
		$CI->load->view($vista);
		$CI->load->view('estructura/menu');
		$CI->load->view('estructura/footer');
}

function vista_principal_datos($vista,$datos=NULL){
	$CI = &get_instance();
	$CI->load->library('session');
	$CI->load->library('calendar');

		$CI->load->view('estructura/header',array('title_page'=>(isset($datos['title_page']))?$datos['title_page']:''));
		$CI->load->view($vista,$datos);
		$CI->load->view('estructura/menu');
		$CI->load->view('estructura/footer');

}

function vista_privilegios($vista=NULL,$datos=NULL)
{
	//force_ssl(); //Descomentar para desatar todo el poder HTTPS
	$CI = &get_instance();
	$CI->load->library('session');
	$CI->load->library('calendar');

	if($CI->session->userdata('is_logued_in')){
		$CI->load->view('estructura/header',array('title_page'=>(isset($datos['title_page']))?$datos['title_page']:''));
		$CI->load->view($vista,$datos);
		$CI->load->view('estructura/menu');
		$CI->load->view('estructura/footer');
	}else{
		redirect(base_url());
	}
}

function decimales_ceros($n, $n_decimals) //Funcion de transformacion a formato de pesos "$190.50"
{
	$CI = &get_instance();
	$CI->load->library('session');
	return ((floor($n) == round($n, $n_decimals)) ? number_format($n,$n_decimals) : number_format($n, $n_decimals));

}

if (!function_exists('force_ssl'))
{
    function force_ssl()
    {
        $CI =& get_instance();
        $CI->config->config['base_url'] =
                 str_replace('http://', 'https://',
                 $CI->config->config['base_url']);
        if ($_SERVER['SERVER_PORT'] != 443)
        {
            redirect($CI->uri->uri_string());
        }
    }
}

function remove_ssl()
{
    $CI =& get_instance();
    $CI->config->config['base_url'] =
                  str_replace('https://', 'http://',
                  $CI->config->config['base_url']);
    if ($_SERVER['SERVER_PORT'] != 80)
    {
        redirect($CI->uri->uri_string());
    }
}

if (!function_exists('asset_url'))
{
    function asset_url()
    {
        $CI =& get_instance();
		return base_url().'assets/';
    }
}

	 function token()
	{
		$CI =& get_instance();
		$token = md5(uniqid(rand(),true));
		$CI->session->set_userdata('token',$token);
		return $token;
	}

