<?php

declare(strict_types=1);


?>


<hr>
<h3>cadena de texto muestra las mas usadas a menos</h3>
<form method="post" action="">
    
       
          <label for="letras">ESCRIBE letras</label>
          <textarea required type="text" class="form-control" name="letras" id="letras" >
            <?php echo $formLetras ?? '' ?>"
</textarea>
          <p class="text-danger small">
            <?php echo $formLetrasError ?? ''; ?>
          </p>
        


    <input type="submit" value="Ordenar letras por uso" name="enviar" class="btn btn-primary ml-2" />
 

  </form>

  <div>


  <div>
    <?= $result; ?>
  </div>

 <?php
 if (isset($separadas)):
    ?>
    <div class="col-12 alert alert-success">
        <?php 
  foreach ($separadas as $key => $value) {
    echo "<p>" .$value . "</p>";
  }
  
  ?>
    </div>
    <?php endif; ?>



  </div>