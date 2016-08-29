<?php /* Smarty version 3.1.27, created on 2016-08-29 09:24:22
         compiled from "C:\xampp\htdocs\manavimk2\application\views\templates\node\send.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:118157c3e326819311_31235574%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '820de16e5cd39925c2ce24d274d2ef16a1dfe122' => 
    array (
      0 => 'C:\\xampp\\htdocs\\manavimk2\\application\\views\\templates\\node\\send.tpl',
      1 => 1472455438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118157c3e326819311_31235574',
  'variables' => 
  array (
    'node' => 0,
    'road_flg' => 0,
    'roads' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57c3e3268d9da0_67339065',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57c3e3268d9da0_67339065')) {
function content_57c3e3268d9da0_67339065 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '118157c3e326819311_31235574';
?>
{
	"id": "<?php echo $_smarty_tpl->tpl_vars['node']->value['node_id'];?>
",
	"title": "<?php echo $_smarty_tpl->tpl_vars['node']->value['tile'];?>
",
	"type": "<?php echo $_smarty_tpl->tpl_vars['node']->value['type'];?>
",
	"url": "<?php echo $_smarty_tpl->tpl_vars['node']->value['file'];?>
",
	"lines": [
         <?php if ($_smarty_tpl->tpl_vars['road_flg']->value == true) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['roads']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_loop'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_loop']->value['iteration']++;
$_smarty_tpl->tpl_vars['__foreach_loop']->value['last'] = $_smarty_tpl->tpl_vars['__foreach_loop']->value['iteration'] == $_smarty_tpl->tpl_vars['__foreach_loop']->value['total'];
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_loop']->value['last']) ? $_smarty_tpl->tpl_vars['__foreach_loop']->value['last'] : null)) {?>
		            {
			            "id": "<?php echo $_smarty_tpl->tpl_vars['v']->value['road_id'];?>
",
			            "degree": <?php echo $_smarty_tpl->tpl_vars['v']->value['degree'];?>

		            }
		        <?php } else { ?>
		            {
			            "id": "<?php echo $_smarty_tpl->tpl_vars['v']->value['road_id'];?>
",
			            "degree": <?php echo $_smarty_tpl->tpl_vars['v']->value['degree'];?>

		            },
		        <?php }?>
            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
         <?php }?>
	]
}<?php }
}
?>