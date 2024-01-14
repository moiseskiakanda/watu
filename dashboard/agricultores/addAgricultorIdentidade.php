<?php
/* Created by kiaka
   Project name watu
   Data: 20/09/2023
   Time: 20:46
*/
//Autoload
    require __DIR__ . "./../../vendor/autoload.php";
    //Consulta um agricultor
    use Source\Agricultor\Agricultor;
    use Source\Agricultor\Lavra;
    use Source\Agricultor\LavraOcupada;

    $agricultor = new Agricultor();
    $lavra = new Lavra();
    $lavraOc = new LavraOcupada();
    // Verifica se a solicitação é do tipo GET
    global $code;
    //Verificar se o agricultor foi encontrado
    if (isset($_GET["id"]) && $_GET["id"] != 0) {
        //Checar se o ID é um Code ou um ID do agricultor
        $cCode = $agricultor->checkCode(filtInputPost($_GET["id"]));
        if ($cCode[0]) {
            //Se for um code
            $id = $cCode[1];
            $code = $cCode[2];
            define("STATUS","Actualizar");
            define("ICON","fa fa-user-edit");
            define("COLOR","text-danger");
        } else {
            //Se for um ID
            $id = filtInputPost($_GET["id"]);
            $code = $id;
            //Verificar se o ID for igua a ZERO
            define("STATUS","Adicionar");
            define("ICON","fa fa-user-plus");
            define("COLOR","text-secondary");
        }
    } else {
        $id = 0;
        $code = $id;
        define("STATUS","Adicionar");
        define("ICON","fa fa-user-plus");
        define("COLOR","text-secondary");
    }
    $agricultor->getAgricultorId($id);
?>
<!-- /#left content-->
<aside class="newContent">

    <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">

        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="nav_top_align text-uppercase"><i class="<?= ICON ?>"></i>&nbsp;&nbsp;<?= STATUS ?> agricultor</h4>
                    </div>
                    <div class="col-lg-7">
                        <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class=" breadcrumb-item vanishIn">
                                <a href="./">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><?= STATUS ?> agricultor</li>
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
                                            <i class="<?= ICON ?>"></i> <?= STATUS ?> AGRICULTOR
                                        </h2>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- botao para actualizar a pagina -->
                                        <a href="#" onclick="return addUser('<?= $code ?>')" class="btn btn-light float-right" title="Actualizar a página">
                                            <i class="fa fa-refresh"></i> Actualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card_block_top_align ">


<form id="formularioIdentificacao" action="javascript:sendIdentidade()" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $agricultor->getIdIdentidade() ?>">
    <input type="hidden" name="status" value="<?= STATUS ?>">
    <input type="hidden" name="tipo" value="identidade">
    <input type="hidden" name="idAntigo" value="<?= $code ?>">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="identidadeAgri">Identidade</label>
                <input type="text" class="form-control" name="identidadeAgri" id="identidadeAgri" value="<?= $code ?>">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $agricultor->getNomeIdentidade() ?>" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="localizacao">Localização:</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" value="<?= $agricultor->getLocalizacaoIdentidade() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $agricultor->getBairroIdentidade() ?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="municipio">Município:</label>
                <input type="text" class="form-control" id="municipio" name="municipio" value="<?= $agricultor->getMunicipioIdentidade() ?>"" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="composicao">Composição do Agregado Familiar:</label>
                <textarea class="form-control" id="composicao" name="composicao" rows="1" required><?= $agricultor->getComposicaoIdentidade() ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="meios_subsistencia">Meios de Subsistência:</label>
                <textarea class="form-control" id="meios_subsistencia" name="meios_subsistencia" rows="1" required><?= $agricultor->getMeiosSubsistenciaIdentidade() ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="contactos">Contactos:</label>
                <input type="text" class="form-control" id="contactos" name="contactos" value="<?= $agricultor->getContactosIdentidade() ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="testemunhas">Testemunhas (nomes e contactos):</label>
                <textarea class="form-control" id="testemunhas" name="testemunhas" rows="1"><?= $agricultor->getTestemunhasIdentidade() ?></textarea>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-3">
            <button type="reset" class="btn btn-danger btn-block btn-lg"> <i class="fa fa-eraser"></i>
                Limpar
            </button>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg">
                <i class="fa fa-hand-o-right"></i>
                Proximo
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
<!-- /#content -->
<script type="text/javascript">
    //funcao para envio dos dados
    function sendIdentidade () {
        const form = "formularioIdentificacao";
        const url  = "./agricultores/excut.php";
        const page = "./agricultores/addLavraAgricultor.php?id=0&code=";
        processFunction(url,form,page);
    }
</script>