<?php
/*
Este script contiene el cuerpo principal del CRUD De tipos de clientes
*/
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tipos de clientes
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('principal')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tipos de clientes</li>
      </ol>
    </section>
    <section class="content">

      <?php echo $tabla;?>

    </section>
  </div>
