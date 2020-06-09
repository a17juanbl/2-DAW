<?php
    require_once 'Funcionesw.php';
    
    $server = new SoapServer(null, array('uri'=>''));
    $server->setClass('Funciones');
    $server->handle();
?>
