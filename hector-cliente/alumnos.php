<?php
$json = '
';
$materias = $this->procesarEjercicio(json_decode($json, true));
$alumnos = $this->obtenerAlumnosResumen(json_decode($json, true));

// $alumnos = ['alumnox' => ['aprobados' => 10, 'desaprobados' => 11], 'alumno y' => ['aprobados' => 10, 'desaprobados' => 118]];
$resultado = ['materias' => $materias, 'alumnos' => $alumnos];


function procesarEjercicio(array $datos): array
{
  $resultado = [];
  foreach ($datos as $asignatura => $alumnos) {
    $datosAsignatura = [
      'media' => 0,
      'suspensos' => 0,
      'aprobados' => 0,
      'max' => [
        'alumno' => null,
        'nota' => null
      ],
      'min' => [
        'alumno' => null,
        'nota' => null
      ]
    ];
    $numAlumnos = count($alumnos);
    $notaAgregada = 0;
    foreach ($alumnos as $nombre => $nota) {
      $notaAgregada += $nota;
      if ($nota >= 5) {
        $datosAsignatura['aprobados']++;
      } else {
        $datosAsignatura['suspensos']++;
      }
      //Sólo se va a ejecutar para el primer alumno de cada asignatura
      if ($datosAsignatura['max']['alumno'] === null) {
        $datosAsignatura['max']['alumno'] = $nombre;
        $datosAsignatura['max']['nota'] = $nota;
        $datosAsignatura['min']['alumno'] = $nombre;
        $datosAsignatura['min']['nota'] = $nota;
      } else {
        if ($datosAsignatura['max']['nota'] < $nota) {
          $datosAsignatura['max']['alumno'] = $nombre;
          $datosAsignatura['max']['nota'] = $nota;
        }
        if ($datosAsignatura['min']['nota'] > $nota) {
          $datosAsignatura['min']['alumno'] = $nombre;
          $datosAsignatura['min']['nota'] = $nota;
        }
      }
    }
    $datosAsignatura['media'] = ($numAlumnos > 0) ? $notaAgregada / $numAlumnos : null;
    $resultado[$asignatura] = $datosAsignatura;
  }
  return $resultado;
}

function obtenerAlumnosResumen(array $datos): array
{
  $resultado = [];
  //resultado de tipo: $alumnos = ['alumnox' => ['aprobados' => 10, 'desaprobados' => 11], 'alumno y' => ['aprobados' => 10, 'desaprobados' => 118]];

  //cada materia tiene como valor al grupo de alumnos (cada alumno viene con una calificacion en esa materia)
  foreach ($datos as $asignatura => $alumnos) {

    // $datosAlumnos = [];
    foreach ($alumnos as $nombre => $nota) {
      // $randomId = rand(10, 100000);
      $datosAlumno = [];
      //     // 'id' => $randomId,
      //     'nombre' => $nombre,
      //     'desaprobados' => 0,
      //     'aprobados' => 0,
      // ];

      // array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
      // $needle: The value you want to search for.
      // $haystack: The array you want to search inside.
      // $strict (Optional): If set to true, the function checks both the value and the data type (strict comparison like ===). Defaults to false. 
      // si el alumno (su nombre) ya esta dentro de result, entonces le suma 1 a sus aprobados o desaprobados, si no , lo agrega y luego le suma
      $posicion = array_search($nombre, $datosAlumno['nombre']);

      if ($posicion !== false) {

        if ($nota >= 5) {
          $datosAlumno[$posicion]['aprobados']++;
        } else {
          $datosAlumno[$posicion]['desaprobados']++;
        }
      } else {
        $datosAlumno = [
          'nombre' => $nombre,
          'desaprobados' => 0,
          'aprobados' => 0,
        ];

        if ($nota >= 5) {
          $datosAlumno[]['aprobados']++;
        } else {
          $datosAlumno[]['desaprobados']++;
        }
      }

      $resultado['alumnos'][] = $datosAlumno;
    }
    // $datosAsignatura['media'] = ($numAlumnos > 0) ? $notaAgregada / $numAlumnos : null;
    // $resultado[$nombre] = $datosAlumnos;
  }
  return $resultado;
}


?>


<div class="row">
  <?php
  if (!empty($resultado)) {
  ?>
    <div class="col-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Asignatura</th>
            <th>Media</th>
            <th>Suspensos</th>
            <th>Aprobados</th>
            <th>Nota max</th>
            <th>Nota min</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($resultado['materias'] as $nombreAsignatura => $datos) {
          ?>
            <tr>
              <!-- si no hay media, porque no hay alumnos: Sin alumnado -->
              <?php
              if ($datos['media'] === null) {
              ?>
                <td><?php echo $nombreAsignatura ?></td>
                <td colspan="99"><i>Sin alumnado</i></td>
              <?php
              } else { ?>
                <td><?php echo $nombreAsignatura ?></td>
                <td><?php echo $datos['media'] ?></td>
                <td><?php echo $datos['suspensos']; ?></td>
                <td><?php echo $datos['aprobados']; ?></td>
                <td><?php echo $datos['max']['alumno'] . ": " . $datos['max']['nota'] ?></td>
                <td><?php echo $datos['min']['alumno'] . ": " . $datos['min']['nota'] ?></td>
              <?php
              }
              ?>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>


      <!-- listado con los alumnos que han aprobado todo, los alumnos que han suspendido al menos una asignatura y los alumnos que no promocionan (alumnos que han suspendido más de una asignatura).  -->



      <!-- listado con Nombre, cantidad de materias aprobadas, cantidad de materias desaprobadas -->

      <table>
        <thead>
          <tr>
            <th>nombre</th>
            <th>Suspensos</th>
            <th>Aprobados</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($resultado['alumnos'] as $nombreAlumno => $datos) {
          ?>
            <tr>
              <td><?php echo $nombreAlumno; ?></td>
              <td><?php echo $datos['desaprobados'] ?? 'fhgfhfhg'; ?></td>
              <td><?php echo $datos['aprobados'] ?? 'gjgjgjhj'; ?></td>

            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

      <?php var_dump($resultado['alumnos']) ?>



    </div>
  <?php
  }
  ?>
  <div class="col-12">
    <div class="card shadow mb-4">
      <form method="post" action="">
        <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Cálculo de notas</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!--<form action="./?sec=formulario" method="post">                   -->
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="numeros">Json con los datos:</label>
                <textarea class="form-control" rows="10"
                  name="json"><?php echo $json ?? ''; ?></textarea>
                <p class="text-danger small">
                  <?php
                  if (!empty($errores)) {
                    foreach ($errores['json'] as $error) {
                      echo $error . '<br/>';
                    }
                  }
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-12 text-right">
            <input type="submit" value="Hacer cálculos" name="enviar" class="btn btn-primary ml-2" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>