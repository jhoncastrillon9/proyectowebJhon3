<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
controlador Para los usuarios

*/
class Usuarios extends CI_Controller {

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
		$crud->set_table('tblusuarios'); 
		$crud->set_subject('Listado de usuarios del sistema');	
		// Si tenemos relaciones con otras tablas se puede usar el comando 
		// set_relation el cual permite relacionar una tabla a otra pero de manera uno a uno
		$crud->set_relation("perfil","perfiles","nombre");
		// en este formulario el campo foto guarda una imagen.
		// para esto usamos la funcion set_field_upload que pide el campo y la ruta donde guardar el archivo o imagen
		$crud->set_field_upload("foto","assets/imagenes/usuarios/");	
		// definir que campos se desean ver en el insertar y en el editar
		// para usamos fields
		$crud->fields("nombre","correo","clave","perfil","telefono","direccion","skype","whatsapp","foto");
		// definir que campo son requeridos
		// required_fields
		$crud->required_fields("nombre","correo","clave","telefono","perfil");
		// a un campo se le puede cambiqr el tipo o type
		$crud->change_field_type("clave","password");
		// definir cual es el campo que no se debe repetir
		// unique field para uno o unique_fields si son varios
		$crud->unique_fields(array("correo"));
		// en algunos tenemos que hacer procesos ANTES DE insertar o modificar
		// porque esta herramienta ingresa los datos tal cual como esten en el formulario. Para esos usamos las callback y en este callback_before_insert que lo que hace ejecutar algo antes del proceso de insercion. esta funcion se le debe pasar dos parametros:
		// 1. el vector del formulario que lo controla crud-grocery
		// 2. el proceso o funcion que debe realizar y evaluar al vector
		// para este tenemos que encriptar con sha1 el campo clave
		$crud->callback_before_insert(array($this,"encriptar"));
		// cambiar algunos textos con display_as
		$crud->display_as("clave","Digite la contraseña");
		$crud->display_as("direccion","Digite la dirección de contacto");
		// en la principal listado definamos que columnas queremos que se muestren
		$crud->columns("foto","nombre","telefono","correo","skype","whatsapp");
		// cuando se en este estado editar que el campo clave sea oculto para evitar que sobreescriban la clave encriptada
		if ($crud->getState()=="edit") $crud->field_type("clave","hidden");



		$tabla=$crud->render();


		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");
		
		$this->load->view('usuarios',$vector);
	}

	// crear funcion que permita encriptar
	// crud grocery utiliza variables reservadas
	// la variable que almacena los datos del formulario es post_array
	// para este caso debemos pasar es esa variable y una que definamos nosotros
	function encriptar($post_array) {

			// $post_array es el array que contiene los datos enviados desde el formulario en donde este invocando el crud. en este caso vector contiene lo campos que son enviados desde el formulario de usuario. 
			// lo que estamos es que si encuentra el campo clave lo encripte y devuelve el vector con ese cambio. El crud lo recibe y lo inserta a la base de datos

			$post_array["clave"]=sha1($post_array["clave"]);
			return $post_array ;

	}

}





