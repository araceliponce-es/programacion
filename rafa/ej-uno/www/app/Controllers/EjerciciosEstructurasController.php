<?php

/* 
https://centros.edu.xunta.gal/iespazomerce/aulavirtual/mod/book/view.php?id=95276&chapterid=4950
 
 */
declare(strict_types=1);

namespace Com\Daw2\Controllers;

use Com\Daw2\Models\testModel;
use http\Exception\InvalidArgumentException;

class EjerciciosEstructurasController extends \Com\Daw2\Core\BaseController
{
    public function ejercicio1()
    {
        $data = array(
            'titulo' => 'ejercicios Estructuras de decision',
            'breadcrumb' => ['Inicio', 'ejercicios Estructuras de decision'],
            'seccion' => '/inicio'
        );


            $data['algo'] = (string)5000;
            $data['un_digito'] = $data['algo'][1];


            /* Escribe un script que reciba dos números y muestre un texto por pantalla si es el primero es divisible por el segundo. */

            $data['uno'] = 54007;
            $data['dos'] = 547;
            $data['es_divisible'] = $data['uno'] % $data['dos'] ==0;


            /* Script que reciba tres números y los muestre en pantalla marcando en negrita al mayor.
            */

            $data['numeros_aqui'] = [2,5,3];
            $data['mayor'] = max($data['numeros_aqui']);

            /* Script que reciba un número entero de segundos y muestre a cuantos días, horas, minutos y segundos equivale.
            */




            /* soy bisiesto o no,no funciona aun

            Es bisiesto si es divisible entre 4, excepto cuando es divisible entre 100, salvo que también sea divisible entre 400.

            ó:
            es divisible entre 100, entonces debe ser sivisible entre 400, de lo contario solo necesita ser divisible entre 4

            */

            $year = 2029;
            $is_leap_year = $year%100===0?$year%400===0:$year%4===0;
            $data['is_leap_year'] = $is_leap_year;
                





            // A un trabajador le descuentan de su sueldo el 10% si su sueldo es menor o Igual a 1000, por encima de 1000 y hasta 2000 el 5% del adicional, y por encima de 2000 el 3% del adicional. Calcular el descuento y sueldo neto que recibe el trabajador dado su sueldo. Si el usuario recibe más de 2.000 euros netos, mostrar un alert success encima del card que muestre el texto: "Felicidades, tienes un salario por encima de la media."
            // al sueldo le le descuenta el 10%, si gana mas de 1000 y menos de 2000 solo a esa porcion del sueldo le descuenta 15% (o 10%+5%), si gana mas de 2000 entonces se le descuente 18% a esa porcion.

            $un_sueldo = 800;
            $data['un_descuento'] = $this->descuentoSegunSueldo($un_sueldo);
            $data['un_sueldo'] = $un_sueldo;




        $this->view->showViews(array('templates/header.view.php', 'ejercicios-estructuras.view.php', 'templates/footer.view.php'), $data);
    }


    private function descuentoSegunSueldo(float $sueldoBruto):float{
        $descuento10pc = $sueldoBruto *10/100;
        $descuento5pc = ($sueldoBruto>1000)? ($sueldoBruto-1000) *5/100:0;
        $descuento3pc = ($sueldoBruto>2000)? ($sueldoBruto-2000) *3/100:0;
        return  $descuento10pc+$descuento5pc+$descuento3pc;
    }
}
