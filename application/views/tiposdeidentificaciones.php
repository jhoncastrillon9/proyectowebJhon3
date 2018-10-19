<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Vista de los tipos de clientes
*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplicativo Sistema de Clientes Curso Cesde Administracion de sitios web</title>
  <?php include("incluidos/css.php");?>
  <?php 
  if (isset($css_files)) {
  	foreach ($css_files as $rutacss) {
  		?>
 <link rel="stylesheet" type="text/css" href="<?php echo $rutacss;?>">
  		<?php
  	}
  }

  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("incluidos/header.php");?>
  <?php include("incluidos/menu.php");?>
  <?php include("incluidos/contenido.tiposdeidentificaciones.php");?>
  <?php include("incluidos/footer.php");?>
</div>
<!-- ./wrapper -->
  <?php include("incluidos/js.php");?>
<?php
	if (isset($js_files)) {
		foreach ($js_files as $rutajs) {
			?>
<script type="text/javascript" src="<?php echo $rutajs;?>"></script>			
			<?php
		}
	}

?>





</body>
</html>  