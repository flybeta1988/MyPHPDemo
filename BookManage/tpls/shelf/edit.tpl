<div class="page-container">
<div class="text-c">
    <form class="Huiform" method="post" action="" target="_self" id="editForm">
        <input type="hidden" placeholder="书架名称" value="{{$shelf->id}}" class="input-text" id="id" name="id" style="width:220px">
        <input type="text" placeholder="书架名称" value="{{$shelf->name}}" class="input-text" id="name" name="name" style="width:220px">
        <select name="cid" id="category">
            {{foreach $categorys as $category}}
                <option value="{{$category->id}}">{{$category->name}}</option>
            {{/foreach}}
        </select>
        </span><button type="button" class="btn btn-success" id="" name="" onClick="edit(this);"><i class="Hui-iconfont">&#xe600;</i>保存</button>
    </form>
</div>
</div>

{{include file="block/footer.tpl"}}

<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/js/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />

<script type="text/javascript" src="/js/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/js/datatables/1.10.15/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/laypage/1.2/laypage.js"></script>

<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0, 2]}// 制定列不参与排序
        ]
    });

    function edit() {
        var data = $("#editForm").serialize();
        data += "&ajax=1";
        $.ajax({
            type: "POST",
            url: "/book/shelf/edit",
            dataType: "JSON",
            data: data,
            success: function (result) {
                if (result.code > 0) {
                    layer.alert('"' + result.msg + '"', {icon:2, time:2000});
                    return false;
                } else {
                    layer.msg('修改成功', {icon:1, time:2000});
                    layer.close();
                }
            },
            error: function (result) {
                layer.alert("接口返回数据格式错误", {icon:2, time:2000});
            }
        });
    }
</script>