<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los productos

*/
class Productos extends CI_Controller {

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
		$crud->set_table('tblproductos'); 
		$crud->set_subject('Listado de productos del sistema');	
		$crud->set_relation("tipocategoria","tiposdeproductos","nombre");
		$crud->set_relation("proveedor","tblproveedores","{nombrecomercial} - {razonsocial}");
		$crud->set_field_upload("imagen","assets/imagenes/productos/");
		$crud->fields("referencia","nombre","descripcion","imagen","proveedor","precio","impuestos","tipocategoria");
		$crud->required_fields("referencia","nombre","descripcion","tipocategoria","precio","impuestos");
		$crud->unique_fields(array("referencia"));
		$crud->display_as("referencia","Referencia");
		$crud->display_as("nombre","Nombre");
		$crud->display_as("descripcion","Descripcion");
		$crud->display_as("tipocategoria","Categoria asociada");
		$crud->display_as("precio","Precio de venta");
		$crud->display_as("impuestos","% de impuesto");
		$crud->display_as("proveedor","Proveedor");
		$crud->display_as("imagen","Imagen del producto");
		$crud->columns("imagen","referencia","nombre","tipocategoria","precio","impuestos");
		$tabla=$crud->render();
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");
		$this->load->view('productos',$vector);
	}

}





