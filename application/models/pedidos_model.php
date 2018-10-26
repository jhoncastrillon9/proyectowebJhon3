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

	function agregar_productos(){

		// como ese esta suando ajax podemos enviar un echo o un print.r o un conetido html para que 
		//muestre en la capa que selecionemos o en el f12 del explorador
		//print_r($_POST);
		//cuando se ejecute agregar desde el boton mas del pedido se inserte de madera inicial 
	$valor = $this->input->post("valor");
	$nombre = $this->input->post("nombre");
	$impuesto = $this->input->post("impuesto");
	$cantidad = $this->input->post("cantidad");
	$subtotal = $this->input->post("subtotal");
	$referencia = $this->input->post("referencia");
	$token = $this->input->post("token");
	$tipo = $this->input->post("tipo");

		//peveri uinyesion de codigo
		$valor = $this->security->xss_clean($valor);
		$nombre = $this->security->xss_clean($nombre);
		$impuesto = $this->security->xss_clean($impuesto);
		$cantidad = $this->security->xss_clean($cantidad);
		$subtotal = $this->security->xss_clean($subtotal);
		$referencia = $this->security->xss_clean($referencia);
		$token = $this->security->xss_clean($token);
		$tipo = $this->security->xss_clean($tipo);

		//si exsite que lo update o sino que lo inseerte 
		$vector=array("token"=>$token, "referencia"=>$referencia);
		$query = $this->db->get_where($this->tabla2,$vector);
		$res=$query->result_array();
		if (count($res)>0) {
				//actualizar
				$data=array(
						"cantidad"=>$cantidad,
						"subtotal"=>$subtotal,
						"impuestos"=>$impuesto,
						"valor"=>$valor
				);
				
				//en CI se paa primero las reglas y luego la tabla a actualizar
				$this->db->where("token",$token);
				$this->db->where("referencia",$referencia);
				if ($tipo==2) {
					$this->db->delete($this->tabla2,$data);
				}else {
					$this->db->update($this->tabla2,$data);	
				}
				
		}
		else{
			//insertar
				$data=array(
						"cantidad"=>$cantidad,
						"subtotal"=>$subtotal,
						"impuestos"=>$impuesto,
						"valor"=>$valor,
						"token"=>$token,
						"referencia"=>$referencia
				);

				$this->db->insert($this->tabla2,$data);

		}

			return true;

	}

	function carrito(){
		//acer uns select 
		$total=0;
		$token = $this->input->post("token");
		$token = $this->security->xss_clean($token);
		$data=array("token"=>$token);
		$query = $this->db->get_where($this->tabla2,$data);
		$res=$query->result_array();

		foreach ($res as $fila) {
			$total = $total+$fila["subtotal"];
		}

		return	$total;

	}

}
?>










