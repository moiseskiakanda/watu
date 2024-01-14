<?php

use JetBrains\PhpStorm\NoReturn;

const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "watu",
    "username" => "root",
    "passwd" => "senha*1",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];
const CONF_BASE_DIR = "/watu";
const CONF_URL_BASE = "https://localhost/watu";
const CONF_SITE_NAME = "ELECNOR GOVE-MATALA";
const CONF_SITE_LOGO_RNT = CONF_URL_BASE."/assets/img/rntLogo.jpg";
const CONF_SITE_LOGO_ELEC = CONF_URL_BASE."/assets/img/elecnorLogo.png";
const CONF_SITE_LOGO = CONF_URL_BASE."/assets/img/logo.webp";
const CONF_SITE_DESC = "Plano de Acção de Reassentamento do Projecto da Linha de Transmissão ELECNOR GOVE-MATALA";
const CONF_SITE_LANG = "us";
const CONF_SITE_AVATAR = CONF_URL_BASE."/assets/img/avatar.png";
const CONF_AUTHOR = "Moises Kiakanda";
//Function para limpar valores do post ou get
function filtInputPost($key): string
{
    $data = filter_var($key, FILTER_SANITIZE_SPECIAL_CHARS);
    return htmlspecialchars($data, ENT_QUOTES);
}
//Function para limpar valores do post ou get
function filtInputGet($key): string
{
    $data = filter_var($key, FILTER_SANITIZE_SPECIAL_CHARS);
    return htmlspecialchars($data, ENT_QUOTES);
}
//Retorna uma resposta JSON
/**
 * @param array $data
 * @param int $statusCode
 * @return void
 */
#[NoReturn] function responseJSON(array $data, int $statusCode = 200): void
{
    http_response_code($statusCode);
    header("Content-Type: application/json");
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}
#[NoReturn] function redirect(string $string): void
{
    header("Location: {$string}");
    exit;
}