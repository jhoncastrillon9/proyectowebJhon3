<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador principal
para entrar a este controlador le podemos desde el constrcutor que valide si esta logueado 
o que es lo mismo que exista la variable de session

*/
class Principal extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
	}


	public function index()
	{
		// a este controlador que carga la vista principal necesitamos pasarle datos
		// para esto, CI lo permite pero si se pasan en vectores
		// 1. pasar el nombre del usuario
		$vector["usuario"]=$this->session->userdata("nombredeusuario");
		// se pueden pasar todos los valores que se deseen
		// en la vista se imprimir lo que este en cada posicion del vector.
		// esto quiere decir que deseamos imprimir la variable $vector["usuario"]
		// se hace es $usuario
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");

		$this->load->view('principal',$vector);
	}

}
