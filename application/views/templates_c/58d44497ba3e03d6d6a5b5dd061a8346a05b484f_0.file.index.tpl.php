<?php /* Smarty version 3.1.27, created on 2016-08-28 23:11:31
         compiled from "C:\xampp\htdocs\manavimk2\application\views\templates\category\send.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1076357c35383663c51_65357844%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58d44497ba3e03d6d6a5b5dd061a8346a05b484f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\manavimk2\\application\\views\\templates\\category\\send.tpl',
      1 => 1472418684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1076357c35383663c51_65357844',
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'base' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57c35383718126_01957003',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57c35383718126_01957003')) {
function content_57c35383718126_01957003 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1076357c35383663c51_65357844';
echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php $_smarty_tpl->tpl_vars["base"] = new Smarty_Variable("http://localhost/manavimk2/", null, 0);?>



<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>問題を選択してください．</div>
            <table>
                <tr>
                    <th>災害の種類</th>
                    <th>回答</th>
                </tr>
                <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                    <tr>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['v']->value['edit_flg'] == 1) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
map/olForm/<?php echo $_smarty_tpl->tpl_vars['v']->value['question_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
                            <?php } else { ?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
emergency/index/<?php echo $_smarty_tpl->tpl_vars['v']->value['question_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['abstract'];?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
            </table>
            <div class="btn btn-primary btn-large" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
question/add';">新規作成</div>
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php }
}
?>