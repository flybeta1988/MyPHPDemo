<?php
/* Smarty version 4.0.0, created on 2022-04-06 15:57:18
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/lend/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_624d47dec98922_82449652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54f1741d5f30726c1b5d7494f61752488f1dad24' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/lend/index.tpl',
      1 => 1649231834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../block/meta.tpl' => 1,
    'file:block/footer.tpl' => 1,
  ),
),false)) {
function content_624d47dec98922_82449652 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/flybeta/dev/code/php/MyPHPDemo/BookManage/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_subTemplateRender("file:../block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<title>借阅记录</title>
</head>
<body class="pos-r">
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 借阅记录 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<?php if (is_admin($_smarty_tpl->tpl_vars['cuser']->value)) {?>
			<span class="l"><a class="btn btn-primary radius" onclick="add('出 借', '/lend/add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>出 借</a></span>
			<?php }?>
			<span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 条</span>
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="20">ID</th>
						<th width="300">书 名</th>
						<th width="50">读者名</th>
						<th width="50">管理员</th>
						<th width="100">借出时间</th>
						<th width="100">到期时间</th>
						<th width="100">还书时间</th>
						<th width="50">状 态</th>
						<?php if (is_admin($_smarty_tpl->tpl_vars['cuser']->value)) {?>
						<th>操 作</th>
						<?php }?>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
</td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['row']->value->book->name;?>
</td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['row']->value->reader->name;?>
</td>
						<td class="text-l"><?php if ($_smarty_tpl->tpl_vars['row']->value->uid > 0) {
echo $_smarty_tpl->tpl_vars['row']->value->admin->name;
}?></td>
						<td class="text-l"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->start_time,"%Y-%m-%d");?>
</td>
						<td class="text-l"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->end_time,"%Y-%m-%d");?>
</td>
						<td class="text-l"><?php if ($_smarty_tpl->tpl_vars['row']->value->return_time > 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->return_time,"%Y-%m-%d");
} else { ?>--<?php }?></td>
						<td class="td-status">
							<span class="label
								<?php if (2 == $_smarty_tpl->tpl_vars['row']->value->status) {?>
									label-defaunt
								<?php } elseif (1 == $_smarty_tpl->tpl_vars['row']->value->status) {?>
									label-warning
								<?php } else { ?>
									label-success
								<?php }?> radius">
								<?php echo $_smarty_tpl->tpl_vars['row']->value->status_str;?>

							</span>
						</td>
						<?php if (is_admin($_smarty_tpl->tpl_vars['cuser']->value)) {?>
						<td class="td-manage">
							<?php if (1 != $_smarty_tpl->tpl_vars['row']->value->status) {?>
							<a style="text-decoration:none" class="ml-5" onClick="returnBook(this, <?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
)" href="javascript:;" title="还书">还书</a>
							<!--<a style="text-decoration:none" class="ml-5" onClick="edit('用户编辑', '/user/edit', <?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>-->
							<?php }?>
						</td>
						<?php }?>
					</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:block/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/datatables/1.10.15/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

$(document).ready(function(){
});

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0,2]}// 制定列不参与排序
	]
});

function add(title, url){
	/*产品-添加*/
	/*var index = layer.open({
		type: 2,
		title: title,
		content: url
	});*/
	layer_show(title, url);
	//layer.full(index);
}

/*产品-查看*/
function product_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-编辑*/
function edit(title, url, id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url + "?id=" + id
	});
	layer.full(index);
}

function returnBook(obj, id){
	layer.confirm('确认要还书吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/lend/return/back',
			dataType: 'json',
			data: {'ajax': 1, id: id, status: 1},
			success: function(result){
				$(obj).parents("tr").remove();
				layer.msg(result.msg,{icon:1, time:2000});
				window.location.reload();
			},
			error: function(result) {
				layer.msg("系統异常");
			},
		});
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
