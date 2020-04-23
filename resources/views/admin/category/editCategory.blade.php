@extends('layouts.admin')

@section('content')
        <form class="layui-form">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li><a href="/admin/category/list">分类列表</a></li>
                    <li class="layui-this">修改分类</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label for="name" class="layui-form-label">
                                分类名称
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="name" name="name" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" value="{{ $category['name'] }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="dir_name" class="layui-form-label">
                                目录名称
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="dir_name" name="dir_name" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" value="{{ $category['dir_name'] }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="is_nav" class="layui-form-label">
                                类型
                            </label>
                            <div class="layui-input-inline">
                                <input type="radio" name="type" value="1" title="列表"  @if($category['type'] == 1) checked @endif>
                                <input type="radio" name="type" value="2" title="单页"  @if($category['type'] == 2) checked @endif>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">图片上传：</label>
                            <div class="layui-input-block">
                                <input type="file" name="file" class="layui-upload-file">
                                <input type="hidden" id="i_picture" name="picture" value="{{ $category['picture'] }}">
                                <img id="picture" src="{{ $category['picture']}}"
                                     style="margin-top: 20px; width: 300px; ">

                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="abstract" class="layui-form-label">
                                关键字</label>
                            <div class="layui-input-inline">
                                <textarea rows="3" cols="40" id="keyword" name="keyword">{{ $category['keyword'] }}"</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="abstract" class="layui-form-label">
                                描述</label>
                            <div class="layui-input-inline">
                                <textarea rows="5" cols="40" id="description" name="description">{{ $category['description'] }}</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="icon_code" class="layui-form-label">
                                排序
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="sort" name="sort" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input" value="{{ $category['sort'] }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="is_release" class="layui-form-label">
                                是否开启</label>
                            <div class="layui-input-inline">
                                <div class="layui-input-inline">
                                    <input type="radio" name="state" value="0" title="否" @if($category['state'] == 0) checked @endif>
                                    <input type="radio" name="state" value="1" title="是" @if($category['state'] == 1) checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label for="is_nav" class="layui-form-label">
                                作为导航
                            </label>
                            <div class="layui-input-inline">
                                <input type="radio" name="is_nav" value="1" title="是"  @if($category['is_nav'] == 1) checked @endif>
                                <input type="radio" name="is_nav" value="0" title="否"  @if($category['is_nav'] == 0) checked @endif>
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
                                window.location.href = '/admin/category/list'
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