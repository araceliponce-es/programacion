<?php

declare(strict_types=1);




function echoNotas()
{
  echo 'sudo apt install php';
}

echoNotas();

?>

<form action="" method="post">
  <label for="">select normal</label>
  <select name="selectNuevo" id="">
    <option value="1" <?= $_POST['selectNuevo'] === '1' ? 'selected' : '' ?>>opcion 1</option>
    <option value="2" <?= $_POST['selectNuevo'] === '2' ? 'selected' : '' ?>>opcion 2</option>

    <option value="3" <?= $_POST['selectNuevo'] === '3' ? 'selected' : '' ?>>opcion 3</option>
    <option value="4" <?= $_POST['selectNuevo'] === '4' ? 'selected' : '' ?>>opcion 4</option>
  </select>

  <label for="">select multiple siempre con []</label>
  <select name="selectMultiple[]" id="" multiple>
    <option value="1" <?= $_POST['selectMultiple'] === '1' ? 'selected' : '' ?>>opcion 1</option>
    <option value="2" <?= $_POST['selectMultiple'] === '2' ? 'selected' : '' ?>>opcion 2</option>

    <option value="3" <?= $_POST['selectMultiple'] === '3' ? 'selected' : '' ?>>opcion 3</option>
    <option value="4" <?= $_POST['selectMultiple'] === '4' ? 'selected' : '' ?>>opcion 4</option>
  </select>

  <!-- para que el input se checkee, necesita tenr id y que el label sea para ese id -->
  <label for="a">
    <input id="a" type="checkbox" value="a" name="opcions[]" <?= in_array('a', $_POST['opcions'] ?? []) !== false ? 'checked' : ''; ?>>
    default checkbox a
  </label>
  <label for="b">
    <input id="b" type="checkbox" value="b" name="opcions[]" <?= in_array('b', $_POST['opcions'] ?? []) !== false ? 'checked' : ''; ?>>
    default checkbox b
  </label>
  <label for="c">
    <input id="c" type="checkbox" value="c" name="opcions[]" <?= in_array('c', $_POST['opcions'] ?? []) !== false ? 'checked' : ''; ?>>
    default checkbox c
  </label>
  <button type="submit">enviar</button>
</form>

<!-- <div>
  <p>document.anchors solo funciona para los anchor que tienen name</p>
  <a href="#" name="1">ghk</a><a href="#" name="12">ghk</a><a href="#" name="123">ghk</a><a href="#" name="13">ghk</a><a href="#">ghk</a>
</div> -->

<div class="aaa">
  <?php
  // select simple------------------------------------------------
  echo  $_POST['selectNuevo'];



  // select multiple------------------------------------------------
  $unarray = [];

  //sin esto, selectmultiple[] tendria solo el valor mas recientemente seleccionado
  if (is_array($_POST['selectMultiple'])) {
    foreach ($_POST['selectMultiple'] as $selected) {
      // coloca cada valor no no seleccionado dentro un array que inicio vacio
      if (filter_var($selected, FILTER_VALIDATE_INT) !== false) {
        array_push($_POST['selectMultiple'], $selected);
        // array_push($unarray, $selected);
        $unarray[] = $selected;
      };
    };
  };
  echo "<hr>";
  var_dump($_POST['selectMultiple']);
  echo "<hr>";
  var_dump($unarray);




  // opcions

  var_dump($_POST['options']);



  ?>




</div>

<script>
  console.log(document)
</script>