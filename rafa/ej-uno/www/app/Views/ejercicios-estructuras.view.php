holiiiis


<p>
  este es un digito
  <?= $un_digito ?>
</p>

<p class="uno">
  es divisible ?  <?= $uno; ?> entre <?= $dos; ?>: <?= $es_divisible? 'sí':'no'; ?>
</p>

<?php require __DIR__ . '/partial/form-calcula-notas.php'; ?>



<div class="alert alert-info d-none"></div>


<div class="soy-bisiesto font-weight-bold">
  <?= $is_leap_year? 'si soy': 'no soy';?>
</div>



<div class="mayor">
  el numero mayor es <?= $mayor;?>
  <?php foreach ($numeros_aqui as $numero): ?>

    <p class="<?= $numero==$mayor? 'font-weight-bold':'' ?>">
      <?= $numero ?>
    </p>
  
  <?php endforeach; ?>
</div>