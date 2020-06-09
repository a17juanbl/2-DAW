<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 21:22:39
         compiled from "web/smarty/tarea/templates\productoscesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8487512bd61f0d0ea1-29877878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d8a4e0c6d7fdac1b133231786d7ae0e13b9997c' => 
    array (
      0 => 'web/smarty/tarea/templates\\productoscesta.tpl',
      1 => 1312203626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8487512bd61f0d0ea1-29877878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productoscesta' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_512bd61f203873_73091960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512bd61f203873_73091960')) {function content_512bd61f203873_73091960($_smarty_tpl) {?>    <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
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
            <input type='submit' name='vaciar' value='Vaciar Cesta' disabled='true' />
        <?php }else{ ?>
            <input type='submit' name='vaciar' value='Vaciar Cesta' />
        <?php }?>
    </form>
    <form id='comprar' action='cesta.php' method='post'>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)){?>
            <input type='submit' name='comprar' value='Comprar' disabled='true' />
        <?php }else{ ?>
            <input type='submit' name='comprar' value='Comprar' />
        <?php }?>
    </form> 
<?php }} ?>