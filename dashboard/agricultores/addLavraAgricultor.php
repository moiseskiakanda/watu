<?php
/* Created by kiaka
   Project name watu
   Data: 22/09/2023
   Time: 05:42
*/

//Autoload
require __DIR__ . "./../../vendor/autoload.php";

use Source\Agricultor\Lavra;

$lavra = new Lavra();
//Verificar se a Lavra foi encontrado

if (isset($_GET["code"]) && $_GET["id"] != 0) {
    //Checar se o ID é um Code ou um ID da Lavra ocupada
    $cCode = $lavra->checkCodeLavra(filtInputPost($_GET["code"]));
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
    //Verificar se foi enviado o ID via get
} else {
    $id = filtInputPost($_GET["code"]) ?? 0;
    $code = $id;
    define("STATUS", "Adicionar");
    define("ICON", "fa fa-address-book");
    define("COLOR", "text-secondary");
}

$lavra->getLavra($id);

?>
<!--/#left content-->
<aside class="newContent">

    <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">

        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="nav_top_align text-uppercase">
                            <i class="<?= ICON ?>"></i> &nbsp;&nbsp; <?= STATUS ?>&nbsp;Lavra
                        </h4>
                    </div>
                    <div class="col-lg-7">
                        <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class=" breadcrumb-item vanishIn">
                                <a href="./">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><?= STATUS ?>&nbsp;Lavra</li>
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
                                        <h2 class="<?= COLOR ?> text-uppercase"><i
                                                    class="<?= ICON ?>"></i> <?= STATUS ?>&nbsp;Lavra</h2>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- botao para actualizar a pagina -->
                                        <a href="#" onclick="return addLavra('<?= $id ?>')"
                                           class="btn btn-light float-right"
                                           title="Actualizar a página">
                                            <i class="fa fa-refresh"></i> Actualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card_block_top_align ">


<form id="formularioLavra" action="javascript:sendLavra()" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idCodeAgricultor" id="idCodeAgricultor" value="<?= $id ?>">
    <input type="hidden" name="status" value="<?= STATUS ?>">
    <input type="hidden" name="tipo" value="lavra">

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="localizacao_lavra"><i class="fas fa-map-marker"></i> Localização:</label>
                <input type="text" class="form-control" id="localizacao_lavra"
                       name="localizacao_lavra"
                       value="<?= $lavra->getLocalizacaoLavra() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bairro_lavra"><i class="fas fa-home"></i> Bairro:</label>
                <input type="text" class="form-control" id="bairro_lavra"
                       name="bairro_lavra"
                       value="<?= $lavra->getBairroLavra() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="municipio_lavra"><i class="fas fa-building"></i> Município:</label>
                <input type="text" class="form-control" id="municipio_lavra"
                       name="municipio_lavra"
                       value="<?= $lavra->getMunicipioLavra() ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="pontos_referencia"><i class="fas fa-compass"></i> Pontos de Referência Local da
                    Lavra:</label>
                <textarea class="form-control" id="pontos_referencia"
                          name="pontos_referencia" rows="1"
                          required><?= $lavra->getPontosReferenciaLavra() ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="area_total">:<i class="fas fa-ruler"></i> Área Total:</label>
                <input type="text" class="form-control" id="area_total"
                       name="area_total"
                       value="<?= $lavra->getAreaTotalLavra() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="area_cultivo"><i class="fas fa-seedling"></i> Área para Cultivo:</label>
                <input type="text" class="form-control" id="area_cultivo"
                       name="area_cultivo"
                       value="<?= $lavra->getAreaCultivoLavra() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="culturas"><i class="fas fa-seedling"></i>Cultura(s):</label>
                <input type="text" class="form-control" id="culturas" name="culturas"
                       value="<?= $lavra->getCulturasLavra() ?>" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="producao_anual"><i class="fas fa-balance-scale"></i> Produção/Cultura (KG/ANO):</label>
                <input type="text" class="form-control" id="producao_anual"
                       name="producao_anual"
                       value="<?= $lavra->getProducaoAnualLavra() ?>" required>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-3">
            <button type="reset" class="btn btn-danger btn-block btn-lg">
                <i class="fa fa-eraser"></i>
                Limpar
            </button>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">
                <i class="fas fa-save"></i> <i class="fas fa-arrow-right"></i>
                Salvar e Proximo
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
    //funcao para enviar os dados da lavra
    function sendLavra () {
        const form = 'formularioLavra';
        const url = "./agricultores/excut.php";
        const page = "./agricultores/addLavraOcupada.php?id=0&code=";
        processFunction(url,form,page)
    }
</script>