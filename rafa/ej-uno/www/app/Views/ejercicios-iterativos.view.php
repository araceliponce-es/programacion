<?php

declare(strict_types=1);

// array indexados (usan indices), asociativos(usan key:valor),multidmensionales(rray de arrays) -->

// si coloco 5,4, da error porque encuentra 3 numeros y el ultimo no es numerico
?>
<div class="row">


  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Ordenación de mayor a menor</h6>
  </div>


<p>holaaaaaaaaa</p>
    <?php 

   echo isset($sorted) ? ' si':' faslse';
  
  ?>



  <?php
    if (isset($mayor) && isset($menor)):
    ?>
  <div class="col-12 alert alert-success">
    <h3>mayor y menor:</h3>
    <p>Mayor:
      <?php echo $mayor ?>, Menor:
      <?php echo $menor ?>
    </p>
  </div>
  <?php endif; ?>



  <div class="col-12">
    <div class="card shadow mb-4">
      <form method="post" action="">

        <div class="card-body">
          <!--<form action="./?sec=formulario" method="post">                   -->
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="numeros_a_ordenar">Números a ordenar:</label>
                <input type="text" class="form-control" name="numeros_a_ordenar" id="numeros_a_ordenar" value="<?php echo $numeros_a_ordenar ?? '' ?>" />
                <p class="text-danger small">
                  <?php echo $error ?? ''; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-12 text-right">
            <input type="submit" value="Ordenar nÃºmeros" name="enviar" class="btn btn-primary ml-2" />
          </div>
        </div>
      </form>
    </div>
  </div>


