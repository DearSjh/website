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

/**
 * 网页头部的描述
 */
function Description()
{

    $describe = Setting('describe');

    if (empty(GetCatId())) {
        return $describe;
    }

    $catInfo = CatInfo(GetCatId(), 'curr');
    if (!empty($catInfo['describe'])) {
        return $catInfo['describe'];
    }

    $describe = Setting('describe');

    return $describe;
}


/**
 * 当前栏目层级
 * @return int
 */
function CatLevel()
{
    return count(\App\Services\Utils::getPath());
}

/**
 * 获取栏目ID
 * @return int
 */
function GetCatId()
{
    $pathArr = \App\Services\Utils::getPath();


    $rPath = array_pop($pathArr);
    if (ctype_digit($rPath)) {
        return $catId = $rPath;
    } else {

        if (empty($rPath)) {
            $rPath = '/';
        }

        $ret = \App\Models\Category::getCatIdByPath($rPath);

        return $catId = $ret['id'];
    }
}

/**
 * 获取文章ID
 * @return int
 */
function GetArticleId()
{
    $path = \Illuminate\Support\Facades\Input::path();
    $arrPath = explode('/', $path);
    if (preg_match('/html$/', $path)) {
        return $id = (int)array_pop($arrPath);
    }
    return 0;
}

/**
 * 获取当前分页数
 * @return mixed
 */
function GetPageNum()
{
    return \Illuminate\Support\Facades\Input::get('page');
}

/**
 * 获取搜索关键字，即搜索框中提交的文字
 * @return mixed
 */
function GetSearchKey()
{
    return \Illuminate\Support\Facades\Input::get('keyword');
}

/**
 * 网站基本信息
 * @param string $param 参数有logo,url,,seo_title,keyword,describe,copyright,hotline,record,traffic_statistics,online_qq,contact,email,phone,address
 * @return mixed
 */
function Setting($param)
{
    static $Setting;
    if (!empty($Setting[$param])) {
        return $Setting[$param];
    }

    $Setting = \App\Models\Setting::select($param)->first();

    return $Setting[$param];
}


/**
 * 导航栏
 * @return array
 */
function NavBar()
{
    $list = \App\Models\Category::lists();
    $arr = \App\Services\Utils::categoryTree($list);
    return $arr;
}


/**
 * 侧边栏
 * @return array
 */
function SideBar()
{

    $getPath = \App\Services\Utils::getPath();

    $path = array_shift($getPath);

    $category = \App\Models\Category::getCatIdByPath($path);

    $list = \App\Models\Category::subCategory($category->id)->toArray();

    $arr = \App\Services\Utils::categoryTree($list, '/' . $path);
    return $arr;
}

/**
 * 上部边栏
 * @return array
 */
function TopBar()
{

    $getPath = \App\Services\Utils::getPath();

    if (count($getPath) == 1) {
        return [];
    }

    $mainPath = array_shift($getPath);
    $path = array_shift($getPath);

    $category = \App\Models\Category::getCatIdByPath($path);

    $list = \App\Models\Category::subCategory($category->id)->toArray();

    $arr = \App\Services\Utils::categoryTree($list, '/' . $mainPath . '/' . $path);
    return $arr;
}


/**
 * 导航高亮显示
 * @param $currLink
 * @param $className
 * @return string
 */
function Active($currLink, $className)
{
    $path = $_SERVER['REQUEST_URI'];

    if ($path == '/' && $currLink == '/') {
        return "class={$className}";
    }

    if (preg_match_all('/(.*)\/(.*)(\.html)/', $path, $matches)) {
        $path = $matches[1][0];
    }

    if (strpos($path, $currLink) !== false && $currLink != '/') {
        return "class={$className}";
    }

    return '';

}

/**
 * 获取指定栏目的所有文章，带分页
 * @param int $catId 栏目ID，0值代表不分栏目，读取所有文章
 * @param string $search 搜索
 * @param int $perPage 每页显示条数
 * @param int $sort 排序 0：正序，1：倒序
 * @param string $field 排序使用的字段名，用于排序，只能是id，sort，update，top，recommended，visits等字段。id：按文章添加顺序，sort：按指定顺序排序，update，按更新时间排序
 * @return array
 */

function ArticleAll($catId = 0, $search = '', $perPage = 12, $sort = 1, $field = 'id')
{
    $pageNum = GetPageNum();
    $article = \App\Models\Article::search($catId, $search, $pageNum, $perPage, $sort, $field);
    global $page;

    $page = $article['page'];
    return $article['list'];
}


function Jobs($search = '', $perPage = 10)
{
    $pageNum = GetPageNum();
    $jobs = \App\Models\Recruitment::search($search, $pageNum, $perPage);
    global $page;

    $page = $jobs['page'];
    return $jobs['list'];
}

/**
 * 分页
 * @return mixed
 */
function Page()
{
    return $GLOBALS['page'];
}


