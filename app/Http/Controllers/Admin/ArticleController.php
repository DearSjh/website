<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/6
 * Time: 12:47
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin\Article;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 文章列表
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function lists(Request $request)
    {

        // todo 数据验证

        $article = Article::lists($request->input(), $request->input('page', 0));

        $data['article'] = $article;
        return view('admin.article.list', $data);
    }

    /**
     * 添加文章
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            // todo 数据验证
            Article::add($request->input());
            // todo 判断是否添加成功
            return $this->response->responseJSON();
        }

        // 分类信息，用于选择分类，因为在添加页面有一个选择分类。
        $category = Category::getCategoryChildrenIdsByParentId(0);

        $data['category'] = $category;
        return view('admin.article.add', $data);
    }

    /**
     * 修改文章
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(int $id, Request $request)
    {

        $article = Article::where('id', $id)->first();
        // todo 验证文章是否存在，如果不存在跳转到错误提示页面

        if ($request->isMethod('post')) {
            // todo 数据验证
            Article::edit($article, $request->input());
            // todo 判断是否修改成功
            return $this->response->responseJSON();
        }

        // 分类信息，用于选择分类，因为在添加页面有一个选择分类。
        $category = Category::getCategoryChildrenIdsByParentId(0);

        $data['category'] = $category;
        $data['article'] = $article;
        return view('admin.article.edit', $data);
    }

    /**
     * 修改文章状态
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(int $id)
    {
        // todo 数据验证

        $article = Article::where('id', $id)->first();
        if (empty($article->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Article::release($article);

        $this->response->setData(['status' => (int)$article->is_release]);
        return $this->response->responseJSON();
    }


    /**
     * 删除文章
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request)
    {
        // todo 数据验证

        Article::del($request->input('ids'));

        return $this->response->responseJSON();

    }
}