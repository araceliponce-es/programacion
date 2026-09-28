<?php

// https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4952 


declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosIterativosController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1()
    {
        $data = array(
            'titulo' => 'ejercicios iterativos',
            'breadcrumb' => ['Inicio', 'ejercicios iterativos'],
            'seccion' => '/inicio'
        );

       
        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
    }


    public function doEjercicio1(): void
    {
        $data = array(
            'titulo' => 'Ejercicios iterativas',
            'breadcrumb' => ['Inicio', 'Ordenar'],
        );
        $numeros = $_POST['numeros_a_ordenar'];
        $check = $this->checkEjercicio1($numeros);

        //primero checkea validez
        if ($check === true) {
            //aqui encuentra mayor y menor
            $arrayNumero = explode(',', $numeros);
            $data['mayor'] = max($arrayNumero);
            $data['menor'] = min($arrayNumero);


           
   //aqui sorted numbers
            // $data['sorted']= sort($arrayNumero);
            //sort devuelve siempre true, para guardar los valores: 1:aplicar el sort a un var existente, 2. guardarlo(entonces el var existente original cambiò tambien)

            sort($arrayNumero);
            $data['sorted']= $arrayNumero;
            //este ejercicio de sorted es muy sencillo, por eso se quedo aqui, sin vista



            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
        } else {
            $data['error'] = $check;
            $data['numeros'] = filter_var($numeros, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
        }
    }


    private function checkEjercicio1(String $numeros):string|true{
        if($numeros ===''){
            return 'debes ingresar numeros';
        }

        $arrayNumeros = explode(',',$numeros);

        //recorre los numeros y si alguno es no numero retorna false
        foreach ($arrayNumeros as $num) {
            // $num = trim($num);

            if(!is_numeric($num)){
                return 'Debe ingresar numeros separados por comas';
                
            }
        }

        return true;
    }



  




    
}
