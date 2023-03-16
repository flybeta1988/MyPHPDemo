<?php
/* Smarty version 4.0.0, created on 2022-02-28 14:31:09
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_621c6c2d47aa40_81989410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d93eb7dc195460efa767622a0e0110f6f95b4b8' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/welcome.tpl',
      1 => 1646029867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:block/meta.tpl' => 1,
  ),
),false)) {
function content_621c6c2d47aa40_81989410 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<title>欢迎 - 首页</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用本图书馆信息管理系统！</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>图书数</th>
				<th>用户数</th>
				<th>分类数</th>
				<th>书架数</th>
				<th>借阅数</th>
				<th>预约数</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['book'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['user'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['category'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['shelf'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['lend'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['stat']->value['subscribe'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
			本后台系统由<a href="#" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
</body>
</html><?php }
}
