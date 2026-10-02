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


  <!-- muestra tabla: no comprobamos si isset($numero), comprobamos si no hay errores  -->
  <?php if ($errores == ''): ?>
    <p>tabla de numeros primos del 2 al <?= $numero ?? '' ?></p>


    <table class="tabla">
      <tr>
        <?php for ($i = 2; $i <= $numero; $i++) {
          // aqui podria ser: si array $result continene $numero una clase distinta
          echo "<td>$i</td>";
        } ?>
      </tr>
    </table>
  <?php endif ?>



  <!-- muestra resultados, si existen -->
  <?php if (isset($result)) {
    foreach ($result as $key => $value) {
      echo $value;
    }
  } ?>



  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    table,
    td,
    th {
      border: 1px solid white;
      border-collapse: collapse;
    }

    td,
    th {
      padding: .5rem 2rem;
      background-color: plum;
    }

    .tabla tr {
      --w-col: min(10rem, 50vw);
      /* porque es una fila en una tabla, necesita ancho establecido */
      width: 95vw;

      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(var(--w-col), 1fr));
    }
  </style>
</form>