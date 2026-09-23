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


<div class="soy-bisiesto">
  <?= $is_leap_year? 'si soy': 'no soy';?>
</div>