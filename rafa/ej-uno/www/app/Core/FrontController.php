<?php

namespace Com\Daw2\Core;

use Com\Daw2\Controllers\CategoriaController;
use Com\Daw2\Controllers\EjerciciosController;
use Com\Daw2\Controllers\PreferenciasController;
use Com\Daw2\Controllers\UsuarioSistemaController;
use Steampixel\Route;

class FrontController
{
    public static function main()
    {
        Route::add(
            '/',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->index();
            },
            'get'
        );
        Route::add(
            '/demo-proveedores',
            function () {
                $controlador = new \Com\Daw2\Controllers\InicioController();
                $controlador->demo();
            },
            'get'
        );
        Route::add(
            '/ej-1',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosController();
                $controlador->ejercicio1strings();
            },
            'get'
        );
        Route::add(
            '/ej-2',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosOperadoresController();
                $controlador->ejercicio1();
            },
            'get'
        );
        Route::add(
            '/ej-3',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosEstructurasController();
                $controlador->ejercicio1();
            },
            'get'
        );
        //ej-4: get usa el ejercicio1() y post usa doEjercicio1()
        Route::add(
            '/ej-4',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosController();
                $controlador->ejercicio1();
            },
            'get'
        );
        Route::add(
            '/ej-4',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosController();
                $controlador->doEjercicio1();
            },
            'post'
        );
        //no pueden llevar -- en el nombre (los controllers)
        Route::add(
            '/ej-5',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosMatrizController();
                $controlador->ejercicio();
            },
            'get'
        );
        Route::add(
            '/ej-5',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosMatrizController();
                $controlador->doEjercicio();
            },
            'post'
        );

        //no pueden llevar -- en el nombre (los controllers)
        Route::add(
            '/ej-6',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosLetrasController();
                // $controlador->ejercicio();
                $controlador->ejercicioPalabras();
            },
            'get'
        );
        Route::add(
            '/ej-6',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosIterativosLetrasController();
                // $controlador->doEjercicio();
                $controlador->doEjercicioPalabras();
            },
            'post'
        );



        //no pueden llevar -- en el nombre (los controllers)
        Route::add(
            '/ej-7',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosEratostenesController();
                $controlador->ejercicio();
            },
            'get'
        );
        Route::add(
            '/ej-7',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosEratostenesController();
                $controlador->doEjercicio();
            },
            'post'
        );




        //json
        Route::add(
            '/ej-8',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosJsonController();
                $controlador->ejercicio();
            },
            'get'
        );
        Route::add(
            '/ej-8',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosJsonController();
                $controlador->doEjercicio();
            },
            'post'
        );






        //no pueden llevar -- en el nombre (los controllers)
        Route::add(
            '/ej-otros',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosOtrosController();
                $controlador->ejercicio();
            },
            'get'
        );
        Route::add(
            '/ej-otros',
            function () {
                $controlador = new \Com\Daw2\Controllers\EjerciciosOtrosController();
                $controlador->doEjercicio();
            },
            'post'
        );



        Route::add(
            '/blanco',
            function () {
                echo '';
            },
            'get'
        );
        Route::pathNotFound(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error404();
            }
        );
        Route::methodNotAllowed(
            function () {
                $controller = new \Com\Daw2\Controllers\ErroresController();
                $controller->error405();
            }
        );
        Route::run();
    }
}
