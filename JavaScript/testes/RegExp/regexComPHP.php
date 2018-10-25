<?php

$alvo = '11a22b33c';
$regexp = '~(\d\d)(\w)~';
$achou = preg_match($regexp, $alvo, $match);
var_dump($achou);
echo $match;