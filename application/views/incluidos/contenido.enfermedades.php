<?php
/*
Este script contiene el cuerpo principal del CRUD De tipos de clientes
*/
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="center">
         <h1>
          Hospital Northwestern Memorial    
        </h1>
        <div class="row">
          <a href="<?php echo site_url()?>/pacientes">Pacientes</a>
          <a href="<?php echo site_url()?>/sangre">Tipos de Sangre</a>
          <a href="<?php echo site_url()?>/enfermedades">Enfermedades</a>
        </div>
      </div>  
      </div>    

    </section>

    <div class="container">
      <section class="content">

      <?php echo $tabla;?>

    </section>
    </div>

        <section class="content-header content-footer">
      <div class="container">
         <h4>
          Listado de Enfermedades Actuales 
        </h4>
         <p>
          Overview
          Northwestern Memorial Hospital is an academic medical center in the heart of downtown Chicago with physicians, surgeons and caregivers representing nearly every medical specialty.

          Northwestern Memorial enjoys a teaching and service partnership with Northwestern University Feinberg School of Medicine, an integration that provides patients access to leading-edge clinical trials and fosters an environment of world-class patient care, academic inquiry and innovative research.
        </p>
      </div>    

    </section>
    
  </div>
