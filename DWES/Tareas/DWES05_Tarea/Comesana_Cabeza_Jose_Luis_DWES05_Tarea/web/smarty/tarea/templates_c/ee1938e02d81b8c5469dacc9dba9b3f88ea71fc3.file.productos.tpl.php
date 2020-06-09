<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 11:23:15
         compiled from "web\smarty\tarea\templates\productos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4640512cb104a0b1c2-49684387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee1938e02d81b8c5469dacc9dba9b3f88ea71fc3' => 
    array (
      0 => 'web\\smarty\\tarea\\templates\\productos.tpl',
      1 => 1362049614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4640512cb104a0b1c2-49684387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cb104b2a320_13117392',
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cb104b2a320_13117392')) {function content_512cb104b2a320_13117392($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tarea 5 : Programación orientada a objetos en PHP -->
<!-- Tienda Web: productos.php -->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea 5: Listado de Productos con Plantillas</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
  </head>

  <body class="pagproductos">
    <div id="contenedor">
      <div id="encabezado">
        <h1>Listado de productos</h1>
      </div>
    
      <!-- Dividir en varios templates -->
      <div id="cesta" style="text-align:center">      
        <?php echo $_smarty_tpl->getSubTemplate ("productoscesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      </div>
    
      <div id="productos">
        <?php echo $_smarty_tpl->getSubTemplate ("listaproductos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      </div>
  
      <br class="divisor" />
      <div id="pie">
        <form action='logoff.php' method='post'>
          <!-- Botón del mismo tipo que los demás -->
          <input type='submit' name='desconectar' class='boton' style='width:100%;' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
        </form>        
      </div>
    </div>
  </body>
</html><?php }} ?>