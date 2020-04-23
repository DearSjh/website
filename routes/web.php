<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/admin/login', 'AdminAuthController@login');
$router->addRoute(['GET', 'POST'], '/admin/outLogin', 'AdminAuthController@outLogin');
$router->get('/admin/login', 'Admin\\AuthController@login'); // 登录

$router->group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth.admin']], function () use ($router) {


    $router->addRoute(['GET', 'POST'], '/index', 'IndexController@index');
    $router->get('/welcome', 'WelcomeController@index');
    $router->addRoute(['GET', 'POST'], '/siteSetting', 'SiteSettingController@set'); // 网站设置
    $router->post('/upload', 'UploadController@file'); // 文件上传

    // 文章分类
    $router->addRoute(['GET', 'POST'], '/category/add', 'CategoryController@add'); // 添加文章分类
    $router->addRoute(['GET', 'POST'], '/category/addChild/{id:[1-9]+}', 'CategoryController@addChild'); // 添加文章子分类
    $router->addRoute(['GET', 'POST'], '/category/edit/{id:[1-9]+}', 'CategoryController@edit'); // 编辑文章分类
    $router->get('/category/list', 'CategoryController@lists'); // 文章分类列表
    $router->post('/category/del', 'CategoryController@del'); // 删除文章分类
    $router->post('/category/status/{id:[1-9]+}', 'CategoryController@status'); // 更改状态status


    $router->get('/message/list', 'MessageController@lists'); // 在线留言
    $router->addRoute(['GET', 'POST'], '/message/edit/{id:[1-9]+}', 'MessageController@edit'); // 查看
    $router->post('/message/del', 'MessageController@del'); // 删除留言
    $router->post('/message/status/{id:[1-9]+}', 'MessageController@status'); // 更改状态status


    $router->get('/customData/list', 'CustomController@lists');// 删除自定义数据
    $router->addRoute(['GET', 'POST'], '/customData/add', 'CustomController@add'); // 添加自定义数据
    $router->addRoute(['GET', 'POST'], '/customData/edit/{id:[1-9]+}', 'CustomController@edit'); // 编辑自定义数据
    $router->post('/customData/del', 'CustomController@del');// 删除自定义数据
    $router->post('/customData/status/{id:[1-9]+}', 'CustomController@status'); // 发布状态

    $router->get('/article/list', 'ArticleController@lists'); // 文章列表
    $router->addRoute(['GET', 'POST'], '/article/add', 'ArticleController@add'); // 添加文章
    $router->addRoute(['GET', 'POST'], '/article/edit/{id:[1-9]+}', 'ArticleController@edit'); // 编辑文章
    $router->post('/article/del', 'ArticleController@del'); // 删除文章
    $router->post('/article/status/{id:[1-9]+}', 'ArticleController@status'); // 发布状态


    $router->get('/singlePage/list', 'SinglePageController@lists'); // 单页列表
    $router->addRoute(['GET', 'POST'], '/singlePage/add', 'SinglePageController@add'); // 添加单页
    $router->addRoute(['GET', 'POST'], '/singlePage/edit/{id:[1-9]+}', 'SinglePageController@edit'); // 编辑单页
    $router->post('/singlePage/del', 'SinglePageController@del'); // 删除单页

    $router->get('/friendLink/list', 'FriendLinkController@lists'); // 友情链接列表
    $router->addRoute(['GET', 'POST'], '/friendLink/add', 'FriendLinkController@add'); // 添加友情链接
    $router->addRoute(['GET', 'POST'], '/friendLink/edit/{id:[1-9]+}', 'FriendLinkController@edit'); // 编辑友情链接
    $router->post('/friendLink/del', 'FriendLinkController@del'); // 删除友情链接
    $router->post('/friendLink/status/{id:[1-9]+}', 'FriendLinkController@status'); // 发布状态

    $router->get('/banner/list', 'BannerController@lists'); // 轮播图列表
    $router->addRoute(['GET', 'POST'], '/banner/add', 'BannerController@add'); // 添加轮播图
    $router->addRoute(['GET', 'POST'], '/banner/edit/{id:[1-9]+}', 'BannerController@edit'); // 编辑轮播图
    $router->post('/banner/del', 'BannerController@del'); // 删除轮播图
    $router->post('/banner/status/{id:[1-9]+}', 'BannerController@status'); // 发布状态


    // 菜单
    $router->get('/menu/list', 'MenuController@lists'); // 菜单列表
    $router->addRoute(['GET', 'POST'], '/menu/add', 'MenuController@add'); // 添加菜单
    $router->addRoute(['GET', 'POST'], '/menu/addChild/{id:[1-9]+}', 'MenuController@addChild'); // 添加子菜单
    $router->addRoute(['GET', 'POST'], '/menu/editChild/{id:[1-9]+}', 'MenuController@editChild'); // 编辑子菜单
    $router->addRoute(['GET', 'POST'], '/menu/edit/{id:[1-9]+}', 'MenuController@edit'); // 编辑菜单
    $router->post('/menu/del', 'MenuController@del'); // 删除菜单

    // 权限
    $router->get('/permission/list', 'PermissionController@lists'); // 权限列表
    $router->addRoute(['GET', 'POST'], '/permission/add', 'PermissionController@add'); // 添加权限
    $router->addRoute(['GET', 'POST'], '/permission/edit/{id:[1-9]+}', 'PermissionController@edit'); // 编辑权限
    $router->post('/permission/del', 'PermissionController@del'); // 删除权限

    // 角色
    $router->get('/role/list', 'RoleController@lists'); // 角色列表
    $router->addRoute(['GET', 'POST'], '/role/add', 'RoleController@add'); // 添加角色
    $router->addRoute(['GET', 'POST'], '/role/edit/{id:[1-9]+}', 'RoleController@edit'); // 编辑角色
    $router->post('/role/del', 'RoleController@del'); // 删除角色
    $router->post('/role/status/{id:[1-9]+}', 'RoleController@status'); // 角色状态

    // 管理员管理
    $router->get('/admin/list', 'AdminController@lists'); // 管理员列表
    $router->addRoute(['GET', 'POST'], '/admin/add', 'AdminController@add'); // 添加管理员
    $router->addRoute(['GET', 'POST'], '/admin/edit/{id:[1-9]+}', 'AdminController@edit'); // 编辑管理员
    $router->post('/admin/del', 'AdminController@del'); // 删除管理员


});

// 验证码
$router->get('/captcha', 'Web\\CaptchaController@create'); // 验证码

$router->get('/test[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\TestController@index');
$router->get('/', 'Web\\IndexController@index');
$router->get('/aboutUs[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\AboutUsController@index'); // 公司简介
$router->get('/news[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\NewsController@index'); // 新闻中心
$router->get('/product[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\ProductController@index'); // 产品中心
$router->get('/case[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\CaseController@index'); // 案例中心
$router->get('/workshop[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\WorkshopController@index'); // 生产车间
$router->get('/contactUs[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\ContactUsController@index'); // 联系我们
$router->get('/col', 'Web\\TongJiController@collect'); // 统计

$router->post('/contactUs/message', 'Web\\ContactUsController@message'); // 留言
$router->get('/delCache', 'Web\\CacheController@del'); // 清除缓存

