<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 00:18:11
         compiled from "web\smarty\tarea\templates\listaproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17822512cb104db8478-38041807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e12b8d3c5066d4aea9f17f9a9835d1ceb434a78' => 
    array (
      0 => 'web\\smarty\\tarea\\templates\\listaproductos.tpl',
      1 => 1362010661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17822512cb104db8478-38041807',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cb104e57b17_64417702',
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cb104e57b17_64417702')) {function content_512cb104e57b17_64417702($_smarty_tpl) {?>    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value){
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
      <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
      <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
      <input type='submit' name='enviar' class='boton' value='Añadir'/>
      
      <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia()!="ORDENA"){?>
        
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>

      <?php }else{ ?>
        
        <a href="ordenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
</a>
      <?php }?>
      : <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php } ?>
<?php }} ?>