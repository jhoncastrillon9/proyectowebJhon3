<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los clientes

*/
class Clientes extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// cargar la libreria del rud grocery
		
		$this->load->library("grocery_CRUD");

		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
	}


	public function index()
	{
		$vector["usuario"]=$this->session->userdata("nombredeusuario");

		$crud=new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('tblclientes'); 
		$crud->set_subject('Listado de clientes del sistema');	
		$crud->set_relation("tipocliente","tiposdeclientes","nombre");
		$crud->set_field_upload("copiarut","assets/imagenes/clientes/");
		$crud->set_field_upload("cedulareplegal","assets/imagenes/clientes/");
		$crud->fields("identificacion","razonsocial","nombrecomercial","tipocliente","telefono","direccion","copiarut","cedulareplegal","replegal","correo");
		$crud->required_fields("identificacion","razonsocial","telefono","direccion","copiarut","correo");
		$crud->unique_fields(array("identificacion"));
		$crud->display_as("identificacion","Digite el nit o identificación");
		$crud->display_as("razonsocial","Digite la razón social");
		$crud->display_as("nombrecomercial","Digite el nombre comercial");
		$crud->display_as("tipocliente","Seleccion el tipo de cliente");
		$crud->display_as("telefono","Digite el teléfono");
		$crud->display_as("direccion","Digite la dirección");
		$crud->display_as("copiarut","Cargue la copia del RUT");
		$crud->display_as("cedulareplegal","Cargue copia del representante legal");
		$crud->display_as("replegal","Ingrese el representante legal");
		$crud->display_as("correo","Correo electrónico de contacto");

		$crud->columns("razonsocial","telefono","direccion","tipocliente");

		$tabla=$crud->render();
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");
		$this->load->view('clientes',$vector);
	}

}





