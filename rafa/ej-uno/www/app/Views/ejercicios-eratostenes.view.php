<?php

declare(strict_types=1);


?>

<h1>hiiiiii</h1>

<form method="post" action="">


  <label for="numero">escribe numero (mayor que 2)</label>
  <input required type="numeric" class="form-control" name="numero" id="numero" value="<?= $numero ?? '' ?>" />
  <p class="text-danger small">
    <?php echo $errores ?? ''; ?>
  </p>



  <input type="submit" value="usar numero" name="enviar" class="btn btn-primary ml-2" />


  <!-- no comprobamos si isset($numero), comprobamos si no hay errores -->

  <?php if ($errores == ''): ?>

    <p>tabla de numeros primos del 2 al <?= $numero ?? '' ?></p>
  <?php endif ?>
</form>