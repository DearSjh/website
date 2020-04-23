<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform "/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>{{Title()}}</title>
    <meta name="Keywords" content="{{Keywords()}}">
    <meta name="Description" content="{{Description()}}">

    　<link rel="shortcut icon" href="/favicon.ico"/>　
    <!-- core CSS -->
    <link href="/web/Templates/skin_cn/web/css/style.css" rel="stylesheet"/>
    <link href="/web/Templates/skin_cn/web/css/marketing.css" rel="stylesheet"/>
    <link href="/web/Templates/skin_cn/widgets/tslide/tslide.css" rel="stylesheet"/>
    <link href="/web/Templates/skin_cn/widgets/jcarousel/jcarousel.css" rel="stylesheet"/>
    <link href="/web/Templates/skin_cn/widgets/responsive/responsive.css" rel="stylesheet"/>
    <script src="/web/Templates/skin_cn/web/js/jquery.lazyload.min.js"></script>
    <script src="/web/Templates/skin_cn/web/js/marketing.js"></script>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/xadmin.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/web/Templates/skin_cn/widgets/html5shiv/html5shiv.js"></script>
    <script src="/web/Templates/skin_cn/widgets/respond/respond.min.js"></script>
    <![endif]-->
    <!--[if IE 6]>
    <script src="/web/Templates/skin_cn/widgets/pngfix/pngfix.js"></script>
    <![endif]-->
    <link href="/web/Templates/skin_cn/css/iconfont.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/web/Templates/skin_cn/css/banner.css">
</head>
<body>
@include('web.nav')

@yield('content')

@include('web.footer')

</body>

</html>

