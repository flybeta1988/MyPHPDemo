{{include file="../block/meta.tpl"}}
<title>建材列表</title>
</head>
<body class="pos-r">
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l"><a class="btn btn-primary radius" onclick="add('添加读者', '/user/add')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加读者</a></span> <span class="r">共有数据：<strong>{{$total}}</strong> 条</span>
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
                        <th width="150">地 址</th>
						<th width="60">角 色</th>
						<th width="60">已借书数</th>
						<th width="30">状 态</th>
						<th width="100">操 作</th>
					</tr>
				</thead>
				<tbody>
					{{foreach $users as $user}}
					<tr class="text-c va-m">
						<td><input name="" type="checkbox" value=""></td>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
                        <td class="text-l">{{$user->mobile}}</td>
                        <td class="text-l">{{$user->idcard}}</td>
                        <td class="text-l">{{$user->address}}</td>
						<td class="text-l">{{$user->role_str}}</td>
						<td class="text-l">{{$user->book_num}}</td>
						<td class="td-status">
							<span class="label
								{{if 2 == $user->status}}
									label-defaunt
								{{elseif 1 == $user->status}}
									label-warning
								{{else}}
									label-success
								{{/if}} radius">
								{{$user->status_str}}
							</span>
						</td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5" onClick="edit('用户编辑', '/user/edit', {{$user->id}})" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="remove(this, {{$user->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					{{/foreach}}
				</tbody>
			</table>
		</div>
	</div>
</div>

{{include file="block/footer.tpl"}}

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/js/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

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
</script>
</body>
</html>