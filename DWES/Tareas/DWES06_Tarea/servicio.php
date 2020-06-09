<?php
    require_once 'Funciones.php';
    
    $server = new SoapServer(null, array('uri'=>''));
    $server->setClass('Funciones');
    $server->handle();
?>
