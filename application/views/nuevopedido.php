<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Vista o pagina de nuevo pedido
*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicativo Sistema de Clientes Curso Cesde Administracion de sitios web</title>
  <?php include("incluidos/css.php");?>
   <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("incluidos/header.php");?>
  
  <?php include("incluidos/menu.php");?>

  <?php include("incluidos/contenido.nuevopedido.php");?>

  <?php include("incluidos/footer.php");?>

</div>
<!-- ./wrapper -->
  <?php include("incluidos/js.php");?>
<!-- DataTables -->
<script src="<?php echo base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">

  function calcular(pos){
    $('#valorsubtotal_'+pos).val(0);
    var cantidad = $('#cantidad_'+pos).val();
    var impuesto = $('#impuesto_'+pos).val();
    var valor = $('#valor_'+pos).val();
    if (cantidad >0 && valor>0) {
      subtotal =  eval((cantidad*valor)+eval(cantidad*valor*(impuesto/100)));
          $('#valorsubtotal_'+pos).val(subtotal);
    }  

  }

  function agregar(pos, tipo){
    //ejecutar ajax que agregue el producto y contabilice el total 
    //capturar ruta
    var ruta = $("#formapedidos").attr("action");
    //Capturar los parametros de envio
    parametros = {
      "valor":$("#valor_"+pos).val(),
      "nombre":$("#nombre_"+pos).val(),
      "impuesto":$("#impuesto_"+pos).val(),
      "cantidad":$("#cantidad_"+pos).val(),
      "subtotal":$("#valorsubtotal_"+pos).val(),
      "referencia":$("#referencia_"+pos).val(),
      "token":$("#token_"+pos).val(),
      "tipo":tipo
    }

    if ($("#cantidad_"+pos).val()=="") {
      $("#mensaje_"+pos).html(" <span class='btn btn-danger'>El campo cantidad no puede estar vacio</span>");
      $("#mensaje_"+pos).fadeOut(5000);
      return;
    }

//invocar ajax
$.ajax({

  data :parametros,
  url : ruta,
  type: "Post",
  beforesend:function(){
    $("#mensaje_"+pos).show();
    $("#mensaje_"+pos).html(" <span class='btn btn-info'>Procesando</span>");

  },
  success:function(response){
    $("#mensaje_"+pos).show();    
    $("#carrito").html(response );
    $("#mensaje_"+pos).html("<span class='btn btn-success'>Agregado</span> ");  
    $("#mensaje_"+pos).fadeOut(2000);  
  },
  error:function(jqXHR, textStatus, errorthrown){

  }

})



  }

  
</script>

</body>
</html>

  