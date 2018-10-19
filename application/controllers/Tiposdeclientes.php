<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los tipos de clientes

*/
class Tiposdeclientes extends CI_Controller {

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
		
		// invocar la libreria Crud grocery
		// para esto se necesita mandarle una serie de parametros a la libreria que son:
		// nombre de la tabla, campos requeridos, columnas a visualizar, campos a cargar en el sistema, entre otros
		// la libreria devuelve:
		// render - la visualizacion de lo pedido 
		// css_files -> las rutas donde esta los css de la libreria
		// js_files ->las rutas donde estan los js de la libreria
		// todos estos parametros se le pasan a la vista y se imprimen en ella
		// si en la configuracion solo se pasa la tabla, la libreria asume y pinta todos los campos que se encuentren en ella 
		$crud=new grocery_CRUD();
		// aplicar que tema de la tabla deseamos. Si datatables o flexigrid
		$crud->set_theme('flexigrid');
		// cargarle la tabla
		$crud->set_table('tiposdeclientes'); 
		// titulo que se ve en el encabezado de la tabla
		$crud->set_subject('Listado de tipos de clientes');	
		//  definir que texto queremos mostrar en los campos cuando 
		// se esta ingresando o modificando
		$crud->display_as('nombre','Ingrese el tipo de cliente');
		$crud->display_as('fechaderegistro','Fecha de ingreso');
		$crud->display_as('fechademodificacion','Ultimo cambio en el sistema');


		// indicar que campos son obligatorios 
		$crud->required_fields(array('nombre'));
		// indicar que campo se considera unico y que no se puede repetir en el sistema o la tabla
		$crud->unique_fields(array('nombre'));
		// indicar que campos deseamos que se carguen en el proceso de edicion y en el proceso de ingreso
		$crud->fields('nombre');	
		// generar el render

		// todos los botones u opciones se pueden apagar utilizando el comando unset seguido de la opcion
		// opciones que se pueden agagar: add, edit,clone,delete,export,print, read,list
		// ejemplo:  apagar el boton eliminar
		$crud->unset_delete();

		$tabla=$crud->render();
		// cuando se genera el render el devuelve una variable llamada output que es donde todo el contenido resultando de la configuracion
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");
		
		$this->load->view('tiposdeclientes',$vector);
	}

}
