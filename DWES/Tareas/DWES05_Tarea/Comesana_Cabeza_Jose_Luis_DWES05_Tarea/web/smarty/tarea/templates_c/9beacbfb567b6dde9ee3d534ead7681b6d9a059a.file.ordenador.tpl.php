<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 11:25:13
         compiled from "web\smarty\tarea\templates\ordenador.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30014512cf4e7308d39-74800729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9beacbfb567b6dde9ee3d534ead7681b6d9a059a' => 
    array (
      0 => 'web\\smarty\\tarea\\templates\\ordenador.tpl',
      1 => 1362049445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30014512cf4e7308d39-74800729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cf4e7365e41_68166390',
  'variables' => 
  array (
    'ordenador' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cf4e7365e41_68166390')) {function content_512cf4e7365e41_68166390($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: ordenador.php -->
<!-- Nueva plantilla para presentar los datos de los ordenadores -->
<html>
	<head>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	  <title>Ordenador <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</title>
	  <link href="tienda.css" rel="stylesheet" type="text/css">
	</head>

	<body class="pagproductos">

		<div id="contenedor" style="background-color: #df8;">
		  <div id="encabezado">
		    <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>
				<p><b>C&oacute;digo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</b></p>
		  </div>
		  <div class="ordenador">
				<h2>Caracter&iacute;sticas:</h2>
				<p><b>Procesador:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</p>
				<p><b>RAM:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
 GB</p>
				<p><b>Tarjeta gr&aacute;fica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</p>
				<p><b>Unidad &oacute;ptica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</p>
				<p><b>Sistema Operativo:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getso();?>
</p>		
				<p><b>Otros:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</p>
				<p><b>PVP:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getpvp();?>
</p>
				<h2>Descripci&oacute;n:</h2>
				<p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
			</div>
  
		  <div id="pie" style="height: 25px">
				<form action="productos.php" method="post">
					<input type='submit' name='' value='Volver' class='izq boton' />
					<input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
' />
					<input type='submit' name='enviar' value='Comprar' class='dch boton' />
				</form>
		  </div>
		</div>
	</body>
</html><?php }} ?>