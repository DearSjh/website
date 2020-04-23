@extends('layouts.admin')

@section('content')

    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal go-btn hidden-xs"
                            data-url="/admin/customData/add"><i class="layui-icon">&#xe654;</i></button>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn  layui-btn-small layui-btn-danger" type="button" onclick="delAll()">
                        <i class="layui-icon"></i>批量删除
                    </button>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col width="50">
                    <col class="hidden-xs" width="50">
                    <col class="hidden-xs" width="100">
                    <col>
                    <col class="hidden-xs" width="200">
                    <col width="80">
                    <col width="150">
                </colgroup>
                <thead>
                <tr>
                    <th style="width: 250px;"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">
                    </th>
                    <th style="width: 300px;">ID</th>
                    <th style="width: 350px;">标题</th>
                    <th style="width: 350px;">图片</th>
                    <th style="width: 350px;">状态</th>
                    <th style="width: 350px;">更新时间</th>
                    <th style="width: 350px;">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($custom as $value)
                    <tr>
                        <td><input type="checkbox" name="{{ $value['id'] }}" lay-skin="primary"
                                   data-id="{{ $value['id'] }}"></td>
                        <td class="hidden-xs">{{ $value['id'] }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>
                            @if(!empty( $value['main_pic']))
                                <img src="{{ $value['main_pic'] }}" width="300px;" height="150px;">
                            @endif
                        </td>
                        <td>
                            @if($value['state'] == 1)
                                <button class="layui-btn layui-btn-mini layui-btn-normal table-list-status"
                                        data-id='{{ $value['id'] }}' data-status='{{ $value['state'] }}'>开启
                                </button>
                            @else
                                <button class="layui-btn layui-btn-mini layui-btn-warm table-list-status"
                                        data-status='{{ $value['state'] }}' data-id='{{ $value['id'] }}'>停用
                                </button>
                            @endif
                        </td>
                        <td>{{ $value['created_at'] }}</td>
                        <td>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-mini layui-btn-normal  go-btn"
                                        data-id="{{ $value['id'] }}"
                                        data-url="/admin/customData/edit/{{ $value['id'] }}"><i
                                            class="layui-icon">&#xe642;</i>
                                </button>
                                <a class="layui-btn  layui-btn-mini layui-btn-danger" title="删除"
                                   onclick="delOne('{{ $value['id'] }}',this)" href="javascript:;">
                                    <i class="layui-icon">&#xe640;</i></a>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script>

        layui.use(['form', 'jquery', 'layer', 'dialog'], function () {
            var $ = layui.jquery;

            //修改状态
            $('#table-list').on('click', '.table-list-status', function () {
                var That = $(this);
                var id = That.attr('data-id');
                $.ajax({
                    type: "POST",
                    url: '/admin/customData/status/' + id,
                    success: function (result) {
                        if (result.data.state === 1) {
                            That.removeClass('layui-btn-warm').addClass('layui-btn-normal').html('开启').attr('data-status', 1);
                        } else {
                            That.removeClass('layui-btn-normal').addClass('layui-btn-warm').html('停用').attr('data-status', 0);
                        }
                    }
                });
            })

        });
        function delAll() {
            var ids = [];
            $('tbody .layui-form-checkbox').each(function (i, elm) {
                if ($(this).hasClass('layui-form-checked')) {
                    var id = $(this).prev().attr('name');
                    ids.push(id);
                }
            });
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: "POST",
                    url: '/admin/customData/del',
                    data: {
                        ids: ids,
                    },
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg('删除失败!', {icon: 1, time: 1000});
                        } else {
                            layer.msg('已删除!', {icon: 1, time: 1000});
                            window.location.href='/admin/customData/list'
                        }
                    },
                });

            });

        }

        /*删除一个*/
        function delOne(id, obj) {
            var ids = [id];
            del(ids, obj);
        }

        function del(ids, obj) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: "POST",
                    url: '/admin/customData/del',
                    data: {
                        ids: ids,
                    },
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg('删除失败!', {icon: 1, time: 1000});
                        } else {
                            if (obj) {
                                $(obj).parents("tr").remove();
                            } else {
                                xadmin.father_reload();
                            }
                            layer.msg('已删除!', {icon: 1, time: 1000});
                        }
                    },
                });

            });
        }
    </script>
@endsection
