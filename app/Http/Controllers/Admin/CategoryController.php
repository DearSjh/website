<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/30
 * Time: 14:53
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\AddCategory;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request)
    {


        // 判断不是不post方式提交数据
        if ($request->isMethod('post')) {

            // 对新增数据做验证
            $this->validate($request, AddCategory::rules(), AddCategory::msg(), AddCategory::attr());

            // 添加分类
            Category::add($request->input());
            return $this->response->responseJSON();
        }

        return view('admin.category.addCategory');

    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function addChild(int $id, Request $request)
    {

        // 同时获取父级的信息
        $category = Category::with('parent')->where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        // 判断不是不post方式提交数据
        if ($request->isMethod('post')) {

            // 添加分类
            Category::add($request->input());
            return $this->response->responseJSON();
        }

        $data['category'] = $category;
        return view('admin.category.addChildCategory', $data);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(int $id, Request $request)
    {

        $category = Category::where('id', $id)->first();
//        if(empty($category->id)){
//            //跳转到错误页面
//        }

        if ($request->isMethod('post')) {

            // 添加分类
            Category::edit($category, $request->input());
            return $this->response->responseJSON();
        }

        $data['category'] = $category;
        return view('admin.category.editCategory', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {

        $data['list'] = Category::lists();
        return view('admin.category.category', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Request $request)
    {

        Category::del($request->input('ids'));

        return $this->response->responseJSON();
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(int $id, Request $request)
    {

        $category = Category::where('id', $id)->first();
        if (empty($category->id)) {
            $this->response->setMsg(400, '信息不存在');
            return $this->response->responseJSON();
        }


        Category::isOpen($category);

        $this->response->setData(['state' => (int)$category->state]);
        return $this->response->responseJSON();
    }
}