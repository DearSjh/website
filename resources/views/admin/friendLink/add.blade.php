@extends('layouts.admin')

@section('content')
    <form class="layui-form column-content-detail">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li><a href="/admin/friendLink/list">友情链接列表</a></li>
                <li class="layui-this">添加友情链接</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">网址名称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" style="width: 300px;"  lay-verify="required"  placeholder="请输入网址名称"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图片上传：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file">
                            <input type="hidden" id="i_logo" name="logo" value="">
                            <img  id="logo" src="" style="margin-top: 20px; width: 300px; ">

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">url：</label>
                        <div class="layui-input-block">
                            <input type="text" name="url" style="width: 300px;"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="state" class="layui-form-label">
                            是否开放</label>
                        <div class="layui-input-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="is_public" value="0" title="否" >
                                <input type="radio" name="is_public" value="1" title="是" checked>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序：</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" style="width: 100px;"
                                   autocomplete="off" class="layui-input" value="">
                        </div>
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
                    url: "/admin/friendLink/add",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                window.location.href='/admin/friendLink/list'
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
                        $('#i_logo').val(res.data.file);
                        $('#logo').attr('src', res.data.file).show();
                    }
                }
            });
        });
    </script>
@endsection
