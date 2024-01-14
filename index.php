<?php
    require __DIR__ . "/vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="<?= CONF_SITE_LANG ?>">
<head>
    <meta charset="UTF-8">
    <title><?= CONF_SITE_NAME ?></title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/v4-shims.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <h2><?= CONF_SITE_DESC ?></h2>
        <hr>
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    ACESSO AO SISTEMA <i class="fa-solid fa-key"></i>
                </div>
                <div class="card-body">
                    <form action="javascript:login();" id="formUser" name="formUser" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">
                                Nome de Email <i class="fas fa-user-alt"></i>
                            </label>
                            <input type="email" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password <i class="fa-solid fa-lock"></i>
                            </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    Acessar <i class="fa-solid fa-right-to-bracket"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userModal">
                            Registar-se <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para criar um utilizador -->

        <!-- Modal -->
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Adicionar Usuário <i class="fas fa-user-alt"></i> </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <form id="formRegister" action="javascript:register()" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="username" class="form-label">Email do usuario</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="Nome de Usuário">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Fechar <i class="fa-solid fa-window-close"></i>
                        </button>
                        <button type="reset" class="btn btn-danger">Limpar <i class="fa-solid fa-trash"></i></button>
                        <button type="submit" class="btn btn-primary">Salvar <i class="fa-solid fa-save"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>




    </div>
</div>
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
<script src="./node_modules/@fortawesome/fontawesome-free/js/v4-shims.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./assets/js/support.js"></script>
</body>
</html>
