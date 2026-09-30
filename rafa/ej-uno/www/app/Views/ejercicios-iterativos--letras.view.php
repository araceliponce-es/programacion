<?php

declare(strict_types=1);


?>


<hr>
<h3>cadena de texto muestra las mas usadas a menos</h3>
<form method="post" action="">


  <label for="letras">ESCRIBE letras</label>
  <textarea required type="text" class="form-control" name="letras" id="letras">
            <?= htmlspecialchars($letras ?? '') ?>
</textarea>
  <p class="text-danger small">
    <?php echo $errores ?? ''; ?>
  </p>



  <input type="submit" value="Ordenar letras por uso" name="enviar" class="btn btn-primary ml-2" />


</form>





<div>


  <div class="bg-danger bg-red bg-blue d-flex gap-4">
    <!-- <?= $result; ?> -->

    <?php if (isset($result)) {

      foreach ($result as $key => $value) {
        echo "<p class='p-4'>" . $key . ": " . $value . "</p>";
      }
    }




    ?>

  </div>





</div>