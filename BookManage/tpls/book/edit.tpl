{{include file="../block/meta.tpl"}}

</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		{{if $save_result}}
		<div class="row cl">
			<span class="c-red">修改成功！</span>
		</div>
		{{/if}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图书名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" class="input-text" value="{{$book->id}}" placeholder="" id="id" name="id">
				<input type="text" class="input-text" value="{{$book->name}}" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图书ISBN：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$book->isbn}}" placeholder="" id="isbn" name="isbn">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价 格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$book->price}}" placeholder="" id="price" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分  类：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="cid" class="select" id="category">
						{{foreach $categorys as $category}}
						<option value="{{$category->id}}" {{if $book->cid == $category->id}}selected{{/if}}>{{$category->name}}</option>
						{{/foreach}}
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>已  架：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="sid" class="select" id="shelf">
						{{foreach $shelfs as $shelf}}
							<option value="{{$shelf->id}}" {{if $book->cid == $shelf->id}}selected{{/if}}>{{$shelf->name}}</option>
						{{/foreach}}
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图片：</label>
			<div class="formControls col-xs-8 col-sm-|9">
				<div>
					<img width="150" height="100" src="{{$book->thumb|imageUrl}}" />
				</div>
				<div class="uploader-thum-container">
					<input type="file" name="thumb"/>
					<input type="hidden" class="input-text" value="{{$book->thumb}}" placeholder="" id="thumb" name="thumb">
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

</script>
</body>
</html>