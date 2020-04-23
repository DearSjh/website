<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/12/18
 * Time: 17:35
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    public static function search($search, $page = 0, $perPage = 10, $sort = 1, $field = 'id')
    {


        $sort = ($sort == 1 ? 'DESC' : 'ASC');
        $qb = Recruitment::select('*');
        !empty($search) && $qb->where('name', $search);

        $qb->where('state', 1);
        $qb->orderBy($field, $sort);
        $jobs = $qb->paginate($perPage, ['*'], 'page', $page);

        $data['page'] = $jobs->links();
        $data['list'] = $jobs->toArray()['data'] ?? [];

        return $data;
    }

}