<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->library(array('form_validation','session'));
        $this->load->helper('nexus_helper');
		$this->load->helper('url');
    }

	public function index()
	{
		$data['title_page']='Home';
		vista_principal('principal',$data);
	}

	function generic()
	{
		$data['title_page']='Plantilla Publicacion';
		vista_principal('generic',$data);
	}

	function elements()
	{
		$data['title_page']='Elementos';
		vista_principal('elements',$data);
	}

	function _404()
	{
		$data['title_page']='404';
		$this->load->view('estructura/error_404');
	}
}
