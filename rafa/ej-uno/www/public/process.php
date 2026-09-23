<p>comentario: este archivo no existia antes</p>

<?php

$email = $_POST['email'] ?? '';
$select_number = $_POST['select--number'] ?? '';
$select_numbers = $_POST['select--numbers'] ?? '';

/* si falta alguno de ellos -> mensaje */
if ($email === '' || $select_number === ''  || $select_numbers === '') {
    die('Faltan datos');
}


/* 
prevenir ataques de Cross-Site Scripting (XSS), evitando que el navegador interprete código malicioso (como scripts en JavaScript) 
introducido por los usuarios.
por ejem: <script>alert('ataque');</script>
& se convierte en &amp;
" se convierte en &quot; (dependiendo de las banderas)' ----

*/

echo "Usuario: " . htmlspecialchars($email) . '<br>';
echo $select_number . '<br>';

echo '<p>numeros seleccionados:</p>';

foreach ($select_numbers as $opcion) {
    echo $opcion . '<br>';
}

/* echo "Usuario: " . $username; */