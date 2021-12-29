{{include file="../block/meta.tpl"}}

</head>
<body>
<div class="page-container">
	<form action="" method="POST" class="form form-horizontal" id="add_form">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>读 者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="js-example-basic-single" id="reader_id" name="reader_id"></select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图 书：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="js-example-basic-multiple" name="book_ids[]" multiple="multiple" id="book_id"></select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>借出时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" onfocus="WdatePicker({minDate:'%y-%M-%d', maxDate:'#F{$dp.$D(\'logmax\')}'})" id="logmin" name="start_time" class="input-text Wdate" style="width:120px;">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>还书时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}'})" id="logmax" name="end_time" class="input-text Wdate" style="width:120px;">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="add()" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 确定 </button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

{{include file="../block/footer.tpl"}}

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/js/jquery.validation/1.14.0/messages_zh.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

$(function () {
	initUserList();
	initBookList();
});

function add() {
	var data = $("#add_form").serialize();
	data += "&ajax=1";
	$.ajax({
		type: "POST",
		url: "/lend/add",
		data: data,
		dataType: "JSON",
		success: function (result) {
			if (result.code > 0) {
				layer.alert('"' + result.msg + '"', {icon:2, time:2000});
				return false;
			} else {
				layer.msg('出借成功', {icon:1, time:2000});
				window.parent.location.reload();
			}
		},
		error: function (result) {
			layer.alert("接口返回数据格式错误", {icon:2, time:2000});
		}
	});
}

function initUserList() {
	var _html = '<option value="0">请选择</option>';
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "/user/list",
		data: {"ajax": 1},
		success: function (result) {
			rows = result.data
			for(i in rows) {
				row = rows[i]
				_html += '<option value="'+ row.id +'">' + row.name + '</option>';
			}
			$("#reader_id").html(_html).select2();
		}
	});
}

function initBookList() {
	var _html = '<option value="0">请选择</option>';
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "/book/list",
		data: {"ajax": 1},
		success: function (result) {
			rows = result.data
			for(i in rows) {
				row = rows[i]
				_html += '<option value="'+ row.id +'">' + row.name + '</option>';
			}
			$("#book_id").html(_html).select2();
		}
	});
}

</script>
</body>
</html>