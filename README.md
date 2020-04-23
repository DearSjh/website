目录结构

├── app                                 App文件目录

├── config                              配置文件目录

├── database                              数据库存放目录

├── public                              公共文件目录

├── resources                           视图文件目录

├── routes                              路由文件目录

├── storage                             日志文件目录

├── vendor                              日志扩展文件目录

├── composer.json                    composer文件

├── LICENSE                          MIT License

└── README.md                        说明文件

基类
```PHP
<?php

use Illuminate\Support\Facades\Cookie;

header("Content-Type:text/html;charset=utf-8");

$catId = GetCatId();

/**
 * 网页头部的title，如果栏目中没有设置，则默认取栏目名
 * @return mixed
 */
function Title()
{

    $webName = Setting('name');

    if (empty(GetCatId())) {
        return $webName;
    }

    $articleId = GetArticleId();
    $articleTitle = '';
    if ($articleId > 0) {
        $article = \App\Models\Article::getInfoById($articleId);
        $articleTitle = $article->title . '_';
    }

    $catInfo = CatInfo(GetCatId(), 'curr');

    return "{$articleTitle}{$catInfo['name']}_{$webName}";
}

/**
 * 网页头部的关键字
 * @return mixed
 */
function Keywords()
{

    $keyword = Setting('keyword');
    if (empty(GetCatId())) {
        return $keyword;
    }

    $catInfo = CatInfo(GetCatId(), 'curr');
    if (!empty($catInfo['keyword'])) {
        return $catInfo['keyword'];
    }

    return $keyword;
}
?>


用法示例

<head>
    <title>{{Title()}}</title>
    <meta name="Keywords" content="{{Keywords()}}">
    <meta name="Description" content="{{Description()}}">
</head>
