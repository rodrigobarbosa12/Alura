<?php 
session_start();

function mostraAlerta($tipo){ #variavel $tipo passa a valer success ou danger
    if(isset($_SESSION[$tipo])){ ?>
    <p class="alert-<?=$tipo?>"><?= $_SESSION[$tipo] ?></p>

<?php
 unset($_SESSION[$tipo]);
    }
}
?> 

