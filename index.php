<?php

namespace App;
require "conf.inc.php";

function myAutoloader($class)
{
    $class = str_replace("App\\","",$class);
    $class = str_replace("\\", "/",$class);
    if(file_exists($class.".class.php")){
        include $class.".class.php";
    }
}

spl_autoload_register("App\myAutoloader");

//Réussir à récupérer l'URI
$uri = $_SERVER["REQUEST_URI"];


$routeFile = 'routes.json';
if(!file_exists($routeFile)){
    die("Le fichier ".$routeFile." n'existe pas");
}

$json = file_get_contents($routeFile);
$routes = json_decode($json,true);

//Verification de l'URL
if( empty($routes[$uri]) ||  empty($routes[$uri]["controller"])  ||  empty($routes[$uri]["action"])){
    die("Erreur 404");
}

$controller = ucfirst(strtolower($routes[$uri]["controller"]));
$action = strtolower($routes[$uri]["action"]);


//Verification de l'existence du Controller
$controllerFile = "Controller/".$controller.".class.php";
if(!file_exists($controllerFile)){
    die("Le controller ".$controllerFile." n'existe pas");
}

include $controllerFile;
//Verification de l'existence du Controller

$controller = "App\\Controller\\".$controller;
if( !class_exists($controller)){
    die("La classe ".$controller." n'existe pas");
}
// Initialisation du controller
$objectController = new $controller();

if( !method_exists($objectController, $action)){
    die("L'action ".$action." n'existe pas");
}
//renvoit à l'action souhaité
$objectController->$action();