<?php
/* Created by kiaka
   Project name watu
   Data: 23/09/2023
   Time: 11:41
*/
    //Autoload
    require __DIR__ . "./../../vendor/autoload.php";
    $perfil = filtInputPost($_GET["perfil"]) ?? 0;
    //Class Agricultor
    use Source\Agricultor\Agricultor;
    use Source\Agricultor\Lavra;
    use Source\Agricultor\LavraOcupada;

    $agricultor = new Agricultor();
    $lavra = new Lavra();
    $lavraOcupada = new LavraOcupada();
    $css = "./css/perfil.css";
    $img = "./img/avatar7.png";
    $agricultor->getAgricultor($perfil);
    $lavra->getLavra($perfil);
    $lavraOcupada->consultarLavraOcupada($perfil);
?>
<link rel="stylesheet" href="<?= $css ?>"/>
<!--/#left content-->
<aside class="newContent">

    <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">

        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="nav_top_align text-uppercase"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Formulário de Inquérito ao Agricultor</h4>
                    </div>
                    <div class="col-lg-7">
                        <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class=" breadcrumb-item vanishIn">
                                <a href="./">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Inquérito ao Agricultor</li>
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
                                    <div class="col-md-7">
                                        <h2 class="text-secondary text-uppercase">
                                            <i class="fas fa-file-alt"></i>&nbsp;&nbsp;Formulário de Inquérito ao Agricultor
                                        </h2>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- Botao para imprimir os dados -->
                                        <a href="javascript:void(0)"
                                           onclick="return openModalPrint('./agricultores/printPdf.php?q=<?= base64_encode($perfil)?>')" class="btn btn-secondary btn-block">
                                            <i class="fas fa-print"></i>
                                            Imprimir
                                        </a>
                                    </div>&nbsp;
                                    <div class="col-md-2">
                                        <!-- botao para actualizar a pagina -->
                                        <a href="#" onclick="return pageInequerito('<?= $perfil ?>')" class="btn btn-secondary btn-block"
                                           title="Actualizar a página">
                                            <i class="fa fa-refresh"></i> Actualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card_block_top_align ">


<div class="container">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img class="m-auto" src="<?= $img ?>" alt="Perfil">
                </div>
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">
                        <?= $agricultor->getNomeIdentidade() ?>
                    </h2>
                    <p class="sm-width-95 sm-margin-auto">
                        <?= $agricultor->getContactosIdentidade() ?>
                    </p>
                    <div class="margin-20px-top">
                        <div class="no-margin row">
                            <div class="col-md-6">
                                <div class="team-single-item">
                                    <a href="javascript:void(0)" onclick="return addUser('<?= $perfil ?>')" class="btn btn-info btn-lg btn-block">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="team-single-item">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-lg btn-block">
                                        <i class="fas fa-trash-alt"></i>
                                        Apagar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="font-size38 sm-font-size32 xs-font-size30"><?= $agricultor->getNomeIdentidade() ?></h4>
                            <p class="no-margin-bottom">
                                <?=
                                $agricultor->getTestemunhasIdentidade()
                                ." - ".
                                $agricultor->getLocalizacaoIdentidade()
                                ." - ".
                                $agricultor->getContactosIdentidade()
                                ?>
                            </p>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>

                    <div class="row" style="box-shadow: rgba(14, 30, 37, 0.12) 0 2px 4px 0, rgba(14, 30, 37, 0.32) 0 2px 16px 0;">

                        <div class="col-md-12"> <br>
                            <!--Tabela dos dados do Agricultor -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th colspan="2" class="text-center" style="background-color: #FFD966">IDENTIFICAÇÃO DO AGREGADO FAMILIAR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Identidade</th>
                                        <td><?= $agricultor->getIndetidadeIdentidade() ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nome</th>
                                        <td><?= $agricultor->getNomeIdentidade() ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Testemunha</th>
                                        <td><?= $agricultor->getTestemunhasIdentidade() ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Localização</th>
                                        <td><?= $agricultor->getLocalizacaoIdentidade() ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Composição</th>
                                        <td><?= $agricultor->getComposicaoIdentidade() ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contactos</th>
                                        <td><?= $agricultor->getContactosIdentidade() ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Fim da tabela dos dados do Agricultor -->
                    </div>
                    <div class="col-md-12">
                        <!-- Tabela dos dados da Lavra (tabela-agricultorlavra)-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-uppercase">
                                    <th colspan="2" class="text-center" style="background-color: #FFD966">LAVRA PRÓPRIA?</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Localização</th>
                                    <td><?= $lavra->getLocalizacaoLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bairro</th>
                                    <td><?= $lavra->getBairroLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Municipio</th>
                                    <td><?= $lavra->getMunicipioLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pontos de referência local da lavra</th>
                                    <td><?= $lavra->getPontosReferenciaLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Área Total</th>
                                    <td><?= $lavra->getAreaTotalLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Área de Cultivo</th>
                                    <td><?= $lavra->getAreaCultivoLavra() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cultura(s)</th>
                                    <td><?= $lavra->getCulturasLavra() ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Fim da tabela dos dados da Lavra -->
                    </div>
                    <div class="col-md-12">
                        <!-- Tabela Lavra ocupada -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr class="text-uppercase">
                                    <th colspan="2" class="text-center" style="background-color: #C5E0B3">
                                        LAVRA OCUPADA NO LOCAL DA TORRE OU NA FAIXA DE SERVIDÃO
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">LOCALIZAÇÃO (utilizar numeração do mapa topográfico)</th>
                                    <td><?= $lavraOcupada->getLocalizacaoLavraOcupada() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Área total</th>
                                    <td><?= $lavraOcupada->getAreaTotalLavraOcupada() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Área para cultivo</th>
                                    <td><?= $lavraOcupada->getAreaCultivoLavraOcupada() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Produção/Cultura (KG/ANO)</th>
                                    <td><?= $lavraOcupada->getProducaoAnualLavraOcupada() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tipo de Lavra</th>
                                    <td><?= $lavraOcupada->getTipoLavraOcupada() ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">DATA (período que utilizou a área):</th>
                                    <td>
                                        De: <?= $lavraOcupada->getDataUtilizacaoInicioOcupada() ?>
                                        a: <?= $lavraOcupada->getDataUtilizacaoFimOcupada() ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Observações</th>
                                    <td><?= $lavraOcupada->getObservacoesLavraOcupada() ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Fim da tabela Lavra ocupada -->
                    </div>

                </div>
            </div>
        </div>
    </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>
<!-- Fim do conteudo da pagina -->