/**
 * 获取栏目信息
 * @param string $catId
 * @param string $type top:顶级栏目，curr:当前栏目
 * @return mixed
 */
function CatInfo($catId = '', $type = 'top')
{
    if ($catId == '') {
        $catId = GetCatId();
    }
    $categories = [];
    \App\Models\Category::getCatById($catId, $categories);

    if ($type == 'top') {
        return array_pop($categories);
    }

    if ($type = 'curr') {
        return array_shift($categories);
    }
    return [];
}


/**
 * 根据内容ID获取内容信息
 * @param int $articleId
 * @return mixed
 */
function GetArticleById($articleId = 0)
{
    if ($articleId == 0) {
        $articleId = GetArticleId();
    }

    return \App\Models\Article::getInfoById($articleId);
}

/**
 * 根据栏目ID获取文章信息，一般用于获取单页信息
 * @param int $catId
 * @return mixed
 */
function GetArticleByCatId($catId = 0)
{
    if ($catId == 0) {
        $catId = GetCatId();
    }

    return \App\Models\Article::getInfoByCatId($catId);
}


/**
 * 首页轮播图
 */
function Banner()
{
    return \App\Models\Banner::select(['id', 'title', 'picture', 'link'])->where('state', 1)->orderBy('sort', 'DESC')->get();
}


/**
 * 获取指定栏目第一篇文章
 * @param $catId int 栏目ID，0值代表不分栏目，读取第一条录入的文章
 * @return array
 */
function FirstArticle($catId)
{
    return ArticleList($catId, 1, 0);
}

/**
 * 获取指定栏目最后一篇文章
 * @param $catId int 栏目ID，0值代表不分栏目，读取最后一条录入的文章
 * @return array
 */
function LastArticle($catId)
{
    return ArticleList($catId, 1, 1);
}

/**
 * 获取指定栏目置顶文章
 * @param $catId int 栏目ID，0值代表不分栏目，读取所有置顶文章
 * @param int $num 读取条数
 * @param int $sort 排序 0：正序，1：倒序
 * @param string $field 排序使用的字段名，用于排序，只能是id，sort，update，top，recommended，visits等字段。id：按文章添加顺序，sort：按指定顺序排序，update，按更新时间排序
 * @return array
 */
function ArticleTop($catId, $num = 10, $sort = 1, $field = 'id')
{
    return \App\Models\Article::lists($catId, $num, $sort, $field, 'placed_top');
}

/**
 * 获取指定栏目滚动文章
 * @param $catId int 栏目ID，0值代表不分栏目，读取所有滚动文章
 * @param int $num 读取条数
 * @param int $sort 排序 0：正序，1：倒序
 * @param string $field 排序使用的字段名，用于排序，只能是id，sort，update，top，recommended，visits等字段。id：按文章添加顺序，sort：按指定顺序排序，update，按更新时间排序
 * @return array
 */
function ArticleRoll($catId, $num = 10, $sort = 1, $field = 'id')
{
    return \App\Models\Article::lists($catId, $num, $sort, $field, 'rolling');
}

/**
 * 获取指定栏目推荐文章
 * @param int $catId 栏目ID，0值代表不分栏目，读取所有推荐文章
 * @param int $num 读取条数
 * @param int $sort 排序 0：正序，1：倒序
 * @param string $field 排序使用的字段名，用于排序，只能是id，sort，update，top，recommended，visits等字段。id：按文章添加顺序，sort：按指定顺序排序，update，按更新时间排序
 * @return array
 */
function ArticleRec($catId, $num = 10, $sort = 1, $field = 'id')
{
    return \App\Models\Article::lists($catId, $num, $sort, $field, 'recommended');
}

/**
 * 获取指定栏目指定条数的文章
 * @param $catId int 栏目ID，0值代表不分栏目，读取限定条数的文章
 * @param int $num 读取条数
 * @param int $sort 排序 0：正序，1：倒序
 * @param string $field 排序使用的字段名，用于排序，只能是id，sort，update，top，recommended，visits等字段。id：按文章添加顺序，sort：按指定顺序排序，update，按更新时间排序
 * @return array
 */
function ArticleList($catId, $num = 10, $sort = 1, $field = 'id')
{
    return \App\Models\Article::lists($catId, $num, $sort, $field);
}


/**
 * 上一条文章
 * @param string $catId
 * @return mixed
 */
function PrevTile($catId = '')
{
    static $info;
    if (!empty($info)) {
        return $info;
    }
    $id = GetArticleId();
    if ($catId == '') {
        $catId = GetCatId();
    }
    $ret = \App\Models\Article::prevTile($catId, $id);
    if (empty($ret['id'])) {
        $ret['id'] = '#';
        $ret['title'] = '没有了';
    }
    $info = ['link' => $ret['id'] . '.html', 'title' => $ret['title']];
    return $info;
}

/**
 * 下一条文章
 * @param string $catId
 * @return mixed
 */
