<?php

function autoload($className){
    $chemins=['app/','controllers/','models/'];
    foreach($chemins as $chemin){
        $chemin=ROOT.$chemin.$className.'.php';

        if(file_exists($chemin)){
            require_once $chemin;
        }
    }
}

spl_autoload_register("autoload");
?>