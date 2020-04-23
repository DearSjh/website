@extends('layouts.admin')

@section('content')

    <div class="page-content-wrap">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline tool-btn">
                    <button class="layui-btn layui-btn-small layui-btn-normal go-btn hidden-xs"
                            data-url="/admin/category/add"><i class="layui-icon">&#xe654;</i></button>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn  layui-btn-small layui-btn-danger" type="button" onclick="delAll()">
                        <i class="layui-icon"></i>批量删除
                    </button>
            </div>
        </form>
        <div class="layui-form" id="table-list">

            <table class="layui-table layui-form">
                <thead>
                <tr>
                    <th width="20">
                        <input type="checkbox" id="checkbox-all" name="" lay-skin="primary">
                    </th>
                    <th width="70">ID</th>
                    <th width="120">分类名</th>
                    <th width="120">目录名</th>
                    <th width="120">排序</th>
                    <th width="120">状态</th>
                    <th width="250">操作</th>
                </thead>
                <tbody class="x-cate">

                @foreach($list as $value)
                    <tr cate-id='{{ $value['id'] }}' fid='{{ $value['parent_id'] }}'>
                        <td><input type="checkbox" name="{{ $value['id'] }}" lay-skin="primary"
                                   data-id="{{ $value['id'] }}">
                        </td>
                        <td>{{ $value['id'] }}</td>
                        <td>
                            @if(count($value['child']) > 0)
                                <i class="layui-icon x-show" status='true'>&#xe623;</i>@else &nbsp; @endif
                            {{ $value['name'] }}
                        </td>
                        <td>{{ $value['dir_name'] }}</td>
                        <td><input type="text" class="layui-input x-sort" name="sort" value="{{ $value['sort'] }}"></td>
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
                        <td>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-mini layui-btn-normal  go-btn"
                                        data-id="{{ $value['id'] }}" data-url="/admin/category/edit/{{ $value['id'] }}"><i
                                            class="layui-icon">编辑</i>
                                </button>
                                <button class="layui-btn layui-btn-mini layui-btn-warm  go-btn"
                                        data-id="{{ $value['id'] }}" data-url="/admin/category/addChild/{{ $value['id'] }}"><i
                                            class="layui-icon">添加子分类</i>
                                </button>
                                <a class="layui-btn  layui-btn-mini layui-btn-danger" title="删除"
                                   onclick="delOne('{{ $value['id'] }}',this)" href="javascript:;">
                                    <i class="layui-icon">删除</i></a>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @foreach($value['child'] as $child)
                        <tr cate-id='{{ $child['id'] }}' fid='{{ $child['parent_id'] }}'>
                            <td>
                                <input type="checkbox" name="{{ $child['id'] }}" lay-skin="primary">
                            </td>
                            <td>{{ $child['id'] }}</td>
                            <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                @if(count($child['child']) > 0)<i class="layui-icon x-show" status='true'>&#xe623;</i>@else
                                    ├ @endif
                                {{ $child['name'] }}
                            </td>
                            <td>{{ $child['dir_name'] }}</td>
                            <td><input type="text" class="layui-input x-sort" name="order" value="1" style="display:none"></td>
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
                            <td class="td-manage">
                                <div class="layui-inline">
                                    <button class="layui-btn layui-btn-mini layui-btn-normal  go-btn"
                                            data-id="{{ $child['id'] }}" data-url="/admin/category/edit/{{ $child['id'] }}"><i
                                                class="layui-icon">编辑</i>
                                    </button>
                                    <a class="layui-btn  layui-btn-mini layui-btn-danger" title="删除"
                                       onclick="delOne('{{ $child['id'] }}',this)" href="javascript:;">
                                        <i class="layui-icon">删除</i></a>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
                    url: '/admin/category/status/' + id,
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
                    url: '/admin/category/del',
                    data: {
                        ids: ids,
                    },
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg('删除失败!', {icon: 1, time: 1000});
                        } else {
                            layer.msg('已删除!', {icon: 1, time: 1000});
                            window.location.href='/admin/category/list'
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
                    url: '/admin/category/del',
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

        // 分类展开收起的分类的逻辑
        //
        $(function () {
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if ($(this).attr('status') == 'true') {
                    $(this).html('&#xe625;');
                    $(this).attr('status', 'false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid=" + cateId + "]").show();
                } else {
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status', 'true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id=" + cateIds[i] + "]").hide().find('.x-show').html('&#xe623;').attr('status', 'true');
                    }
                }
            });


            $('thead .layui-form-checkbox').on('click', function () {
                if ($(this).hasClass('layui-form-checked')) {
                    $('tbody .layui-form-checkbox').addClass('layui-form-checked');
                } else {
                    $('tbody .layui-form-checkbox').removeClass('layui-form-checked');
                }
            });


        });

        var cateIds = [];

        function getCateId(cateId) {
            $("tbody tr[fid=" + cateId + "]").each(function (index, el) {
                id = $(el).attr('cate-id');
                cateIds.push(id);
                getCateId(id);
            });
        }
    </script>

@endsection
