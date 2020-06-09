<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 11:23:15
         compiled from "web\smarty\tarea\templates\productoscesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10201512cb104b4bd39-23749408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '302094040d25a8b8c5086076d6dcd7ac28dd87c8' => 
    array (
      0 => 'web\\smarty\\tarea\\templates\\productoscesta.tpl',
      1 => 1362049876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10201512cb104b4bd39-23749408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cb104d9f201_61313364',
  'variables' => 
  array (
    'productoscesta' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cb104d9f201_61313364')) {function content_512cb104d9f201_61313364($_smarty_tpl) {?><!-- Plantilla para mostrar los artículos obtenidos y los botones para vaciar
    o comprar los artículos de la cesta (botones iguales que los demás) -->
<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
<hr />
<?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)){?>
    <p>Cesta vacía</p>
<?php }else{ ?>
    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productoscesta']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
        <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</p>
    <?php } ?>
<?php }?>

<form id='vaciar' action='productos.php' method='post'>
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)){?>
        <input type='submit' name='vaciar' class='boton' value='Vaciar Cesta' disabled='true' />
    <?php }else{ ?>
        <input type='submit' name='vaciar' class='boton' value='Vaciar Cesta' />
    <?php }?>
</form>
<form id='comprar' action='cesta.php' method='post'>
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)){?>
        <input type='submit' name='comprar' class='boton' value='Comprar' disabled='true' />
    <?php }else{ ?>
        <input type='submit' name='comprar' class='boton' value='Comprar' />
    <?php }?>
</form> 
<?php }} ?>