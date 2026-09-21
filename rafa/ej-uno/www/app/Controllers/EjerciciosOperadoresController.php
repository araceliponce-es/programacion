<?php

/* https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4947
 */
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosOperadoresController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1()
    {
        $data = array(
            'titulo' => 'ejercicios OPERADORES',
            'breadcrumb' => ['Inicio', 'ejercicios operadores'],
            'seccion' => '/inicio'
        );


        $data['numero'] = 9;
        $data['cuadrado'] =  $data['numero'] **  2;


        $data['tarifa_hora'] =2000.5;
        $data['horas_trabajadas'] =9;

/* 
        Escribe un script que reciba base y altura de un rectángulo y muestre el área y el perímetro de éste. */
         $data['rectangulo_w'] =20;
        $data['rectangulo_h'] =9;








        $data['tarifa_temp_alta'] =20;
         $data['tarifa_temp_baja'] =15;
        $data['noches_temp_alta'] =9;
        $data['noches_temp_baja'] =19;




        $data['numero_tres_cifras'] =123;
        $data['centenas'] = intval($data['numero_tres_cifras'] / 100);       
        $data['decenas']  = intval($data['numero_tres_cifras'] / 10) % 10;  //orden parentesis importante 
        $data['unidades'] = $data['numero_tres_cifras'] % 10;  




        $data['cadena'] ='gsdjhfdhjg dghfd kjfh fhfh';



        $this->view->showViews(array('templates/header.view.php', 'ejercicios-operadores.view.php', 'templates/footer.view.php'), $data);
    }
}
