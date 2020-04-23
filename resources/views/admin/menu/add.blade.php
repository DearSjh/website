@extends('layouts.admin')

@section('content')

    <form class="layui-form">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li><a href="/admin/menu/list">菜单列表</a></li>
                <li class="layui-this">添加菜单</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        菜单名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="dir_name" class="layui-form-label">
                        ICON编码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="icon_code" name="icon_code" required=""
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="dir_name" class="layui-form-label">
                        跳转连接
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link" name="link" required=""
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="icon_code" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="sort" name="sort" required="" lay-verify="required"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
        </div>
    </form>

    <script>
        layui.use(['form', 'jquery', 'laydate', 'layer', 'laypage', 'dialog', 'element', 'upload', 'layedit'], function () {
            var form = layui.form(),
                layer = layui.layer,
                $ = layui.jquery,
                laypage = layui.laypage,
                laydate = layui.laydate,
                layedit = layui.layedit,
                element = layui.element(),
                dialog = layui.dialog;

            //获取当前iframe的name值
            var iframeObj = $(window.frameElement).attr('name');
            form.render();
            //监听信息提交
            form.on('submit(formDemo)', function (data) {
                console.log(data.field)
                $.ajax({
                    type: "POST",
                    url: "/admin/menu/add",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                window.location.href = '/admin/menu/list'
                            }, 2000);
                        }
                    },
                });
                return false;
            });
            layui.upload({
                url: '/admin/upload',
                success: function (res) {
                    if (res.code === 200) {
                        $('#i_picture').val(res.data.file);
                        $('#picture').attr('src', res.data.file).show();
                    }
                }
            });
        });
    </script>


@endsection