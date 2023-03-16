<?php
/* Smarty version 4.0.0, created on 2022-03-18 13:50:54
  from '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/category/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_62341dbe4e77d2_04571352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8df2766b227bbe4caeef18cd5f7e27057663a89' => 
    array (
      0 => '/home/flybeta/dev/code/php/MyPHPDemo/BookManage/tpls/category/index.tpl',
      1 => 1643003108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:block/footer.tpl' => 1,
  ),
),false)) {
function content_62341dbe4e77d2_04571352 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图书管理 <span class="c-gray en">&gt;</span> 书架管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form class="Huiform" method="post" action="" target="_self">
            <input type="text" placeholder="分类名称" value="" class="input-text" id="name" style="width:120px">
			</span><button type="button" class="btn btn-success" id="" name="" onClick="add();"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="40"><input name="" type="checkbox" value=""></th>
                <th width="70">ID</th>
                <th width="120">名称</th>
                <th width="100">图书数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorys']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
            <tr class="text-c">
                <td><input name="" type="checkbox" value=""></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value->book_num;?>
</td>
                <td class="f-14 product-brand-manage">
                    <a style="text-decoration:none" onClick="edit(<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <?php if (!$_smarty_tpl->tpl_vars['row']->value->book_num > 0) {?>
                    <a style="text-decoration:none" class="ml-5" onClick="remove(<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
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

<?php $_smarty_tpl->_subTemplateRender("file:block/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/js/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />

<?php echo '<script'; ?>
 type="text/javascript" src="/js/datatables/1.10.15/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/laypage/1.2/laypage.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0, 2]}// 制定列不参与排序
        ]
    });

    function add() {
        $.ajax({
            type: "POST",
            url: "/category/add",
            dataType: "JSON",
            data: {"ajax": 1, "name": $("#name").val()},
            success: function (result) {
                if (result.code > 0) {
                    layer.alert('"' + result.msg + '"', {icon:2, time:2000});
                    return false;
                } else {
                    layer.msg('添加成功', {icon:1, time:2000});
                    location.replace(location.href);
                }
            }
        });
    }

    function remove(id) {
        layer.confirm('确认要删除此分类吗？', function(index){
            $.ajax({
                type: "POST",
                url: "/category/delete",
                dataType: "JSON",
                data: {"ajax": 1, "id": id},
                success: function (result) {
                    if (result.code > 0) {
                        layer.alert('"' + result.msg + '"', {icon:2, time:2000});
                        return false;
                    } else {
                        layer.msg('删除成功', {icon:1, time:2000});
                        location.replace(location.href);
                    }
                }
            });
        });
    }

    function edit(id) {
        var index = layer.open({
            type: 2,
            title: "编辑",
            content: "/category/edit?id=" + id
        });
        layer.full(index);
    }
<?php echo '</script'; ?>
><?php }
}
