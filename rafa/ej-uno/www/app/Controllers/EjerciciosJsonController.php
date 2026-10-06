<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 

// https://www.geeksforgeeks.org/php/php-program-to-count-the-occurrence-of-each-characters/

declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;


class EjerciciosJsonController extends \Com\Daw2\Core\BaseController
{

    public function ejercicio(string $json = '', array $errores = [], array $resultado = []): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Cálculo de notas'],
        );
        $data['errores'] = $errores;
        $data['json'] = $json;
        $data['resultado'] = $resultado;

        $this->view->showViews(array('templates/header.view.php', 'ejercicios-json.view.php', 'templates/footer.view.php'), $data);
    }

    public function doEjercicio(): void
    {
        $json = $_POST['json'] ?? '';
        $errores = $this->checkEjercicio($json);
        if ($errores === []) {
            // $resultado = $this->procesarEjercicio(json_decode($json, true));

            $materias = $this->procesarEjercicio(json_decode($json, true));
            $alumnos = $this->obtenerAlumnosResumen(json_decode($json, true));

            // $alumnos = ['alumnox' => ['aprobados' => 10, 'desaprobados' => 11], 'alumno y' => ['aprobados' => 10, 'desaprobados' => 118]];
            $resultado = ['materias' => $materias, 'alumnos' => $alumnos];


            $this->ejercicio(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores, $resultado);
        } else {
            $this->ejercicio(filter_var($json, FILTER_SANITIZE_FULL_SPECIAL_CHARS), $errores);
        }
    }

    private function procesarEjercicio(array $datos): array
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


    //array_unique($input) https://www.php.net/manual/en/function.array-unique.php
    //     $resultado = [];

    // foreach ($asignaturas as $asignatura) {
    //     foreach ($asignatura as $nombre => $nota) {
    //         $resultado[$nombre][] = $nota; this appens the nota to the resultado[nombre del alumno]
    //     }
    // }

    private function obtenerAlumnosResumen(array $datos): array
    {
        $resultado = [];
        //resultado de tipo: $alumnos = ['alumnox' => ['aprobados' => 10, 'desaprobados' => 11], 'alumno y' => ['aprobados' => 10, 'desaprobados' => 118]];

        //cada materia tiene como valor al grupo de alumnos (cada alumno viene con una calificacion en esa materia)
        foreach ($datos as $asignatura => $alumnos) {

            // $datosAlumnos = [];

            foreach ($alumnos as $nombre => $nota) {
                // $randomId = rand(10, 100000);
                $datosAlumno = [
                    // 'id' => $randomId,
                    $nombre => [
                        'desaprobados' => 0,
                        'aprobados' => 0,
                    ]
                ];

                // array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false
                // $needle: The value you want to search for.
                // $haystack: The array you want to search inside.
                // $strict (Optional): If set to true, the function checks both the value and the data type (strict comparison like ===). Defaults to false. 
                // si el alumno (su nombre) ya esta dentro de result, entonces le suma 1 a sus aprobados o desaprobados, si no , lo agrega y luego le suma
                $posicion = array_search($nombre, $datosAlumno);

                if ($posicion !== false) {

                    if ($nota >= 5) {
                        $datosAlumno[$nombre]['aprobados']++;
                    } else {
                        $datosAlumno[$nombre]['desaprobados']++;
                    }
                } else {
                    // $datosAlumno = [
                    //     'nombre' => $nombre,
                    //     'desaprobados' => 0,
                    //     'aprobados' => 0,
                    // ];

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

    private function checkEjercicio(string $json)
    {
        $errores = [];
        if ($json === '') {
            $errores['json'][] = 'Campo obligatorio';
        } else {
            if (json_validate($json)) {
                $datos = json_decode($json, true);
                if (is_array($datos)) {
                    foreach ($datos as $asignatura => $alumnos) {
                        if (!is_string($asignatura)) {
                            $errores['json'][] = "El valor $asignatura no es una string";
                        } else {
                            if (!is_array($alumnos)) {
                                $errores['json'][] = "No tenemos un array de alumnos en la asignatura: $asignatura ";
                            } else {
                                foreach ($alumnos as $nombre => $nota) {
                                    if (!is_string($nombre)) {
                                        $errores['json'][] = "En la asignatura $asignatura existe un alumno cuyo nombre no es una string";
                                    } elseif (!is_numeric($nota)) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota numérica";
                                    } elseif ($nota > 10 || $nota < 0) {
                                        $errores['json'][] = "En la asignatura $asignatura, el alumno $nombre no tiene una nota entre 0 y 10";
                                    }
                                }
                            }
                        }
                    }
                } else {
                    $errores['json'][] = 'El json no tiene el formato esperado';
                }
            } else {
                $errores['json'][] = 'Inserte un json válido';
            }
        }
        return $errores;
    }
}
