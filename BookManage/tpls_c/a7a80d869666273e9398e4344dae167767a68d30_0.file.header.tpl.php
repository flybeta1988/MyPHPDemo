<?php
/* Smarty version 4.0.0, created on 2022-02-28 14:07:44
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/block/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_621c66b0634b42_32664865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7a80d869666273e9398e4344dae167767a68d30' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/block/header.tpl',
      1 => 1644914053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_621c66b0634b42_32664865 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl">
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="/">图书馆信息管理系统</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/">H-ui</a>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
							</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><?php if (1 == $_smarty_tpl->tpl_vars['cuser']->value->role_id) {?>超级管理员<?php } else { ?>普通读者<?php }?></li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo $_smarty_tpl->tpl_vars['cuser']->value->name;?>
<i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="#">个人信息</a></li>
														<li><a href="/logout">退出</a></li>
						</ul>
					</li>
					<!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header><?php }
}
