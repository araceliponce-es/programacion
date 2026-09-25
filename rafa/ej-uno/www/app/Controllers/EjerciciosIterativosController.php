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

        $numeros_a_ordenar = $POST['numeros_a_ordenar']?? '';
      
       
        $data['numeros_a_ordenar'] =$numeros_a_ordenar;

        $check=$this->checkEjercicio1($numeros_a_ordenar);
        if($check===true){
             $data['menor']=min(explode(',',$$data['numeros_a_ordenar']));
             $data['mayor']=max(explode(',',$$data['numeros_a_ordenar']));
        }


        $this->view->showViews(array('templates/header.view.php', 'ejercicios-iterativos.view.php', 'templates/footer.view.php'), $data);
    }


    private function checkEjercicio1(String $numeros_a_ordenar):string|bool{
        if($numeros_a_ordenar ===''){
            return 'ingresa numeros';
        }

        $arrayNumeros = explode(',',$numeros_a_ordenar);

        //recorre los numeros y si alguno es no numero retorna false
        foreach ($arrayNumeros as $num) {
            // $num = trim($num);

            if(!is_numeric($num)){
                // return false;
                
            }
        }

        return true;
    }
}
