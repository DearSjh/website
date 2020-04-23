<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/6
 * Time: 13:48
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Article extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * 添加文章
     * @param array $data
     * @return bool
     */
    public static function add(array $data)
    {
        $article = new Article();
        $article->category_id = $data['category_id'];
        $article->title = $data['title'];
        !empty($data['abstract']) && $article->abstract = $data['abstract'];
        !empty($data['keyword']) && $article->keyword = $data['keyword'];
        !empty($data['main_pic']) && $article->main_pic = $data['main_pic'];
        !empty($data['group_pic']) && $article->group_pic = $data['group_pic'];
        !empty($data['link']) && $article->link = $data['link'];
        !empty($data['content']) && $article->content = $data['content'];
        !empty($data['is_top']) && $article->is_top = (int)$data['is_top'];
        !empty($data['is_recommended']) && $article->is_recommended = (int)$data['is_recommended'];
        !empty($data['is_rolling']) && $article->is_rolling = (int)$data['is_rolling'];
        !empty($data['is_release']) && $article->is_release = (int)$data['is_release'];
        !empty($data['sort']) && $article->sort = (int)$data['sort'];
        !empty($data['visits']) && $article->visits = (int)$data['visits'];
        !empty($data['file']) && $article->file = $data['file'];
        $article->lang =  Cookie::get('lang', '1');

        return $article->save();


    }

    /**
     * 编辑文章
     * @param Article $article
     * @param $data
     * @return bool
     */
    public static function edit(Article $article, $data)
    {
        isset($data['category_id']) && $article->category_id = $data['category_id'];
        isset($data['title']) && $article->title = $data['title'];
        isset($data['abstract']) && $article->abstract = $data['abstract'];
        isset($data['keyword']) && $article->keyword = $data['keyword'];
        isset($data['main_pic']) && $article->main_pic = $data['main_pic'];
        isset($data['group_pic']) && $article->group_pic = $data['group_pic'];
        isset($data['link']) && $article->link = $data['link'];
        isset($data['content']) && $article->content = $data['content'];
        isset($data['is_top']) && $article->is_top = (int)$data['is_top'];
        isset($data['is_recommended']) && $article->is_recommended = (int)$data['is_recommended'];
        isset($data['is_rolling']) && $article->is_rolling = (int)$data['is_rolling'];
        isset($data['is_release']) && $article->is_release = (int)$data['is_release'];
        isset($data['sort']) && $article->sort = (int)$data['sort'];
        isset($data['visits']) && $article->visits = (int)$data['visits'];
        isset($data['file']) && $article->file = $data['file'];
        $article->lang =  Cookie::get('lang', '1');

        return $article->update();

    }

    public static function lists(array $conditions, int $page = 0, int $parPage = 10)
    {


        $article = Article::with('category');
        !empty($articleIds) && $article->whereIn('category_id', $articleIds);
        !empty($conditions['title']) && $article->where('title', 'like', "{$conditions['title']}%"); // 模糊匹配标题查询
        !empty($conditions['is_top']) && $article->where('is_top', (int)$conditions['is_top']);
        !empty($conditions['is_recommended']) && $article->where('is_recommended', (int)$conditions['is_recommended']);
        !empty($conditions['is_rolling']) && $article->where('is_rolling', (int)$conditions['is_rolling']);
        !empty($conditions['is_release']) && $article->where('is_release', (int)$conditions['is_release']);
        !empty($conditions['begin_time']) && $article->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($conditions['begin_time'])));
        !empty($conditions['end_time']) && $article->where('created_at', '<', date('Y-m-d H:i:s', strtotime('+1 day', strtotime($conditions['end_time']))));

        $article->where('is_del', 0);
        $article->orderBy('id', 'DESC');

        return $article->paginate($parPage, ['*'], 'page', $page);
    }

    /**
     * 发布文章
     * @param Article $article
     * @return bool
     */
    public static function release(Article $article)
    {
        $article->is_release = !$article->is_release;
        return $article->update();
    }

    /**
     * 删除
     * @param array $ids
     * @return bool
     */
    public static function del(array $ids)
    {

        return Article::whereIn('id', $ids)->update(['is_del' => 1]);
    }
}