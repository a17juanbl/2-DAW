<?php
require_once 'Funciones.php';
require_once 'WSDLDocument.php';

$wsdl = new WSDLDocument(
        'Funciones',
        'http://127.0.0.1/dwes/tarea6/servicio.php',
        'http://127.0.0.1/dwes/tarea6');

echo $wsdl->saveXML();
?>
