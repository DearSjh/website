<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/5/24
 * Time: 11:13
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->select(['id', 'type', 'parent_id', 'name', 'dir_name']);
    }

    public static function getInfoById($articleId)
    {
        $article = Article::where(['id' => $articleId, 'is_release' => '1'])->first();
        return $article;
    }

    public static function getInfoByCatId($catId)
    {

        $article = Article::where(['category_id' => $catId, 'is_release' => '1'])->first();
        if (!empty($article->id)) {
            return $article;
        }

        $category = Category::select(['id'])->where(['parent_id' => $catId])->orderBy('sort')->first();
        if (!empty($category->id)) {
            $article = Article::where(['category_id' => $category->id, 'is_release' => '1'])->first();
        }

        return $article;
    }

    public static function prevTile($catId, $id)
    {
        return Article::select(['id', 'title'])->where('id', '<', $id)
            ->where(['category_id' => $catId, 'is_release' => '1'])
            ->orderBy('id', 'DESC')
            ->first();
    }

    public static function nextTile($catId, $id)
    {
        return Article::select(['id', 'title'])->where('id', '>', $id)
            ->where(['category_id' => $catId, 'is_release' => '1'])
            ->orderBy('id', 'ASC')
            ->first();
    }

    public static function lists($catId, $num = 10, $sort = 1, $field = 'id', $tag = '')
    {

        $ids = Article::processCatId($catId);

        $sort = ($sort == 1 ? 'DESC' : 'ASC');

        $qb = Article::select(['id', 'category_id', 'title', 'abstract', 'main_pic', 'created_at']);
        $qb->with('category.parent.parent');
        !empty($ids) && $qb->whereIn('category_id', $ids);
        !empty($tag) && $qb->where($tag, 1);
        $qb->where('is_release', 1);
        $qb->orderBy($field, $sort);
        $qb->limit($num);
        $article = $qb->get();

        $arr = Article::processData($article);

        return $arr;
    }

    public static function search($catId, $search, $page = 0, $perPage = 10, $sort = 1, $field = 'id')
    {

        $ids = Article::processCatId($catId);

        $sort = ($sort == 1 ? 'DESC' : 'ASC');
        $qb = Article::select(['id', 'category_id', 'title', 'main_pic', 'group_pic', 'abstract', 'visits', 'file', 'content', 'created_at', 'updated_at']);
        $qb->with('category.parent.parent');
        !empty($search) && $qb->where('title', $search);
        !empty($ids) && $qb->whereIn('category_id', $ids);

        $qb->where('is_release', 1);
        $qb->where('is_del', 0);
        $qb->orderBy($field, $sort);
        $article = $qb->paginate($perPage, ['*'], 'page', $page);

        $arr = Article::processData($article);

        $data['page'] = $article->links();
        $data['list'] = $arr;

        return $data;
    }


    private static function processCatId($catId)
    {
        $ids = [$catId];
        $subCategory = Category::subCategory($catId);

        foreach ($subCategory as $one) {
            $ids[] = $one['id'];
            foreach ($one['child'] as $item) {
                $ids[] = $item['id'];
            }
        }
        return $ids;
    }

    private static function processData($article)
    {
        $arr = [];
        foreach ($article as $value) {

            $path = '/';
            !empty($value->category->parent->parent->dir_name) && ($path .= $value->category->parent->parent->dir_name . '/');
            !empty($value->category->parent->dir_name) && ($path .= $value->category->parent->dir_name . '/');
            !empty($value->category->dir_name) && ($path .= $value->category->dir_name . '/');

            $arr[] = [
                'id' => $value->id,
                'category_id' => $value->category_id,
                'category_name' => Category::getInfoById($value->category_id)['name'],
                'title' => $value->title,
                'main_pic' => $value->main_pic,
                'group_pic' => $value->group_pic,
                'abstract' => $value->abstract,
                'content' => $value->content,
                'visits' => $value->visits,
                'file' => $value->file,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
                'link' => $path . $value->id . '.html',
            ];
        }
        return $arr;
    }


    public static function addVisits($articleId)
    {
        $article = Article::where(['id' => $articleId])->first();
        $article->visits = $article->visits + 1;
        $article->update();

        return $article->visits;
    }

}