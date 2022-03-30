<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-product">
			{{if $cuser|is_admin}}
			<dt><i class="Hui-iconfont">&#xe616;</i> 图书管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/book/shelf/index" data-title="书架管理" href="javascript:void(0)">书架管理</a></li>
					<li><a data-href="/category/index" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
					<li><a data-href="/book/index" data-title="图书列表" href="javascript:void(0)">图书列表</a></li>
				</ul>
			</dd>
			{{else}}
			<dt><i class="Hui-iconfont">&#xe616;</i> 图书检索<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/book/index" data-title="我要找书" href="javascript:void(0)">我要找书</a></li>
				</ul>
			</dd>
			{{/if}}
		</dl>
		{{if $cuser|is_admin}}
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 读者管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/user/index" data-title="读者列表" href="javascript:;">读者列表</a></li>
				</ul>
			</dd>
		</dl>
		{{/if}}
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 预约管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/subscribe/index" data-title="预约记录" href="javascript:void(0)">预约记录</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 借阅管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/lend/index" data-title="借阅记录" href="javascript:void(0)">借阅记录</a></li>
				</ul>
			</dd>
		</dl>
		<!--<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					{{*<li><a data-href="admin-role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
					<li><a data-href="admin-permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>*}}
					<li><a data-href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					<li><a data-href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>
					<li><a data-href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>
					<li><a data-href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
					<li><a data-href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
				</ul>
			</dd>
		</dl>-->
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>