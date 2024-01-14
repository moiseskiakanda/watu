<?php
/* Created by kiaka
   Project name watu
   Data: 03/09/2023
   Time: 13:50
*/
sleep(2);
require __DIR__ . "./../vendor/autoload.php";
//cadastrar user
use Source\User\User;
//confirmar se foi eviado
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $password = password_hash(filtInputPost($_POST['password']), PASSWORD_DEFAULT);
    $user = new User();
    $user->setNameUser(filtInputPost($_POST['username']));
    $user->setPasswordUser($password);
    $user->setLoginTimeUser(date("Y-m-d H:i:s"));
    $user->setLogoutTimeUser(date("Y-m-d H:i:s"));
    $addUser = $user->insertUser();
    if($addUser[0]):
        echo json_encode(array(true, CONF_URL_BASE, "Cadastrado com sucesso!"));
    else:
        echo json_encode(array(false, "Erro ao cadastrar!<br>".$addUser[1]));
    endif;

} else {
    echo json_encode(array(false, "Preenccha os campos"));
}