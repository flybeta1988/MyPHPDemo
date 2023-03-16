<?php
/* Smarty version 4.0.0, created on 2022-04-06 15:37:09
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/book/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_624d43254dde57_61393463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e50cea561e584bb63163e957f3fe97480fe4a048' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/book/edit.tpl',
      1 => 1643003108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../block/meta.tpl' => 1,
    'file:../block/footer.tpl' => 1,
  ),
),false)) {
function content_624d43254dde57_61393463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../block/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<?php if ($_smarty_tpl->tpl_vars['save_result']->value) {?>
		<div class="row cl">
			<span class="c-red">修改成功！</span>
		</div>
		<?php }?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图书名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" placeholder="" id="id" name="id">
				<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->name;?>
" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图书ISBN：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->isbn;?>
" placeholder="" id="isbn" name="isbn">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价 格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->price;?>
" placeholder="" id="price" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分  类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="cid" class="select" id="category">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['book']->value->cid == $_smarty_tpl->tpl_vars['category']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>已  架：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="sid" class="select" id="shelf">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shelfs']->value, 'shelf');
$_smarty_tpl->tpl_vars['shelf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['shelf']->value) {
$_smarty_tpl->tpl_vars['shelf']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['shelf']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['book']->value->cid == $_smarty_tpl->tpl_vars['shelf']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['shelf']->value->name;?>
</option>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图片：</label>
			<div class="formControls col-xs-8 col-sm-|9">
				<div>
					<img width="150" height="100" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'imageUrl' ][ 0 ], array( $_smarty_tpl->tpl_vars['book']->value->thumb ));?>
" />
				</div>
				<div class="uploader-thum-container">
					<input type="file" name="thumb"/>
					<input type="hidden" class="input-text" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->thumb;?>
" placeholder="" id="thumb" name="thumb">
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="checkOnSubmit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存 </button>
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

function initCategory() {
	var cateHtml = '<option value="0">请选择</option>';
	$.ajax({
		type: "POST",
		url: "/category/list",
		data: [],
		success: function (result) {
			rows = result.data
			for(i in rows) {
				row = rows[i]
				cateHtml += '<option value="'+ row.id +'">' + row.name + '</option>';
			}
			$("#category").html(cateHtml);
		},
		dataType: "JSON"
	});
}

function checkOnSubmit() {}

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
