{{include file="block/meta.tpl"}}
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
				<td>{{$stat.book}}</td>
				<td>{{$stat.user}}</td>
				<td>{{$stat.category}}</td>
				<td>{{$stat.shelf}}</td>
				<td>{{$stat.lend}}</td>
				<td>{{$stat.subscribe}}</td>
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
</html>