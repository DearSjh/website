@extends('layouts.admin')

@section('content')
    <div class="page-content-wrap clearfix">
        <form class="layui-form column-content-detail">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li><a href="/admin/friendLink/list">友情链接列表</a></li>
                    <li class="layui-this">修改友情链接</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label class="layui-form-label">网址名称：</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" style="width: 300px;" lay-verify="required"
                                       placeholder="请输入网址名称"
                                       autocomplete="off" class="layui-input" value="{{ $friendLink['name'] }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">图片上传：</label>
                            <div class="layui-input-block">
                                <input type="file" name="file" class="layui-upload-file">
                                <input type="hidden" id="i_logo" name="logo" value="{{ $friendLink['logo'] }}">
                                <img id="logo" src="{{ $friendLink['logo'] }}"
                                     style="margin-top: 20px; width: 300px; ">

                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">url：</label>
                            <div class="layui-input-block">
                                <input type="text" name="url" style="width: 300px;"
                                       autocomplete="off" class="layui-input" value="{{ $friendLink['url'] }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="is_public" class="layui-form-label">
                                是否开放</label>
                            <div class="layui-input-inline">
                                <div class="layui-input-inline">
                                    <input type="radio" name="state" value="0" title="否"
                                           @if($friendLink['is_public'] == 0) checked @endif>
                                    <input type="radio" name="state" value="1" title="是"
                                           @if($friendLink['is_public'] == 1) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">排序：</label>
                            <div class="layui-input-block">
                                <input type="text" name="sort" style="width: 100px;"
                                       autocomplete="off" class="layui-input" value="{{ $friendLink['sort'] }}">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $friendLink['id'] }}">
                    </div>
                </div>
            </div>
            <div class="layui-form-item" style="padding-left: 10px;">
                <div class="layui-input-block">
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
                </div>
            </div>
        </form>

    </div>
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
                $.ajax({
                    type: "POST",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                window.location.href = '/admin/friendLink/list'
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