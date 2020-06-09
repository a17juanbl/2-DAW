<?php
require_once('include/DB.php');
require_once('include/Ordenador.php');
require_once('Smarty.class.php');
/*
 Nuevo fichero para crear la clase ordenador y llamar a la plantilla que mostrará sus datos
*/
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
// He puesto una dirección relativa para poder incluir smarty en el directorio
// del proyecto y poder comprimirlo todo en un solo fichero zip
$smarty = new Smarty;
$smarty->template_dir = 'web/smarty/tarea/templates/';
$smarty->compile_dir = 'web/smarty/tarea/templates_c/';
$smarty->config_dir = 'web/smarty/tarea/configs/';
$smarty->cache_dir = 'web/smarty/tarea/cache/';

// Comprobamos si se ha enviado el formulario de vaciar la cesta

if (isset($_GET['codigo'])) {
	$smarty->assign('correcto',true);
	$miordenador = DB::obtieneOrdenador($_GET['codigo']);
	$ordenador=new Ordenador($miordenador);

	$smarty->assign('ordenador',$ordenador);
	$smarty->assign('usuario', $_SESSION['usuario']);

}else{
	$smarty->assign('correcto',false);
}

// Mostramos la plantilla
$smarty->display('ordenador.tpl');     
?>