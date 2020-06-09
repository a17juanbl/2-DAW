<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 21:22:39
         compiled from "web/smarty/tarea/templates\listaproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12244512bd61f21bab8-72556417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a14a42706db2bdbaeaafaacecbdad3e98815c60' => 
    array (
      0 => 'web/smarty/tarea/templates\\listaproductos.tpl',
      1 => 1312203626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12244512bd61f21bab8-72556417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_512bd61f280380_59929353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512bd61f280380_59929353')) {function content_512bd61f280380_59929353($_smarty_tpl) {?>    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php } ?>
<?php }} ?>