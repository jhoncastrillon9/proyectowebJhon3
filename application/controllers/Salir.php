<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para que se salga del sistema limpiando las sessiones y devolviendolo a login

*/
class Salir extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
	}

	public function index()
	{
		// destruir las sessiones
		$this->session->sess_destroy();
		// redireccionar
		redirect('login');

	}

}
