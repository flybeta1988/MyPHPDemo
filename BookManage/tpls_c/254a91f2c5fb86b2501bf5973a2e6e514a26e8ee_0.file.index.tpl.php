<?php
/* Smarty version 4.0.0, created on 2022-03-30 16:34:57
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/book/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62441631655b63_89053013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '254a91f2c5fb86b2501bf5973a2e6e514a26e8ee' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/book/index.tpl',
      1 => 1648629293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../block/meta.tpl' => 1,
    'file:block/footer.tpl' => 1,
  ),
),false)) {
function content_62441631655b63_89053013 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<title>建材列表</title>
</head>
<body class="pos-r">
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c">
			<form method="post" action="">
				<input type="text" name="keyword" id="" placeholder="图书名称" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>找书</button>
			</form>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<?php if (is_admin($_smarty_tpl->tpl_vars['cuser']->value)) {?>
			<span class="l"><a class="btn btn-primary radius" onclick="product_add('添加图书', '/book/add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图书</a></span>
			<?php }?>
			<span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 条</span> </div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="20">ID</th>
						<th width="50">缩略图</th>
						<th width="200">产品名称</th>
						<th width="200">ISBN</th>
						<th width="30">价格(元)</th>
						<th width="60">分类</th>
						<th width="60">书架</th>
						<th width="30">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
</td>
						<td><a onClick="product_show('哥本哈根橡木地板','product-show.html','10001')" href="javascript:;"><img width="60" class="product-thumb" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'imageUrl' ][ 0 ], array( $_smarty_tpl->tpl_vars['book']->value->thumb ));?>
" onerror="this.src='/images/book_default.jpg'"></a></td>
						<td class="text-l"><a style="text-decoration:none" onClick="product_show('哥本哈根橡木地板','product-show.html','10001')" href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['book']->value->name;?>
</a></td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['book']->value->isbn;?>
</td>
						<td class="text-l"><?php echo $_smarty_tpl->tpl_vars['book']->value->price;?>
</td>
						<td class="text-l">
							<?php if ($_smarty_tpl->tpl_vars['book']->value->cid) {?>
								<?php echo $_smarty_tpl->tpl_vars['book']->value->category->name;?>

							<?php }?>
						</td>
						<td class="text-l">
							<?php if ($_smarty_tpl->tpl_vars['book']->value->sid) {?>
								<?php echo $_smarty_tpl->tpl_vars['book']->value->shelf->name;?>

							<?php }?>
						</td>
						<td class="td-status">
							<span class="label
								<?php if (2 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
									label-defaunt
								<?php } elseif (1 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
									label-warning
								<?php } else { ?>
									label-success
								<?php }?> radius">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'bookStatusMsg' ][ 0 ], array( $_smarty_tpl->tpl_vars['book']->value->status ));?>

							</span>
						</td>

						<td class="td-manage">
							<?php if (is_admin($_smarty_tpl->tpl_vars['cuser']->value)) {?>
								<?php if (0 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
								<a style="text-decoration:none" onClick="product_stop(this, <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
								<?php } elseif (2 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
								<a style="text-decoration:none" onClick="product_start(this, <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>
								<?php }?>
								<a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑', '/book/edit', <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
								<?php if (2 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
								<a style="text-decoration:none" class="ml-5" onClick="product_del(this, <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
								<?php }?>
							<?php } else { ?>
								<?php if (1 == $_smarty_tpl->tpl_vars['book']->value->status) {?>
									<?php if ($_smarty_tpl->tpl_vars['book']->value->subscribe) {?>
									<a style="text-decoration:none" onClick="unsubscribe(this, <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="取消预约">取消预约</a>
									<?php } else { ?>
									<a style="text-decoration:none" onClick="subscribe(this, <?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
)" href="javascript:;" title="预约">预约</a>
									<?php }?>
								<?php }?>
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
	  {"orderable":false, "aTargets":[0, 2, 4, 5, 6, 7, 8]}// 制定列不参与排序
	]
});

/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-查看*/
function product_show(title,url,id){
	return false;
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-下架*/
function product_stop(obj, id) {
	layer.confirm('确认要下架吗？',function(index) {
		$.ajax({
			type: "POST",
			url: "/book/status/modify",
			data: {"ajax": 1, "id": id, "status": 2},
			success: function (result) {
				if (result.code > 0) {
					layer.msg('下架失败: '+ result.msg, {icon: 5, time: 2000});
				} else {
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
					$(obj).remove();
					layer.msg('下架成功!',{icon: 5,time:1000});
				}
			},
			dataType: "JSON"
		});
	});
}

/*产品-发布*/
function product_start(obj, id){
	layer.confirm('确认要发布吗？',function(index){
		$.ajax({
			type: "POST",
			url: "/book/status/modify",
			data: {"ajax": 1, "id": id, "status": 0},
			success: function (result) {
				if (result.code > 0) {
					layer.msg('发布失败: '+ result.msg, {icon: 5, time: 2000});
				} else {
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this, id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
					$(obj).remove();
					layer.msg('已发布!',{icon: 6,time:1000});
				}
			},
			dataType: "JSON"
		});
	});
}

/*产品-申请上线*/
function product_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*产品-编辑*/
function product_edit(title, url, id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url + "?id=" + id
	});
	layer.full(index);
}

/*产品-删除*/
function product_del(obj, id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/book/delete',
			dataType: 'json',
			data: {'ajax': 1, id: id},
			success: function(result){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error: function(result) {
				console.log(result.msg);
			},
		});		
	});
}

//图书预约
function subscribe(obj, id) {
	layer.confirm('确认要预约吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/subscribe/add',
			dataType: 'json',
			data: {"ajax": 1, id: id},
			success: function(result){
				//$(obj).parents("tr").remove();
				layer.msg(result.msg, {icon:1, time:2000});
				location.replace(location.href);
			},
			error: function(result) {
				console.log(result.msg);
			},
		});
	});
}

//取消图书预约
function unsubscribe(obj, id) {
	layer.confirm('确认要取消预约吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/subscribe/delete',
			dataType: 'json',
			data: {"ajax": 1, book_id: id},
			success: function(result){
				//$(obj).parents("tr").remove();
				layer.msg(result.msg, {icon:1, time:2000});
				location.replace(location.href);
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
