<?php
/* Smarty version 4.0.0, created on 2022-03-18 13:51:25
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/user/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62341dddae0973_57459368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b7c64191ac330234279dba1a51c00cc93320353' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/user/index.tpl',
      1 => 1643003108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../block/meta.tpl' => 1,
    'file:block/footer.tpl' => 1,
  ),
),false)) {
function content_62341dddae0973_57459368 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<title>建材列表</title>
</head>
<body class="pos-r">
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l"><a class="btn btn-primary radius" onclick="add('添加读者', '/user/add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加读者</a></span> <span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 条</span>
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="20">ID</th>
						<th width="50">姓 名</th>
                        <th width="60">手机号</th>
                        <th width="100">身份证号</th>
                        <th width="40">押 金</th>
                        <th width="150">地 址</th>
						<th width="60">角 色</th>
						<th width="60">已借书数</th>
						<th width="30">状 态</th>
						<th width="100">操 作</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</td>
                        <td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->mobile;?>
</td>
                        <td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->idcard;?>
</td>
                        <td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->money;?>
</td>
                        <td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>
</td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->role_str;?>
</td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['user']->value->book_num;?>
</td>
						<td class="td-status">
							<span class="label
								<?php if (2 == $_smarty_tpl->tpl_vars['user']->value->status) {?>
									label-defaunt
								<?php } elseif (1 == $_smarty_tpl->tpl_vars['user']->value->status) {?>
									label-warning
								<?php } else { ?>
									label-success
								<?php }?> radius">
								<?php echo $_smarty_tpl->tpl_vars['user']->value->status_str;?>

							</span>
						</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5" onClick="edit('用户编辑', '/user/edit', <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->book_num <= 0) {?>
							<a style="text-decoration:none" class="ml-5" onClick="remove(this, <?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
							<?php }?>
						</td>
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

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0, 2]}// 制定列不参与排序
	]
});

/*产品-添加*/
function add(title, url){
	/*var index = layer.open({
		type: 2,
		title: title,
		content: url
	});*/
	//layer.full(index);
	layer_show(title, url);
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

function remove(obj, id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/user/delete',
			dataType: 'json',
			data: {'ajax': 1, id: id},
			success: function(result){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1, time:1000});
			},
			error: function(result) {
				console.log(result.msg);
			},
		});		
	});
}
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
