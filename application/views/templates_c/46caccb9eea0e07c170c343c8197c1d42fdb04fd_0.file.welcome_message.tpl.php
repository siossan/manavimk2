<?php /* Smarty version 3.1.27, created on 2015-12-24 16:33:19
         compiled from "D:\projects\codeigniter\application\views\templates\welcome_message.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:335567bbbdf93b426_83646445%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46caccb9eea0e07c170c343c8197c1d42fdb04fd' => 
    array (
      0 => 'D:\\projects\\codeigniter\\application\\views\\templates\\welcome_message.tpl',
      1 => 1450948520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '335567bbbdf93b426_83646445',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_567bbbdf995fc3_45161788',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_567bbbdf995fc3_45161788')) {
function content_567bbbdf995fc3_45161788 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '335567bbbdf93b426_83646445';
echo '<?php
';?>defined('BASEPATH') OR exit('No direct script access allowed');
<?php echo '?>';?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter! [Use Smarty Template Engine]</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/templates/welcome_message.tpl</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

</div>

</body>
</html><?php }
}
?>