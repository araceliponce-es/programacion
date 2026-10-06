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
        $resultadoAlumnos = []; //para no mutar el array de linea anterior

        //cada materia tiene como valor al grupo de alumnos
        // cada alumno viene con una calificacion en esa materia
        //agrupamos de modo que resultado = ['nombre de alumno' => [10,5,2,7]]

        //foreach, si colocas key => value lees key y value
        //foreach, si usas solo value (sin flecha), usas solo value
        foreach ($datos as $alumnos) {
            foreach ($alumnos as $alumno =>$nota) {
                $resultado[$alumno][] = $nota;
            }
        }

        foreach ($resultado as $alumno => $notas) {

            //importante.crea 1 array por cada alumno, con las keys a tener ('aprobados' y 'desaprobados')
            $resultadoAlumnos[$alumno] = [
                'aprobados' => 0,
                'desaprobados' => 0,
            ];
            foreach ($notas as $nota) {

                        if ($nota >= 5) {
                            $resultadoAlumnos[$alumno]['aprobados']++;
                        } else {
                            $resultadoAlumnos[$alumno]['desaprobados']++;
                        }
            }

        }


        return $resultadoAlumnos;
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
