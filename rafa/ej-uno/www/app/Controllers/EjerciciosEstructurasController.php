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
       



        $this->view->showViews(array('templates/header.view.php', 'ejercicios-estructuras.view.php', 'templates/footer.view.php'), $data);
    }
}
