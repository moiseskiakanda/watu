<?php
/* Created by kiaka
   Project name watu
   Data: 22/09/2023
   Time: 22:06
*/
//Autoload
require __DIR__ . "./../../vendor/autoload.php";

use Source\Agricultor\LavraOcupada;

$lavraOcupada = new LavraOcupada();

//Verificar se a Lavra foi encontrado
if (isset($_GET["code"]) && $_GET["id"] != 0) {
    //Checar se o ID é um Code ou um ID da Lavra
    $cCode = $lavraOcupada->verificarCodeLavraOcupada(filtInputPost($_GET["code"]));
    if ($cCode[0]) {
        //Se for um code
        $id = $cCode[2];
        $code = $cCode[1];
        //Verificar se foi enviado o ID via get
        define("STATUS", "Actualizar");
        define("ICON", "fa fa-edit");
        define("COLOR", "text-danger");
    } else {
        //Se for um ID
        $id = filtInputPost($_GET["id"]);
        $code = $id;
        define("STATUS", "Adicionar");
        define("ICON", "fa fa-address-book");
        define("COLOR", "text-secondary");
    }
} else {
    $id = filtInputPost($_GET["code"]);
    $code = $id;
    define("STATUS", "Adicionar");
    define("ICON", "fa fa-address-book");
    define("COLOR", "text-secondary");
}
//Verificar Lavra Ocupada
$lavraOcupada->consultarLavraOcupada($code);

?>
<!--/#left content-->
<aside class="newContent">

    <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">

        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="nav_top_align text-uppercase">
                            <i class="fas fa-industry"></i> Lavra Ocupada no Local da Torre ou na Faixa de Servidão
                        </h4>
                    </div>
                    <div class="col-lg-4">
                        <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class=" breadcrumb-item vanishIn">
                                <a href="">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Lavra Ocupada</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="outer">
            <div class="inner bg-container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h2 class="<?= COLOR ?> text-uppercase">
                                            <i class="fas fa-industry"></i> Lavra Ocupada no Local da Torre ou na Faixa de Servidão
                                        </h2>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- botao para actualizar a pagina -->
                                        <a href="#" onclick="return addLavraOcupada('<?= $code ?>','<?= $id ?>')" class="btn btn-light float-right"
                                           title="Actualizar a página">
                                            <i class="fa fa-refresh"></i> Actualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card_block_top_align ">


<form id="formularioLavraOcupada" action="javascript:salvaLavraOcupada()" method="post" enctype="multipart/form-data">
    <input type="hidden" name="code" value="<?= $code ?>">
    <input type="hidden" name="tipo" value="lavraOcupada">
    <input type="hidden" name="status" value="<?= STATUS ?>">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="localizacao_lavra_ocupada">
                    <i class="fas fa-map-marker"></i>&nbsp; Localização (utilizar numeração do mapa topográfico):</label>
                <input type="text" class="form-control" id="localizacao_lavra_ocupada" name="localizacao_lavra_ocupada" required value="<?= $lavraOcupada->getLocalizacaoLavraOcupada() ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="area_total_lavra_ocupada">
                    <i class="fas fa-ruler-combined"></i>&nbsp;Área Total:</label>
                <input type="text" class="form-control" id="area_total_lavra_ocupada" name="area_total_lavra_ocupada" required value="<?= $lavraOcupada->getAreaTotalLavraOcupada() ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="area_cultivo_lavra_ocupada">
                    <i class="fas fa-seedling"></i>Área para Cultivo:</label>
                <input type="text" class="form-control" id="area_cultivo_lavra_ocupada" name="area_cultivo_lavra_ocupada" required value="<?= $lavraOcupada->getAreaCultivoLavraOcupada() ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="culturas_lavra_ocupada"><i class="fas fa-seedling"></i> Cultura(s):</label>
                <input type="text" class="form-control" id="culturas_lavra_ocupada" name="culturas_lavra_ocupada" required value="<?= $lavraOcupada->getCulturasLavraOcupada() ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="producao_anual_lavra_ocupada">
                    <i class="fas fa-leaf"></i> Produção/Cultura (KG/ANO):</label>
                <input type="text" class="form-control" id="producao_anual_lavra_ocupada" name="producao_anual_lavra_ocupada" required value="<?= $lavraOcupada->getProducaoAnualLavraOcupada() ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tipo_lavra_ocupada"><i class="fas fa-industry"></i>Tipo de Lavra:</label>
                <select class="form-control" id="tipo_lavra_ocupada" name="tipo_lavra_ocupada" required>
                    <option selected disabled>Selecione o tipo de lavra</option>
                    <option value="Lavra Manual">Lavra Manual</option>
                    <option value="Lavra Mecanizada">Lavra Mecanizada</option>
                    <option value="Lavra Mista">Lavra Mista</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4">
            <i class="fas fa-calendar"></i> DATA (período que utilizou a área):
        </div>
        <div class="col-md-4">
            <div class="">
                <label class="sr-only" for="data_utilizacao_inicio_lavra_ocupada"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">de:</div>
                    </div>
                    <input type="date" class="form-control" id="data_utilizacao_inicio_lavra_ocupada" name="data_utilizacao_inicio_lavra_ocupada" required placeholder="__/__/____" value="<?= $lavraOcupada->getDataUtilizacaoInicioOcupada() ?>">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="">
                <label class="sr-only" for="data_utilizacao_fim_lavra_ocupada"></label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">a:</div>
                    </div>
                    <input type="date" class="form-control" placeholder="__/__/____" id="data_utilizacao_fim_lavra_ocupada" name="data_utilizacao_fim_lavra_ocupada" required
                    value="<?= $lavraOcupada->getDataUtilizacaoFimOcupada() ?>">
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="observacoes_lavra_ocupada"><i class="fas fa-comment"></i> Observações:</label>
                <textarea class="form-control" id="observacoes_lavra_ocupada" name="observacoes_lavra_ocupada" rows="2"><?= $lavraOcupada->getObservacoesLavraOcupada() ?></textarea>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-3">
            <button type="reset" class="btn btn-danger btn-block btn-lg">
                Limpar
                <i class="fa fa-eraser"></i>
            </button>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">
                Salvar
                <i class="fa fa-save"></i>
            </button>
        </div>
    </div>

</form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>
<script type="text/javascript">
    function salvaLavraOcupada () {
        const url = './agricultores/excut.php';
        const form = 'formularioLavraOcupada';
        const page = './agricultores/pageInquerito.php?perfil=';
        processFunction(url, form, page);
    }
</script>
