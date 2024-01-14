<?php
/* Created by kiaka
   Project name watu
   Data: 22/09/2023
   Time: 16:54
*/
require __DIR__ . "./../../vendor/autoload.php";
sleep(1);
//Criar  agricultor
use Source\Agricultor\Agricultor;
use Source\Agricultor\Lavra;
use Source\Agricultor\LavraOcupada;

$agricultor = new Agricultor();
$lavra = new Lavra();
$lavraOcupada = new LavraOcupada();
// Verifica se a solicitação é do tipo GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // verificar se foi enviado o id do agricultor
    if (isset($_GET["consulta"])):
        $consultar = filtInputPost($_GET["consulta"]) ?? 0;
        //verificar se o id é valido
        if (is_numeric($_GET["consulta"])):
            //verificar se o agricultor existe
            $checkAgri = $agricultor->checkIdentidade($consultar);
            if ($checkAgri[0]) {
                //verificar se o agricultor tem lavras
                $checkLavra = $lavra->checkCodeLavra($consultar);
                if ($checkLavra[0]):
                    // Verificar se a lavra esta ocupada
                    $verLavraOcupada = $lavraOcupada->verificarCodeLavraOcupada($consultar);
                    if ($verLavraOcupada[0]) {
                        // Retorna uma resposta JSON
                        echo json_encode([true,'pageInquerito.php?perfil=',$consultar]);
                    } else {
                        // Retorna uma resposta JSON
                        echo json_encode([true,'addLavraOcupada.php?code=',$consultar."&id=".$verLavraOcupada[2]]);
                    }
                else:
                    // Retorna uma resposta JSON
                    echo json_encode([true,"addLavraAgricultor.php?code=",$consultar."&id=".$checkLavra[2]]);
                endif;
            } else {
                // Retorna uma resposta JSON
                echo json_encode([true,"addAgricultorIdentidade.php?id=",$consultar]);
            }
        else:
            // Retorna uma resposta JSON
            echo json_encode(array("error" => "Id do agricultor invalido"));
        endif;
    else:
        // Retorna uma resposta JSON
        echo json_encode(array("error" => "Id do agricultor não foi enviado"));
    endif;
}