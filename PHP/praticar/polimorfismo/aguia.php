<?php

spl_autoload_register(function($class_name){
    include($class_name .'.php');

});

class aguia extends mistica{

    public function locomover(){
        echo "aguia voa!";
    }
}

$aguia = new Aguia;
$aguia->locomover();


