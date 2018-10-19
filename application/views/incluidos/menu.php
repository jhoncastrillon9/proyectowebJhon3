<?php  
/*
Este script almacena
el menu lateral de opciones
*/
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $ruta?>" class="img-circle" alt="<?php echo $usuario?>">

        </div>
        <div class="pull-left info">
          <p><?php echo $usuario?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DEL SISTEMA</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Maestros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo site_url('tiposdeclientes')?>"><i class="fa fa-circle-o"></i> Tipos de clientes</a></li>
            <li class="active"><a href="<?php echo site_url('tiposdeidentificaciones')?>"><i class="fa fa-circle-o"></i> Tipos de Identificaciones</a></li>
            <li class="active"><a href="<?php echo site_url('tiposdeproductos')?>"><i class="fa fa-circle-o"></i> Tipos de Productos</a></li>

            <li class="active"><a href="<?php echo site_url('perfiles')?>"><i class="fa fa-circle-o"></i>Perfiles</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Operaciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('pedidos/nuevopedido')?>"><i class="fa fa-circle-o"></i> Nuevo Pedido</a></li>

            <li><a href="<?php echo site_url('pedidos')?>"><i class="fa fa-circle-o"></i> Pedidos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Administrativo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('usuarios')?>"><i class="fa fa-circle-o"></i> Usuarios</a></li>

            <li><a href="<?php echo site_url('clientes')?>"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li><a href="<?php echo site_url('proveedores')?>"><i class="fa fa-circle-o"></i> Proveedores</a></li>

            <li><a href="<?php echo site_url('productos')?>"><i class="fa fa-circle-o"></i> Productos</a></li>
          </ul>
        </li>

        <li><a href="<?php echo site_url('documentacion')?>"><i class="fa fa-book"></i> <span>Documentación</span></a></li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
