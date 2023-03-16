<?php
/* Smarty version 4.0.0, created on 2022-03-18 13:51:27
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/user/add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62341ddfa51080_76540597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a31162d88438634225cedb924b8a02c55b1804e' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/user/add.tpl',
      1 => 1644914379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../block/meta.tpl' => 1,
    'file:../block/footer.tpl' => 1,
  ),
),false)) {
function content_62341ddfa51080_76540597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<div class="page-container">
	<form action="" method="POST" class="form form-horizontal" id="user_add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓  名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>密 码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" id="password" name="password">
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
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身份证号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="idcard" name="idcard">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>押 金：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="money" name="money">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地  址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="address" name="address">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>身  份：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="radio" class="input-radio" value="0" placeholder="" name="role_id" checked="checked"><label>普通</label><br/>
				<input type="radio" class="input-radio" value="1" placeholder="" name="role_id"><label>管理员</label>
				<audio>
				</audio>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onclick="add()" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 添加 </button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:../block/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--请在下方写此页面业务相关的脚本-->
<?php echo '<script'; ?>
 type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery.validation/1.14.0/jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery.validation/1.14.0/validate-methods.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery.validation/1.14.0/messages_zh.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

$(function () {
	/*initShelf();
	initCategory();*/
});

function add() {
	var data = $("#user_add").serialize();
	data += "&ajax=1";
	$.ajax({
		type: "POST",
		url: "/user/add",
		data: data,
		dataType: "JSON",
		success: function (result) {
			if (result.code > 0) {
				layer.alert('"' + result.msg + '"', {icon:2, time:2000});
				return false;
			} else {
				layer.msg('修改成功', {icon:1, time:2000});
				window.parent.location.reload();
			}
		},
		error: function (result) {
			layer.alert("接口返回数据格式错误", {icon:2, time:2000});
		}
	});
}

function checkOnSubmit() {

}

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
