@extends('layouts.admin')

@section('content')
    <div class="main-layout" id='main-layout'>
        <!--侧边栏-->
        <div class="main-layout-side">
            <div class="m-logo">
            </div>
            <ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
                @foreach($menus as $menu)
                    <li class="layui-nav-item">
                        <a href="javascript:;" data-url="{{ $menu['link'] }}" data-id='{{ $menu['id'] }}'
                           data-text="{{ $menu['name'] }}"><i
                                    class="iconfont">{{ htmlChars($menu['icon_code']) }}</i>{{ $menu['name'] }}</a>
                        @if(count($menu['child']) > 0 )
                            <dl class="layui-nav-child">
                                @foreach($menu['child'] as $value)
                                    <dd>
                                        <a href="javascript:;" data-url="{{ $value['link'] }}"
                                           data-id='{{ $value['id'] }}' data-text="{{ $value['name'] }}"><span
                                                    class="l-line"></span>{{ $value['name'] }}</a>
                                    </dd>
                                @endforeach
                            </dl>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <!--右侧内容-->
        <div class="main-layout-container">
            <!--头部-->
            <div class="main-layout-header">
                <div class="menu-btn" id="hideBtn">
                    <a href="javascript:;">
                        <span class="iconfont">&#xe60e;</span>
                    </a>
                </div>
                <ul class="layui-nav" lay-filter="rightNav">
                    <li class="layui-nav-item to-index">
                        <a href="/">前台首页</a></li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">{{$userName}}</a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;" onclick="exit()">退出</a>
                    </li>
                </ul>
            </div>
            <!--主体内容-->
            <div class="main-layout-body">
                <!--tab 切换-->
                <div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
                    <ul class="layui-tab-title">
                        <li class="layui-this welcome">后台主页</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
                            <!--1-->
                            <iframe src="/admin/welcome" width="100%" height="100%" name="iframe" scrolling="auto"
                                    class="iframe" framborder="0"></iframe>
                            <!--1end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--遮罩-->
        <div class="main-mask">

        </div>
    </div>
    <script type="text/javascript">
        var scope = {
            link: '/admin/welcome'
        }

        /*退出*/
        function exit() {
            layer.confirm('确认要退出吗？', function (index) {
                document.cookie = "user_id=; path=/admin;";
                location.href = '/admin/index'
            });
        }

    </script>

@endsection

