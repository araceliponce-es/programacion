<?php

declare(strict_types=1);


?>


<hr>
<h3>matriz abandonada</h3>
<form method="post" action="">
    
       
          <label for="numeros">ESCRIBE una Matriz</label>
          <input type="text" class="form-control" name="numeros" id="numeros" value="<?php echo $numeros ?? '' ?>" />
          <p class="text-danger small">
            <?= $errores['numeros']?>
          </p>
        


    <input type="submit" value="ordenar matriz" name="enviar" class="btn btn-primary ml-2" />
 

  </form>