<?php
/*
    Created by Moises Kiakanda
    Project name WATU
    Data: 02/09/2023
    Time: 19:25
*/

//Add autoload
use Source\Authentication\Authentication;

sleep(2);

require __DIR__ . "./../vendor/autoload.php";

sleep(1);

//Authicador
$auth = new Authentication();
//confirmar se foi eviado
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $userAuth = $auth->authenticate($_POST['email'], $_POST['password']);

    $res = [$userAuth[0], $userAuth[1], "Accesso com sucesso!"];

    echo json_encode($res);

} else {

    echo json_encode(array(false, "Preenccha os campos"));

}