<?php

declare(strict_types=1);


?>


<hr>
<h3>matriz abandonada</h3>
<form method="post" action="">
    
       
          <label for="formMatriz">ESCRIBE una Matriz</label>
          <input type="text" class="form-control" name="formMatriz" id="formMatriz" value="<?php echo $formMatriz ?? '' ?>" />
          <p class="text-danger small">
            <?php echo $formMatrizError ?? ''; ?>
          </p>
        


    <input type="submit" value="ordenar matriz" name="enviar" class="btn btn-primary ml-2" />
 

  </form>