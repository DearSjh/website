<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/1/8
 * Time: 10:49
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SinglePage extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}