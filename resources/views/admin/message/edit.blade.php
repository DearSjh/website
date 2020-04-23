@extends('layouts.admin')

@section('content')
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li><a href="/admin/message/list">留言列表</a></li>
            <li class="layui-this">修改留言</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="layui-form-item">
                    <label class="layui-form-label">标题：</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" style="width: 300px;"
                               autocomplete="off" class="layui-input" value="{{ $message['title'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名：</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" style="width: 200px;"
                               autocomplete="off" class="layui-input" value="{{ $message['name'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系电话：</label>
                    <div class="layui-input-block">
                        <input type="text" name="mobile" style="width: 200px;"
                               autocomplete="off" class="layui-input" value="{{ $message['mobile'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱：</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" style="width: 200px;"
                               autocomplete="off" class="layui-input" value="{{ $message['email'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">地址：</label>
                    <div class="layui-input-block">
                        <input type="text" name="address" style="width: 400px;"
                               autocomplete="off" class="layui-input" value="{{ $message['address'] }}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="abstract" class="layui-form-label">
                        内容</label>
                    <div class="layui-input-inline">
                        <textarea rows="5" cols="90">{{ $message['content'] }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection