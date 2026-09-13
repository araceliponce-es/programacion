<!DOCTYPE html>
<html>

<head>
    <title>ABC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <h1>ABC Page</h1>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae sapiente iure minus explicabo, nesciunt quasi repellat, ad aut laudantium odit recusandae inventore. Qui reiciendis atque sed autem culpa. Provident, ad.</p>

    <div class="uno">
        <?php
        $array = array(
            "a" => 121,
            1 => 'Primero',
            21 => "prueba",
            1.5 => "Primero y medio",
            1.4 => "nuevo valor",
            1.0 => "nuevisimo valor",
            0.1 => "este?"
        );
        echo "Valor de $array[1], no busca el segundo item, busca el mas reciente que contenga el 1 al inicio";


        echo "<br/>";
        var_dump($array);


        ?>

    </div>

    <br>

    <div class="container grid gap-3 p-4 bg-orange-200">
        <p> <?= 'printing a string' ?></p>
        <p> <?= 'printing a different string' ?></p>
    </div>



    <? echo 'this code is within short tags, but will only work ' .
        'if short_open_tag is enabled'; ?>



    <div class="dos">
        <?php
        $variables = [1, 2, 3, 4, 5, 7];
        for ($i = 0; $i < count($variables); $i++) {
            $variables[$i] .= 1;
        }

        echo $variables[2];


        ?>
    </div>

    <div class="cinco">

        <?php
        $contador = 0;
        $final = '';
        while ($contador < 11) {
            $contador++;
            $final .= "lorem $contador";
        }

        echo $final;
        ?>
    </div>

    <div class="seis">

        <?php
        $var1 = 'hay 1 gato';
        // $resultado = $var1 + 1; // TypeError
        // Unsupported operand types: string + int


        // echo $resultado;


        ?>
    </div>


</body>

</html>