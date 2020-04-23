<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/xadmin.css">
    <script type="text/javascript" src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .input_width {
            width: 500px;
        }
    </style>

</head>

<body>
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">
            <div class="layui-form-item">
                <div class="layui-table">
                        <ul class="layui-tab-title ">
                            <li><a href="/admin/role/list">角色列表</a></li>
                            <li class="layui-this">修改角色</li>
                        </ul>
                </div>
                <div class="layui-form-item">
                    <label for="role_name" class="layui-form-label">
                        <span class="x-red">*</span>角色名</label>
                    <div class="layui-input-inline">
                        <input type="text" id="role_name" name="role_name" required="" lay-verify="role_name"
                               autocomplete="off"
                               class="layui-input" value="{{ $role['role_name'] }}">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="role_name" class="layui-form-label">
                        <span class="x-red">*</span>权限</label>
                    <table class="layui-table">
                        <tbody>

                        @foreach($menus as $menu)
                            <tr>
                                <td>

                                    <div>
                                        {{ $menu['name'] }}
                                        @if(count($menu->permission) > 0)
                                            <div class="layui-input-block">
                                                @foreach($menu->permission as $item)
                                                    <input name="id[]" @if(in_array($item['id'],$permission)) checked
                                                           @endif lay-skin="primary" type="checkbox"
                                                           title="{{ $item['name'] }}" value="{{ $item['id'] }}">
                                                @endforeach
                                            </div>
                                        @endif

                                        @foreach($menu['child'] as $child2)
                                            @php $px = $loop->depth * 20 @endphp
                                            <div style="margin-left: {{ $px }}px">
                                                {{ $child2['name'] }}
                                                @if(count($child2->permission) > 0)
                                                    <div class="layui-input-block">
                                                        @foreach($child2->permission as $p2)
                                                            <input name="id[]"
                                                                   @if(in_array($p2['id'],$permission)) checked
                                                                   @endif lay-skin="primary" type="checkbox"
                                                                   title="{{ $p2['name'] }}" value="{{ $p2['id'] }}">
                                                        @endforeach
                                                    </div>
                                                @endif

                                                @foreach($child2['child'] as $child3)
                                                    @php $px = $loop->depth * 20 @endphp
                                                    <div style="margin-left: {{ $px }}px">
                                                        <input name="id[]" lay-skin="primary" type="checkbox"
                                                               title="{{ $child3['name'] }}">

                                                        @if(count($child3->permission) > 0)
                                                            <div class="layui-input-block">
                                                                @foreach($child3->permission as $p3)
                                                                    <input name="id[]"
                                                                           @if(in_array($p3['id'],$permission)) checked
                                                                           @endif lay-skin="primary" type="checkbox"
                                                                           title="{{ $p3['name'] }}"
                                                                           value="{{ $p3['id'] }}">
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>

                                                @endforeach

                                            </div>



                                        @endforeach
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button class="layui-btn" lay-filter="add" lay-submit="">确认修改</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>layui.use(['form', 'layer', 'jquery'],
        function () {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;

            //自定义验证规则
            form.verify({
                role_name: function (value) {
                    if (!value) {
                        return '请选填写角色名';
                    }
                },


            });

            //监听提交
            form.on('submit(add)',
                function (data) {
                    //发异步，把数据提交给php
                    AjaxPost('/admin/role/edit/{{ $role['id'] }}', data.field, function (data) {
                        layer.alert(data.msg, {
                                icon: 6
                            },
                            function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                setTimeout(function () {
                                    window.location.href = '/admin/role/list'
                                }, 1000);
                            });
                    });
                    return false;
                });

        });

</script>

</body>

</html>
