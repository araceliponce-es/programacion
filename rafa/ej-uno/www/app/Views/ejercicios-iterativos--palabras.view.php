<?php

declare(strict_types=1);
?>


<form method="post" action="">


  <label for="palabras">escribe palabras</label>
  <textarea required type="text" class="form-control" name="palabras" id="palabras"><?= $palabras ?? '' ?></textarea>
  <p class="text-danger small">
    <?php echo $errores ?? ''; ?>
  </p>



  <input type="submit" value="Ordenar palabras por uso" name="enviar" class="btn btn-primary ml-2" />


</form>





<div class="pt-5">


  <div class="bg-danger bg-red bg-blue d-flex flex-wrap gap-4">


    <?php if (isset($result)) {

      foreach ($result as $key => $value) {
        echo "<p class='p-4'> '" . $value . "' tiene " . $key . " apariciones </p>";
      }
    }




    ?>

  </div>




  <div>
    <a href="https://regex101.com/">regexp checker</a>
    <a href="https://www.regular-expressions.info/unicodecategory.html">mas expresiones</a>

    <P>\P{L} con p mayuscula matches a lo que no es letras</P>

    <P>\p{L} con p mayuscula matches solo letras (distintos idiomas)</P>
  </div>

</div>