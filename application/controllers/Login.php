<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador por defecto login
se cargara la pagina de login
En los controladores si deseamos cargar librerias, modelos otros controladores usamos el metodo construct para que tengamos que estar instanciando en cada metodo o funcion los mismos procesos

*/
class Login extends CI_Controller {

	public function __construct() {
		// como esta clase hereda del CI_Controller, apliquemos la funcion que permite heredar el constructor de este
		parent:: __construct();
		// cargar el modelo que permite validar si el usuario existe. En la mayoria de los casos los modelos como el controlador y se le agrega la palabra _model y como sucede con el controlador la primera letra en mayuscula
		$this->load->Model('login_model');

	}


	public function index()
	{
		$this->load->view('login');
	}

	public function acceso() {
		// llamar la consulta de la base de datos que se realizo en el login_model
		
		$resultados=$this->login_model->validar_usuario();
		// acciones a realizar
		// si encuentra resultados lo mande a principal pero cargando las variables de session
		// en caso contrario cargamos la vista login. Cuando existan variables de session se recomienda hacer un redireccionador.
		if (count($resultados)>0) {
			// cargar las session
			// las variables de session se carga usando la funcion set_userdata y lo que es un vector pasando el nombre y el valor de la session que deseemos

			$data_session=array(
				"idusuario"=>$resultados[0]["pkid"],
				"nombredeusuario"=>$resultados[0]["nombre"],
				"idperfil"=>$resultados[0]["perfil"],
				"correousuario"=>$resultados[0]["correo"],
				"imgusuario"=>$resultados[0]["foto"]

			);
			$this->session->set_userdata($data_session);
			redirect('principal');

		} else {
			// redireccionar hacia login
			redirect('login');
		}

	}
}
