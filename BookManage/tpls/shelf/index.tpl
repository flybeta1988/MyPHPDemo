<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图书管理 <span class="c-gray en">&gt;</span> 书架管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <form class="Huiform" method="post" action="" target="_self">
            <input type="text" placeholder="书架名称" value="" class="input-text" id="name" style="width:120px">
            <select name="cid" id="category">
                {{foreach $categorys as $category}}
                    <option value="{{$category->id}}">{{$category->name}}</option>
                {{/foreach}}
            </select>
			</span><button type="button" class="btn btn-success" id="" name="" onClick="add(this);"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
        </form>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="r">共有数据：<strong>{{$total}}</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="40"><input name="" type="checkbox" value=""></th>
                <th width="100">ID</th>
                <th width="120">名称</th>
                <th width="200">分类</th>
                <th width="100">图书数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            {{foreach $shelfs as $shelf}}
            <tr class="text-c">
                <td><input name="" type="checkbox" value=""></td>
                <td>{{$shelf->id}}</td>
                <td>{{$shelf->name}}</td>
                <td>{{if $shelf->cid > 0}}{{$shelf->category->name}}{{/if}}</td>
                <td>{{$shelf->book_num}}</td>
                <td class="f-14 product-brand-manage">
                    <a style="text-decoration:none" onClick="edit({{$shelf->id}})" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                    {{if !$shelf->book_num > 0}}
                    <a style="text-decoration:none" class="ml-5" onClick="remove({{$shelf->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    {{/if}}
                </td>
            </tr>
            {{/foreach}}
            </tbody>
        </table>
    </div>
</div>

{{include file="block/footer.tpl"}}

<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/js/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />

<script type="text/javascript" src="/js/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/laypage/1.2/laypage.js"></script>

<script type="text/javascript">
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
            url: "/book/shelf/add",
            dataType: "JSON",
            data: {"ajax": 1, "name": $("#name").val(), "cid": $("#category").val()},
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
        layer.confirm('确认要删除此书架吗？', function(index){
            $.ajax({
                type: "POST",
                url: "/book/shelf/delete",
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
            content: "/book/shelf/edit?id=" + id
        });
        layer.full(index);
    }
</script>