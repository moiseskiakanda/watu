<?php
/* Created by kiaka
   Project name watu
   Data: 20/09/2023
   Time: 22:53
*/
//Autoload
require __DIR__ . "./../../vendor/autoload.php";
sleep(1);

//Criar  agricultor
use Source\Agricultor\Agricultor;
use Source\Agricultor\Lavra;
use Source\Agricultor\LavraOcupada;

$agricultor = new Agricultor();
$lavra = new Lavra();
$lavraOcupada = new LavraOcupada();
// Verifica se a solicitação é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Verificar se o Tipo é identidade
    if (isset($_POST["tipo"]) && $_POST["tipo"] === "identidade"):
        //Verificar se foram eviados dados do formulario via POST
        if (isset($_POST["identidadeAgri"], $_POST["nome"], $_POST["localizacao"], $_POST["bairro"],
            $_POST["municipio"], $_POST["composicao"], $_POST["meios_subsistencia"], $_POST["contactos"],
            $_POST["testemunhas"], $_POST["status"],$_POST["id"])):
            //adicionar os sets ao agricultor
            $agricultor->setIndetidadeIdentidade(filtInputGet($_POST["identidadeAgri"]));
            $agricultor->setNomeIdentidade(filtInputGet($_POST["nome"]));
            $agricultor->setLocalizacaoIdentidade(filtInputGet($_POST["localizacao"]));
            $agricultor->setBairroIdentidade(filtInputGet($_POST["bairro"]));
            $agricultor->setMunicipioIdentidade(filtInputGet($_POST["municipio"]));
            $agricultor->setComposicaoIdentidade(filtInputGet($_POST["composicao"]));
            $agricultor->setMeiosSubsistenciaIdentidade(filtInputGet($_POST["meios_subsistencia"]));
            $agricultor->setContactosIdentidade(filtInputGet($_POST["contactos"]));
            $agricultor->setTestemunhasIdentidade(filtInputGet($_POST["testemunhas"]));
            $codeNew = filtInputGet($_POST["identidadeAgri"]);
            $codeAntigo = filtInputGet($_POST["idAntigo"]);
            //verificar o status
            if (filtInputGet($_POST["status"]) == "Adicionar"):
                //verificar se existe agricultor com a identidade, se existe actualiza os dados, caso nao inserir
                $code = $agricultor->checkIdentidade($codeAntigo);
                if ($code[0] == true) {
                    $agricultor->setIdIdentidade($code[1]);
                    $return = $agricultor->editAgricultor();
                } else {
                    //Adicionar agricultor
                    $return = $agricultor->addAgricultor();
                }
                //Adicionar o code da lavra
                $lavraId = $lavra->checkCodeLavra($codeAntigo);
                if ($lavraId[0] == true) {
                    $return = $lavra->updateCodeLavra($codeNew,$lavraId[2]);
                }
                $lavraOcupadaId = $lavraOcupada->verificarCodeLavraOcupada($codeAntigo);
                if ($lavraOcupadaId[0] == true) {
                    $lavraOcupada->updateCodeLavraOcupada($codeNew,$lavraOcupadaId[2]);
                }

                responseJSON($return);

            elseif (filtInputGet($_POST["status"]) == "Actualizar"):
                //Actualizar agricultor
                $agricultor->setIdIdentidade(filtInputGet($_POST["id"]));
                $resp = $agricultor->editAgricultor();
                //Actualizar o Code da lavra
                $lavraId = $lavra->checkCodeLavra($codeAntigo);
                if ($lavraId[0] == true) {
                    $lavra->updateCodeLavra($codeNew,$lavraId[2]);
                }
                $lavraOcupadaId = $lavraOcupada->verificarCodeLavraOcupada($codeAntigo);
                if ($lavraOcupadaId[0] == true) {
                    $lavraOcupada->updateCodeLavraOcupada($codeNew,$lavraOcupadaId[2]);
                }
                // Retorna uma resposta JSON
                responseJSON($resp);

            elseif (filtInputGet($_POST["status"]) == "Eliminar"):
                //Deletar agricultor
                $agricultor->setIdIdentidade(filtInputGet($_POST["id"]));
                $resp = $agricultor->deleteAgricultor();
                // Retorna uma resposta JSON
                responseJSON($resp);
            else:
                // Retorna um erro se o estado não for reconhecido
                header('HTTP/1.1 400 Bad Request');
                echo 'Status da IDENTIDADE inválido.';
            endif;
        else:
            // Retorna um erro se os dados do formulário não forem recebidos
            header('HTTP/1.1 400 Bad Request');
            echo 'Os dados do formulário da IDENTIDADE não foram recebidos.';
        endif;
    elseif (isset($_POST["tipo"]) && filtInputGet($_POST["tipo"]) === "lavra"):
        //Verificar se foram eviados dados do formulario via POST
        if (isset($_POST["idCodeAgricultor"], $_POST["status"], $_POST["localizacao_lavra"], $_POST["bairro_lavra"],
            $_POST["municipio_lavra"], $_POST["pontos_referencia"], $_POST["area_total"], $_POST["area_cultivo"],
            $_POST["culturas"], $_POST["producao_anual"])):
            //adicionar os sets a Lavra
            $lavra->setCodeAgricultorLavra(filtInputGet($_POST["idCodeAgricultor"]));
            $lavra->setLocalizacaoLavra(filtInputGet($_POST["localizacao_lavra"]));
            $lavra->setBairroLavra(filtInputGet($_POST["bairro_lavra"]));
            $lavra->setMunicipioLavra(filtInputGet($_POST["municipio_lavra"]));
            $lavra->setPontosReferenciaLavra(filtInputGet($_POST["pontos_referencia"]));
            $lavra->setAreaTotalLavra(filtInputGet($_POST["area_total"]));
            $lavra->setAreaCultivoLavra(filtInputGet($_POST["area_cultivo"]));
            $lavra->setCulturasLavra(filtInputGet($_POST["culturas"]));
            $lavra->setProducaoAnualLavra(filtInputGet($_POST["producao_anual"]));
            //verificar o status
            if (filtInputGet($_POST["status"]) == "Adicionar"):
                //Verificar se exite, se existir, actualiza, se não existir, adiciona
                $code = $lavra->checkCodeLavra(filtInputGet($_POST["idCodeAgricultor"]));
                if ($code[0] == true) {
                    $lavra->setIdLavra($code[2]);
                    $return = $lavra->editLavra();
                    // Retorna uma resposta JSON
                } else {
                    //Adicionar agricultor
                    $return = $lavra->addLavra();
                    // Retorna uma resposta JSON
                }
                // Retorna uma resposta JSON
                responseJSON($return);
            elseif (filtInputGet($_POST["status"]) == "Actualizar"):
                //Actualizar agricultor
                $lavra->setCodeAgricultorLavra(filtInputGet($_POST["idCodeAgricultor"]));
                $resp = $lavra->editLavra();
                // Retorna uma resposta JSON
                responseJSON($resp);
            elseif (filtInputGet($_POST["status"]) == "Eliminar"):
                //Deletar agricultor
                $lavra->setIdLavra(filtInputGet($_POST["id"]));
                $resp = $lavra->deleteLavra();
                // Retorna uma resposta JSON
                responseJSON($resp);
            else:
                // Retorna um erro se o estado não for reconhecido
                header('HTTP/1.1 400 Bad Request');
                echo 'Status da LAVRA inválido.';
            endif;
        else:
            // Retorna um erro se os dados do formulário não forem recebidos
            header('HTTP/1.1 400 Bad Request');
            echo 'Os dados do formulário sobre a LAVRA não foram recebidos.';
        endif;
    elseif(isset($_POST["tipo"]) && filtInputGet($_POST["tipo"]) === "lavraOcupada"):
        //Verificar se foram eviados dados do formulario via POST
        if (isset($_POST["code"],$_POST["status"],$_POST["localizacao_lavra_ocupada"],$_POST["area_total_lavra_ocupada"],
                  $_POST["area_cultivo_lavra_ocupada"],$_POST["data_utilizacao_inicio_lavra_ocupada"],
                  $_POST["data_utilizacao_fim_lavra_ocupada"],$_POST["observacoes_lavra_ocupada"])) {
                //adicionar os sets a Lavra Ocupada
                $lavraOcupada->setCodeAgricultorLavraOcupada(filtInputGet($_POST["code"]));
                $lavraOcupada->setLocalizacaoLavraOcupada(filtInputGet($_POST["localizacao_lavra_ocupada"]));
                $lavraOcupada->setAreaTotalLavraOcupada(filtInputGet($_POST["area_total_lavra_ocupada"]));
                $lavraOcupada->setAreaCultivoLavraOcupada(filtInputGet($_POST["area_cultivo_lavra_ocupada"]));
                $lavraOcupada->setCulturasLavraOcupada(filtInputGet($_POST["culturas_lavra_ocupada"]));
                $lavraOcupada->setProducaoAnualLavraOcupada(filtInputGet($_POST["producao_anual_lavra_ocupada"]));
                $lavraOcupada->setTipoLavraOcupada(filtInputGet($_POST["tipo_lavra_ocupada"]));
                $lavraOcupada->setDataUtilizacaoInicioOcupada(filtInputGet($_POST["data_utilizacao_inicio_lavra_ocupada"]));
                $lavraOcupada->setDataUtilizacaoFimOcupada(filtInputGet($_POST["data_utilizacao_fim_lavra_ocupada"]));
                $lavraOcupada->setObservacoesLavraOcupada(filtInputGet($_POST["observacoes_lavra_ocupada"]));
                //verificar o status
                if (filtInputGet($_POST["status"]) == "Adicionar"):
                    //Verificar se exite, se existir, actualiza, se não existir, adiciona
                    $code = $lavraOcupada->verificarCodeLavraOcupada(filtInputGet($_POST["code"]));
                    if ($code[0] == true) {
                        $lavraOcupada->setIdLavraOcupada($code[2]);
                        $return = $lavraOcupada->atualizarLavraOcupada();
                        // Retorna uma resposta JSON
                    } else {
                        //Adicionar agricultor
                        $return = $lavraOcupada->cadastrarLavraOcupada();
                        // Retorna uma resposta JSON
                    }
                    // Retorna uma resposta JSON
                    responseJSON($return);
                elseif (filtInputGet($_POST["status"]) == "Actualizar"):
                    //Actualizar agricultor
                    $lavraOcupada->setIdLavraOcupada(filtInputGet($_POST["id"]));
                    $resp = $lavraOcupada->atualizarLavraOcupada();
                    // Retorna uma resposta JSON
                    responseJSON($resp);
                elseif (filtInputGet($_POST["status"]) == "Eliminar"):
                    //Deletar agricultor
                    $lavraOcupada->setIdLavraOcupada(filtInputGet($_POST["id"]));
                    $resp = $lavraOcupada->excluirLavraOcupada();
                    // Retorna uma resposta JSON
                    responseJSON($resp);
                else:
                    // Retorna um erro se o estado não for reconhecido
                    header('HTTP/1.1 400 Bad Request');
                    echo 'Status da LAVRA-OCUPADA inválido.';
                endif;
        } else {
            // Retorna um erro se os dados do formulário não forem recebidos
            header('HTTP/1.1 400 Bad Request');
            echo 'Os dados do formulário sobre a LAVRA-OCUPADA não foram recebidos.';
        }
    else:
        // Retorna um erro se o tipo não for reconhecido
        header('HTTP/1.1 400 Bad Request');
        echo 'Tipo da -LAVRA- -IDENTIDADE- -LAVRA-OCUPADA- inválido.';
    endif;
} else {
    // Retorna um erro se a solicitação não for do tipo POST
    header('HTTP/1.1 400 Bad Request');
    echo 'Esta URL só pode ser acessada via POST.';
}
/*
 ?id=1
    status=Actualizar
    tipo=identidade
    idAntigo=92433
    identidadeAgri=924338
    nome=Ester+Jose
    localizacao=Malange
    bairro=Malange
    municipio=Malanje
    composicao=Joao+da+Silva
    meios_subsistencia=Lavra+e+criação+de+Animais
    contactos=924333
    testemunhas=Joao+923+444#
 */