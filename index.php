<?php
session_start();

define("ROOT", str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define("ROOTDOMAINE", "/dashboard/GROUPE_441_SESSION_AUTOMNE_23/I_Ka_Sugu/");


// require_once ROOT.'app/Controller.php';
// require_once ROOT.'app/Model.php';
require_once(ROOT.'app/'.'AutoChargement.php');

$params = explode('/',$_GET['p']);

if($params[0] != null){
    $controller = $params[0];
    $controller = ucfirst($controller);
    //require_once (ROOT.'controllers/'.$controller.".php");
    $controller = new $controller();
    $action = $params[1];
    if(method_exists($controller,$action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action],$params);
    }
    else{
        echo "Not found ";
    }
}


?>