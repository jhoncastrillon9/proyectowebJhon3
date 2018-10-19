<?php
/*
Este Script contiene el proceso para nuevos pedidos
*/
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pedidos
        <small>Realizar un nuevo pedido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('principal')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="<?php echo site_url('pedidos')?>"><i class="fa fa-circle-o"></i> Pedidos</a></li>
        <li class="active">Nuevo</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        
        <div class="col-lg-3 col-xs-6">
          <span id="carrito" class="btn btn-info">El pedido va en: </span>
        </div>

      </div>

      <div class="row">
            <div class="box-body">
            <?php 
            $atributos = array("id"=>"formapedidos");
            echo form_open("pedidos/agregar", $atributos) 
            ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Producto</th>
                  <th>Referencia</th>
                  <th>Valor</th>
                  <th>Impuestos</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

              <?php 
              $i = 0;
              foreach ($listaproductos as $fila)              
              {
              $i++;
                ?>
             
              

                <tr>
                  <td align="center">
                    <img style="width: 100px;" src="<?php echo base_url()?>/assets/imagenes/productos/<?php echo $fila["imagen"]?>">
                    <br>
                    <?php echo $fila["nombre"];?>
                      

                    </td>
                  <td><?php echo $fila["referencia"];?></td>
                  <td><input type="number" style="width: 110px" maxlength="20" class="form-control" name="valor_<?php echo $i?>" id="valor_<?php echo $i?>" value="<?php echo $fila["precio"]?>" onblur="calcular('<?php echo $i ?>')"></td>
                  <td><input type="number" style="width: 60px"  class="form-control" name="impuesto_<?php echo $i?>" maxlength="4" id="impuesto_<?php echo $i?>" value="<?php echo $fila["impuestos"]?>" onblur="calcular('<?php echo $i ?>')"></td>
                  <td><input type="number" style="width: 60px"  class="form-control" name="cantidad_<?php echo $i?>" maxlength="4" id="cantidad_<?php echo $i?>" value="" onblur="calcular('<?php echo $i ?>')"></td>
                  <td><input type="number"  class="form-control" name="valorsubtotal_<?php echo $i?>" id="valorsubtotal_<?php echo $i?>" value="" readonly onblur="calcular('<?php echo $i ?>')"></td>
                  <td>

                    <button name="agregar_" id="agregar_" class="btn btn-success" onclick="agregar('<?php echo $i ?>')" type="button"><i class="fa fa-plus" title="Click para agregar este producto (<?php echo $fila["nombre"];?>)"></i></button>

                      <span id="mensaje_<?php echo $i ?>" name="mensaje_<?php echo $i ?>"></span>

                      <input type="hidden" name="referencia_<?php echo $i ?>" id="referencia_<?php echo $i ?>" value="<?php echo $fila["referencia"] ?>">
                      <input type="hidden" name="nombre_<?php echo $i ?>" id="nombre_<?php echo $i ?>" value="<?php echo $fila["nombre"] ?>">
                      <input type="hidden" name="token_<?php echo $i ?>" id="token_<?php echo $i ?>" value="<?php echo $token ?>">

                  </td>
                </tr>
              <?php } ?>
                
              </tbody>
            </table>
         </form>
      </div> 
    </section>
  </div>