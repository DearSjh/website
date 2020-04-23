@extends('layouts.admin')

@section('content')
    <form class="layui-form column-content-detail">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li><a href="/admin/article/list">文章列表</a></li>
                <li class="layui-this">修改文章</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label for="category_id" class="layui-form-label">
                            分类</label>
                        <div class="layui-input-inline">
                            <select name="category_id" id="category_id" lay-verify="category_id">
                                <option value="">请选择</option>
                                @foreach($category as $value)
                                    <option value="{{ $value['id'] }}" @if($value['id'] == $article['category_id']) selected @endif @if(count($value['child']) > 0)  @endif>{{ $value['name'] }}</option>
                                    @foreach($value['child'] as $child)
                                        <option value="{{ $child['id'] }}" @if($child['id'] == $article['category_id']) selected @endif @if(count($child['child']) > 0)  @endif>&nbsp;&nbsp;&nbsp;├ {{ $child['name'] }}</option>
                                    @endforeach
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题：</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" style="width: 300px;" lay-verify="required"
                                   placeholder="请输入标题" value="{{ $article['name'] }}"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="abstract" class="layui-form-label">
                            摘要、描述</label>
                        <div class="layui-input-inline">
                            <textarea rows="5" cols="90" id="abstract" name="abstract">{{ $article['abstract'] }}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="keyword" class="layui-form-label">
                            关键字</label>
                        <div class="layui-input-inline">
                            <textarea rows="4" cols="80" id="keyword" name="keyword">{{ $article['keyword'] }}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">主图：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file">
                            <input type="hidden" id="i_main_pic" name="main_pic" value="{{ $article['main_pic'] }}">
                            <img  id="main_pic" src="{{ $article['main_pic'] }}" style="margin-top: 20px; width: 100px;  @if(empty($article['main_pic'])) display: none @endif">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">组图：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file-group_pic">
                            <input type="hidden" id="i_group_pic" name="group_pic" value="">
                            @if(!empty($article['group_pic']))
                                @foreach(explode(',', $article['group_pic']) as $value)
                                    <img src="{{ $value}}" id="group_pic"
                                         style="margin-top: 20px; width: 100px;  @if(empty($value)) display: none @endif">
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="link" class="layui-form-label">
                            链接</label>
                        <div class="layui-input-inline">
                            <input type="text" id="link" name="link" required="" lay-verify="link"
                                   autocomplete="off" class="layui-input" value="{{ $article['link'] }}"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="is_top" class="layui-form-label">
                            是否置顶</label>
                        <div class="layui-input-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="is_top" value="0" title="否" @if($article['is_top'] == 0) checked @endif>
                                <input type="radio" name="is_top" value="1" title="是" @if($article['is_top'] == 1) checked @endif>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="is_recommended" class="layui-form-label">
                            是否推荐</label>
                        <div class="layui-input-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="is_recommended" value="0" title="否"  @if($article['is_recommended'] == 0) checked @endif>
                                <input type="radio" name="is_recommended" value="1" title="是"  @if($article['is_recommended'] == 1) checked @endif>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="state" class="layui-form-label">
                            是否发布</label>
                        <div class="layui-input-inline">
                            <div class="layui-input-inline">
                                <input type="radio" name="state" value="0" title="否" @if($article['is_release'] == 0) checked @endif>
                                <input type="radio" name="state" value="1" title="是" @if($article['is_release'] == 1) checked @endif>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="sort" class="layui-form-label">
                            点击数</label>
                        <div class="layui-input-inline">
                            <input type="text" id="visits" name="visits" required="" lay-verify="visits"
                                   autocomplete="off" class="layui-input" value="{{ $article['visits'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="sort" class="layui-form-label">
                            排序</label>
                        <div class="layui-input-inline">
                            <input type="text" id="sort" name="sort" required="" lay-verify="sort"
                                   autocomplete="off" class="layui-input" value="{{ $article['sort'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">上传文件：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file-file">
                            <input type="hidden" id="i_file" name="file" value="">
                            <div>{{ $article['file'] }}</div>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label for="desc" class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <script id="container" name="content" type="text/plain">{!! $article['content']  !!}</script>
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
    <!-- 配置文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>

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
                                window.location.href = '/admin/article/list'
                            }, 2000);
                        }
                    },
                });
                return false;
            });
            layui.upload({
                elem: '.layui-upload-file',
                url: '/admin/upload',
                success: function (res) {
                    if (res.code === 200) {
                        $('#i_main_pic').val(res.data.file);
                        $('#main_pic').attr('src', res.data.file).show();
                    }
                }
            });
            layui.upload({
                elem: '.layui-upload-file-group_pic',
                url: '/admin/upload',
                success: function (res) {
                    if (res.code === 200) {
                        var v = $('#i_group_pic').val();
                        if (typeof (v) === "undefined") {
                            v = '';
                        }
                        v = v + res.data.file + ',';
                        $('#i_group_pic').val( v);
                        $('#i_group_pic').after('<img src="' + res.data.file + '" style="margin-top: 20px; width: 100px;">');
                    }
                }
            });
            layui.upload({
                elem: '.layui-upload-file-file',
                url: '/admin/upload',
                success: function (res) {
                    if (res.code === 200) {
                        $('#i_file').siblings('input').val(res.data.file);
                    }
                }
            });
        });
    </script>
@endsection