<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/26 0026
 * Time: 18:15
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Cookie;


class LangScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('lang', Cookie::get('lang', '1'));
    }
}
