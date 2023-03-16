{{include file="../block/meta.tpl"}}

</head>
<body>
<div class="page-container">
	<form action="" method="POST" class="form form-horizontal" id="user_add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓  名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" class="input-text" value="{{$user->id}}" placeholder="" id="id" name="id">
				<input type="text" class="input-text" value="{{$user->name}}" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>密 码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="password" name="password">
				<input type="hidden" class="input-text" value="{{$user->password}}" placeholder="" id="password_md5" name="password_md5">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="password2" name="password2">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>手机号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$user->mobile}}" placeholder="" id="mobile" name="mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身份证号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$user->idcard}}" placeholder="" id="idcard" name="idcard">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>押 金：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$user->money}}" placeholder="" id="money" name="money">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地  址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$user->address}}" placeholder="" id="address" name="address">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身  份：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="radio" class="input-radio" value="0" placeholder="" name="role_id" {{if $user->role_id == 0}}checked="checked"{{/if}}><label>普通</label><br/>
				<input type="radio" class="input-radio" value="1" placeholder="" name="role_id" {{if $user->role_id == 1}}checked="checked"{{/if}}><label>管理员</label>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="save()" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存 </button>
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
<script type="text/javascript">

	$(function () {
		/*initShelf();
        initCategory();*/
	});

	function save() {
		var data = $("#user_add").serialize();
		data += "&ajax=1";
		$.ajax({
			type: "POST",
			url: "/user/edit",
			data: data,
			dataType: "JSON",
			success: function (result) {
				if (result.code > 0) {
					layer.alert('"' + result.msg + '"', {icon:2, time:2000});
					return false;
				} else {
					//layer.msg('修改成功', {icon:1, time:2000});
					layer_close();
					//console.log(result.toString());
				}
			},
			error: function (result) {
				layer.alert("接口返回数据格式错误", {icon:2, time:2000});
			}
		});
	}

</script>
</body>
</html>