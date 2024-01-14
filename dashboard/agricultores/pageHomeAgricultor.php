<?php
/* Created by kiaka
   Project name watu
   Data: 22/09/2023
   Time: 15:42
*/
//Autoload
use Source\Agricultor\Agricultor;

require __DIR__ . "./../../vendor/autoload.php";
//Instanciar a classe Agricultor
$agricultor = new Agricultor();
//Listar todos os agricultores
$agricultores = $agricultor->find()->fetch(true);
?>
<!--/#left content-->
<aside class="newContent">

    <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">

        <header class="head">
            <div class="main-bar">
                <div class="row">
                    <div class="col-lg-5">
                        <h4 class="nav_top_align text-uppercase"><i class="fa fa-user"></i>&nbsp;&nbsp;Formulário de Inquérito ao Agricultor</h4>
                    </div>
                    <div class="col-lg-7">
                        <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                            <li class=" breadcrumb-item vanishIn">
                                <a href="./">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Formulário de Inquérito ao Agricultor</li>
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
                                        <h2 class="text-secondary text-uppercase"><i class="fa fa-id-card"></i> Formulário de Inquérito ao Agricultor </h2>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- botao para actualizar a pagina -->
                                        <a href="#" onclick="return agricultorHomePage()" class="btn btn-light float-right"
                                           title="Actualizar a página">
                                            <i class="fa fa-refresh"></i> Actualizar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body card_block_top_align ">


<div class="row justify-content-center">
    <div class="col-md-10 mt-5 mb-5">
        <form action="javascript:pesquisar()" method="get">
            <div class="input-group text-center">

                <input type="text" class="form-control select2" name="codeAgricultor" id="codeAgricultor" placeholder="Adicionar aqui a identidade do agricultor" aria-label="Pesquisar" aria-describedby="botao-pesquisar" list="agricultores" required>
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit" id="botao-pesquisar">
                        <i class="fa fa-search"></i>&nbsp;Pesquisar
                    </button>
                </div>
                <!-- Criar um datalist -->
                <datalist id="agricultores">
                    <?php
                        //Percorrer os agricultores
                        foreach ($agricultores as $agricultor) { ?>
                            <option value="<?= $agricultor->identidade; ?>">
                                <?= $agricultor->identidade; ?> -- <?= $agricultor->nome ?>
                            </option>
                    <?php  } ?>
                </datalist>
            </div>
        </form>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4 text-secondary text-center">
                <i class="fa fa-id-card fa-5x"></i><br> <b>Identidade do Agricultor</b>
            </div>
            <div class="col-md-4 text-secondary text-center">
                <i class="fa fa-address-book fa-5x"></i><br> <b>Lavra</b>
            </div>
            <div class="col-md-4 text-secondary text-center">
                <i class="fa fa-map fa-5x"></i> <br><b>Lavra Ocupada</b>
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
<script type="text/javascript">
    //funcao para pesquisar agricultor em AJAX e responder o número identidade do agricultor
    function pesquisar () {
        const consulta = $("#codeAgricultor").val();
        $.ajax({
            url: './agricultores/consulta.php',
            type: 'GET',
            dataType: 'JSON',
            data: { 'consulta': consulta },
            beforeSend: function() {
                carregandoInfoOne();
            },
            success: function(response) {
                //Se nao encontrou o agricultor, apresenta pagina de cadastramento
                if (response[0] === true) {
                    remove_add("./agricultores/"+response[1]+response[2]);
                } else {
                    //Se encontrou o agricultor, apresenta pagina de cadastramento
                    location.reload();
                }
            },
            error: function(erro) {
                erroInfoOne("ERRO: Agricultor não encontrado<br>"+erro.responseText);
            }
        });
    }
</script>