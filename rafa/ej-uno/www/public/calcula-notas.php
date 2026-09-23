<!-- 
 Script que reciba una nota entre 0 y 10 muestre por pantalla la calificación en texto y en un alert que varía en base a la nota:

    Menor que 5: Suspenso (danger)
    [5, 6): Aprobado (warning)
    [6, 7): Bien (info)
    [7, 8.75): Notable (info)
    [8.75, 10): Sobresaliente (success)
    10: Matrícula (success)
    
    -->


    <?php

$usuario_nota = $_POST['nota'] ?? '';

if (mb_strlen($usuario_nota) === 0 ) {
    die('Faltan la nota');
}

echo "nota: " . htmlspecialchars($usuario_nota) . '<br>';

/* (int) elimina los decimales !!!!!!!!!!! */
$int_nota = (int)$usuario_nota;



/* https://www.php.net/manual/es/control-structures.match.php */
$calificacion = match (true) {

  $int_nota<4 => 'suspenso',
  $int_nota<7 => 'aprobado',
  $int_nota<9 => 'notable',
  $int_nota<=10 => 'perfecto',
  default => throw new InvalidArgumentException("invalida es la nota"),

};


echo $calificacion;


$classname = match ($calificacion) {

  'suspenso' => 'danger',
  'aprobado' => 'warning',
  'notable' => 'info',
  'perfecto' => 'success',

};

echo "<div class=\"alert alert-$classname\">$calificacion</div>";