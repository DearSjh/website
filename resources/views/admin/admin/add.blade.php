@extends('layouts.admin')

@section('content')
    <form class="layui-form column-content-detail">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li><a href="/admin/admin/list">管理员列表</a></li>
                <li class="layui-this">添加管理员</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-form-item">
                    <label for="user_name" class="layui-form-label">
                        登录名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="user_name" name="user_name" required="" lay-verify="user_name"
                               autocomplete="off"
                               class="layui-input input_width">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="email" class="layui-form-label">
                        邮箱</label>
                    <div class="layui-input-inline">
                        <input type="text" id="email" name="email" required="" lay-verify="email"
                               autocomplete="off" class="layui-input input_width">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">角色</label>
                    <div class="layui-input-block">

                        @foreach($roles as $val)
                            <input type="checkbox" name="roles[]" value="{{ $val['id'] }}" lay-skin="primary"
                                   title="{{ $val['role_name'] }}">
                        @endforeach

                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="password" class="layui-form-label">
                        密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="password" name="password" required="" lay-verify="password"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="repassword" class="layui-form-label">
                        确认密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="repassword" name="repassword" required="" lay-verify="repassword"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>


                <div class="layui-form-item">
                    <label for="state" class="layui-form-label">
                        状态</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="radio" name="state" value="1" title="启用" checked>
                            <input type="radio" name="state" value="0" title="关闭">
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
                $ = layui.jquery;

            //获取当前iframe的name值
            var iframeObj = $(window.frameElement).attr('name');
            //自定义验证规则
            form.verify({
                user_name: function (value) {
                    if (value.length < 2) {
                        return '登录名至少两个字';
                    }
                },
                email: function (value) {
                    if (!value || value.length < 1) {
                        return '请填写邮箱';
                    }
                },

                password: [/(.+){6,12}$/, '密码必须6到12位'],
                repassword: function (value) {
                    if ($('#password').val() != $('#repassword').val()) {
                        return '两次密码不一致';
                    }
                }

            });
            form.render();
            //监听信息提交
            form.on('submit(formDemo)', function (data) {
                $.ajax({
                    type: "POST",
                    url: "/admin/admin/add",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                window.location.href = '/admin/admin/list'
                            }, 2000);
                        }
                    },
                });
                return false;
            });
        });
    </script>
@endsection
