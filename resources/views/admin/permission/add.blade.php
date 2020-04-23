@extends('layouts.admin')

@section('content')
    <form class="layui-form column-content-detail">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li><a href="/admin/permission/list">权限列表</a></li>
                <li class="layui-this">添加权限</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label for="menu_id" class="layui-form-label">
                            菜单</label>
                        <div class="layui-input-inline">
                            <select name="menu_id" id="menu_id" lay-verify="menu_id">
                                <option value="">请选择</option>
                                @foreach($menu as $value)
                                    <option value="{{ $value['id'] }}" )>{{ $value['name'] }}</option>
                                    @foreach($value['child'] as $child)
                                        <option value="{{ $child['id'] }}">
                                            &nbsp;&nbsp;&nbsp;├ {{ $child['name'] }}</option>
                                        @foreach($child['child'] as $item)
                                            <option value="{{ $item['id'] }}">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├ {{ $item['name'] }}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="name" class="layui-form-label">
                            权限名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="name" name="name" required="" lay-verify="name" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="path" class="layui-form-label">路径</label>
                        <div class="layui-input-inline">
                            <input type="text" id="path" name="path" required="" lay-verify="path"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="is_menu" class="layui-form-label">
                            是否是目录</label>
                        <div class="layui-input-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="is_menu" value="1" title="是" >
                                <input type="radio" name="is_menu" value="0" title="不是" checked>
                            </div>
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
                    url: "/admin/permission/add",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                window.location.href = '/admin/permission/list'
                            }, 2000);
                        }
                    },
                });
                return false;
            });
        });
    </script>
@endsection
