<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los clientes

*/
class Sangre extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// cargar la libreria del rud grocery
		
		$this->load->library("grocery_CRUD");
	}


	public function index()
	{

		$crud=new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tiposdesangre'); 
		$crud->set_subject('Listado de Tipos de Sangre');			

		$crud->required_fields("nombre");

		$crud->unique_fields("nombre");

		$tabla=$crud->render();
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$this->load->view('Sangre',$vector);

	}

}





