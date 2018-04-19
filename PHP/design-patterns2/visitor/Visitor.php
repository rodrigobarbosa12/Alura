<?php 

interface Visitor {
    public function avalia();
    public function aceita(Impressora $impressora);
}