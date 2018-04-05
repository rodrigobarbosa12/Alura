<?php

spl_autoload_register(function($class_name){
    include($class_name .'.php');

});

$obj = new myClass();
?>

<br/><br/>

<?php
$obj2 = new myClass2();
?>


