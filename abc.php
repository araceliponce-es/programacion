<?php

$personas = [
  'pepe' => 25,
  'maria' => 40,
  'jose' => 14
];

foreach ($personas as $edad) {
  echo $edad . " ";
};


$personas_json = json_encode($personas);

echo "<b>codificacion json </b>" . $personas_json . "<br>";
echo "<br><b>json:</b>";
echo var_dump($personas_json);

echo "<br><b>json decoded: </b>";
echo var_dump(json_decode($personas_json));

echo "<br><b>objeto original: </b>";
echo var_dump($personas);


?>


<h2>un formulario</h2>
<?php

$data = $_POST;

$sanitizeRules = [
  'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  'email' => FILTER_SANITIZE_EMAIL,
  'edad' => FILTER_SANITIZE_NUMBER_INT,
  // 'altura' => FILTER_SANITIZE_NUMBER_FLOAT,
  'altura' => [
    'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
    'flags' => FILTER_FLAG_ALLOW_FRACTION // importante, si no se olvida del delimitador y solo deja los numeros
  ],
  'categoria' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
  'acepta' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, //es opcional sanitizarlo, la validacion es lo importante para el checkbox
  'comentario' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
];
//telefonos deben ser 9 numeros oooo 11 con un '+' al inicio





$datos_limpios = cleanData($data, $sanitizeRules);

// doEjercicio();
var_dump($data);
echo "<br>";
var_dump($datos_limpios);


function cleanData(array $data, array $rules): array
{
  // Aplicas los filtros a todo el $_POST de forma automática y segura, para renderizarlos luego con un $nombrededato ?? '';
  return filter_var_array($data, $rules);

  //si hubiese puesto aqui 
  //$datos_limpios = filter_var_array($data, $sanitizeRules);
  //hubiera: creado un nuevo variable llamado igual y no modificado a la variable de afuera
}


//Check validity of some fields
function checkEjercicio(): void {}



// unset($datos_limpios);



?>





<form action="" method="POST" style="padding:3rem 0; display:grid; max-width:25rem; margin-inline:auto; gap:.6rem;">

  <div>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= $datos_limpios['nombre'] ?>">
  </div>



  <div>
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" value="<?= $datos_limpios['email'] ?>">
  </div>



  <div>
    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" min="1" value="<?= $datos_limpios['edad'] ?>">
  </div>




  <div>
    <label for="altura">altura:</label>
    <input type="number" id="altura" name="altura" step="any" value="<?= $datos_limpios['altura'] ?>">
  </div>

  <div>
    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria[]" multiple>
      <option value="">Selecciona una opción</option>
      <!-- string 'animales' existe en array ? -->
      <option value="animales" <?= in_array('animales', $data['categoria'] ?? []) ? "selected" : "" ?>>Animales</option>
      <option value="frutas" <?= in_array('frutas', $data['categoria'] ?? []) ? "selected" : "" ?>>Frutas</option>
      <option value="colores" <?= in_array('colores', $data['categoria'] ?? []) ? "selected" : "" ?>>Colores</option>
    </select>

  </div>




  <div>
    <label>
      <input type="checkbox" name="acepta" value="si" <?= $datos_limpios['acepta'] === 'si' ? "checked" : "" ?>>
      Acepto los términos
    </label>

  </div>


  <div>
    <label for="comentario">Comentario:</label>
    <textarea id="comentario" name="comentario"><?= $datos_limpios['comentario'] ?></textarea>

  </div>


  <button type="submit">Enviar</button>

</form>

<div>
  <?php
  foreach ($data['categoria'] as $value) {
    echo $value;
  };
  ?>
</div>


<style>
  [selected] {
    background-color: pink;
  }
</style>