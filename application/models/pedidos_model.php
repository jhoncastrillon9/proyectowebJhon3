<?php
/* 
Modelo para de pedidos
aca se realiz agregar productos 
ver carrito 
eliminar carrito 
ver pedido completo 
listar pedidos 
*/
class pedidos_model extends CI_Model
{
	
	function __construct()
	{
		// como este modelo recibe parametros desde un formulario
		// se recomienda que los datos pasen por la libreria o helper security
		// este helper permite validar sql injection, CSFS, XSS, entre otros
		$this->load->helper('security');
		$this->tabla1= "tblpedidos_encabezado";
		$this->tabla2= "tblpedidos_detalle";
		

	}
	// crear una funcion que nos permita validar la existencia del usuario
	// en el modelo lo unico que se hara es una consulta a la tabla
	// y el resultado sea positivo o negativo lo evalua el controlador
	function validar_usuario() {
		// con el helper security vamos a formatear los dos campos que necesitamos
		//1. Para recuperar una variable que viene en un formulario
		//$correo=$_POST['correo'];
		$correo=$this->input->post("correo");
		$clave=$this->input->post("clave");
		//2. Aplicarle la libreria security
		$correo=$this->security->xss_clean($correo);
		$clave=$this->security->xss_clean($clave);
		// buscar el usuario 
		//select * from tblusuarios where correo='$correo' and clave=sha1('$clave')
		// en vez de pasar el query, usaremos la funcion de la base de datos que se llama get_where que pide la tabla y en un vector los parametros a consultar. Este tipo de consultas siempre devuelven un resultado en vector
		
		$vector=array("correo"=>$correo,"clave"=>sha1($clave));
		$query=$this->db->get_where("tblusuarios",$vector);
		// cuando realice la consulta que devuelve el resultado
		return $query->result_array();

	}
}
?>










