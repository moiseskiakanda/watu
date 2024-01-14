<?php
/* Created by kiaka
   Project name watu
   Data: 20/09/2023
   Time: 12:46
*/
session_start();
require __DIR__ . "./../vendor/autoload.php";
$lout = new \Source\Authentication\Authentication();
$lout->logout();