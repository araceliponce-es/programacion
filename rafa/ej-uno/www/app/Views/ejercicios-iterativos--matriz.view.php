<?php

declare(strict_types=1);
?>
<div class="row">
    <?php
    if (false):
    ?>
    <div class="col-12 alert alert-success">
        <p>Mayor: <?php echo $mayor ?>, Menor: <?php echo $menor ?></p>
    </div>
    <?php endif; ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">OrdenaciÃ³n matriz de mayor a menor</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="numeros">Matriz a ordenar:</label>
                                <input type="text" class="form-control" name="numeros" id="numeros" value="<?php echo $numeros ?? '' ?>" placeholder="1,2,3|4,5,6|7,8,9" />
                                <p class="text-danger small"><?php echo $errores['numeros'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <input type="submit" value="Ordenar nÃºmeros" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- 

/i es insensitive (mayus y minus)
 m es de multiline (poco usado) preg_match_all("/^CAlle/im)        cunatas lineas inican con Calle? 2

 [abc]{3}   que sean exactamente 3 chars, cualquier combinacion,  o entre {3,5} {,5} [abc]{0,1} es lo mismo que [abc]?
 

 [a-z] letras, no usar [0-10] que eso es 0 o 1, y 0: 00 y 10.

 preg_match devuelve true
 preg_match_all devuelve la cantidad de vveces
 preg_replace
 preg_spli
 preg_grep
 
 -->