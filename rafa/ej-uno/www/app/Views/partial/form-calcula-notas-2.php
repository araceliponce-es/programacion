
<!-- action vacio usa logica del mismo url -->
 <form id="form" method="post" action="">




  <div class="form-group">
    <label for="nota" >nota (0 al 10) </label>
    <input name="nota" type="number" class="form-control" id="nota" placeholder="">
  </div>
  
  <button type="submit">enviar</button>
</form>


 <?php

$usuario_nota = $_POST['nota'] ?? '';

if (mb_strlen($usuario_nota) === 0 ) {
    die('Faltan la nota');
}

echo "nota: " . htmlspecialchars($usuario_nota) . '<br>';

/* (int) elimina los decimales !!!!!!!!!!! */
$int_nota = (int)$usuario_nota;



var_dump($int_nota);
?>