function NextTile($catId = '')
{
    static $info;
    if (!empty($info)) {
        return $info;
    }
    $id = GetArticleId();
    if ($catId == '') {
        $catId = GetCatId();
    }
    $ret = \App\Models\Article::nextTile($catId, $id);
    if (empty($ret['id'])) {
        $ret['id'] = '#';
        $ret['title'] = '没有了';
    }
    $info = ['link' => $ret['id'] . '.html', 'title' => $ret['title']];
    return $info;
}

/**
 * 字符串截断
 * @param $str
 * @param $len
 * @param string $end
 * @return string
 */
function StrLimit($str, $len, $end = '...')
{
    return \Illuminate\Support\Str::limit($str, $len, $end);
}


/**
 * 时间转换
 * @param $time
 * @param string $format Y-m-d，例（2019-10-09），Y年m月d日 H时i分s秒，例（2019年10月09日 05时30分29秒）
 * @return string
 */
function TimeConvert($time, $format = 'Y-m-d')
{
    return date($format, strtotime($time));
}

/**
 * 获取自定义数据
 * @param int $id
 * @return array
 * */
function GetCustomData($id)
{

    static $data;
    if (!empty($data[$id])) {
        return $data[$id];
    }

    $data[$id] = \App\Models\Custom::select(['name', 'main_pic', 'group_pic', 'file', 'link', 'value', 'content'])->where('id', $id)->first();
    return $data[$id];
}

/**
 * 面包屑导航
 * @return array
 */
function Position()
{

    static $arr;
    if (!empty($arr)) {
        return $arr;
    }

    $qb = \App\Models\Category::getSubCatByPath(\App\Services\Utils::getPath());

    $arr = [];
    $path = '';
    if (!empty($qb)) {
        foreach ($qb as $item) {
            $path .= '/' . $item['dir_name'];
            $arr[] = ['name' => $item['name'], 'link' => $path];
        }
    }

    return $arr;
}

/**
 * 当前分类
 * @return array
 */
function getPosition()
{

    static $arr;
    if (!empty($arr)) {
        return $arr;
    }

    $qb = \App\Models\Category::getSubCatByPath(\App\Services\Utils::getPath());

    $arr = [];
    $path = '';
    if (!empty($qb)) {
        foreach ($qb as $item) {
            $path .= '/' . $item['dir_name'];
            $arr = ['name' => $item['name'], 'link' => $path];
        }
    }

    return $arr;
}

/**
 * 友情链接
 */
function FriendLink()
{
    return \App\Models\FriendLink::select(['id', 'name', 'url'])->where('is_public', 1)->orderBy('sort', 'DESC')->get();
}

/**
 * 语言列表
 * @param string $class
 * @return mixed
 */
function Lang($class = '')
{
    echo "<script> 
        $(function() {
          $('.{$class}').click(function() {
            var lid = $(this).attr('id');
            document.cookie = 'lang=' + lid;
            window.location.reload()
        });
        
}); </script>";
    return \App\Models\Language::select(['id', 'name', 'pic'])->where('state', 1)->get();
}


/**
 * 获取留言列表
 * @param int $catId
 * @return mixed
 */
function GetMessageList()
{
    return \App\Models\Message::GetMessageList();
}

/**
 * 获取留言列表
 * @param int $catId
 * @return mixed
 */
function GetMessage()
{
    $count['message'] =  \App\Models\Message::select('*')->count('*');
    $count['article'] =  \App\Models\Article::select('*')->count('*');
    $count['message'] =  \App\Models\Message::select('*')->count('*');
    return $count;
}

/**
 * 直接获取文章内容
 * @param string $class
 * @return mixed
 */

function htmlChars($content = '')
{
    echo $content;
}


/**
 * 点击数
 * @param string $class
 * @return mixed
 */

function addVisits($articleId)
{
    return \App\Models\Article::addVisits($articleId);
}

/**
 * 获取指定导航下面分类
 * @return array
 */
function BarSubset($path)
{


    $category = \App\Models\Category::getCatIdByPath($path);

    $list = \App\Models\Category::subCategory($category->id)->toArray();

    $arr = \App\Services\Utils::categoryTree($list, '/' . $path);
    return $arr;
}

/**
 * 根据栏目目录名称获取文章信息
 * @param int $catId
 * @return mixed
 */
function GetArticleByDirName($rPath, $sort = 'id', $perPage = 9)
{
    if (empty($rPath)) {
        return \App\Models\Article::getInfoByCatId(GetCatId());
    }

    $ret = \App\Models\Category::getCatIdByPath($rPath);
    return ArticleAll($ret['id'], '', $perPage, 1, $sort);
}

/**
 * 根据文章获取获取所属栏目
 * @param int $catId
 * @return mixed
 */
function GetCateArticleId($articleId)
{
    return \App\Models\Category::getInfoById($articleId);
}

/**
 * 根据文章获取获取所属栏目
 * @param int $catId
 * @return mixed
 */
function GetLang()
{
    return Cookie::get('lang', '1');
}