<?php /* Smarty version 3.1.27, created on 2016-08-29 09:20:38
         compiled from "C:\xampp\htdocs\manavimk2\application\views\templates\road\send.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:414757c3e246a18b31_08156327%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af8fec74d052a398b2495930d75eb799f1be83e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\manavimk2\\application\\views\\templates\\road\\send.tpl',
      1 => 1472455233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '414757c3e246a18b31_08156327',
  'variables' => 
  array (
    'road' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57c3e246a9b3b8_56897315',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57c3e246a9b3b8_56897315')) {
function content_57c3e246a9b3b8_56897315 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '414757c3e246a18b31_08156327';
?>
{
	"id": "<?php echo $_smarty_tpl->tpl_vars['road']->value['road_id'];?>
",
	"title": "<?php echo $_smarty_tpl->tpl_vars['road']->value['title'];?>
",
	"type": "<?php echo $_smarty_tpl->tpl_vars['road']->value['type'];?>
",
	"url": "<?php echo $_smarty_tpl->tpl_vars['road']->value['file'];?>
",
	"next_road_id": "1",
	"prev_road_id": "2",
	"items": [
	]
}<?php }
}
?>