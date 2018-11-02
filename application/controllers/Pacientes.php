<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los clientes

*/
class Pacientes extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// cargar la libreria del rud grocery
		
		$this->load->library("grocery_CRUD");
	}


	public function index()
	{

		$crud=new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('pacientes'); 
		$crud->set_subject('Listado de pacientes');	
		$crud->set_relation("tipoidentificacion","tiposidentificacion","Nombre");
		$crud->set_relation("tiposangre","tiposdesangre","nombre");
		$crud->set_relation("eps","listadoeps","Eps");
		$crud->set_relation("enfermedaprevia1","enfermedades","nombre");
		$crud->set_relation("enfermedaprevia2","enfermedades","nombre");
		$crud->set_relation("enfermedaprevia3","enfermedades","nombre");

		$crud->required_fields("identificacion","tipoidentificacion","nombres","apellidos","eps","tiposangre","enfermedaprevia1");

		$crud->display_as("tipoidentificacion","Tipo de identificacion");
		$crud->display_as("enfermedaprevia1","Enfermeda Previa 1");
		$crud->display_as("enfermedaprevia2","Enfermeda Previa 1");
		$crud->display_as("enfermedaprevia3","Enfermeda Previa 1");
		$crud->display_as("tiposangre","Tipo de Sangre");

		$crud->columns("identificacion","nombres","eps","tiposangre");

		$crud->unique_fields("identificacion");

		$tabla=$crud->render();
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$this->load->view('Pacientes',$vector);

	}

}





