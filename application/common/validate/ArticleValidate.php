<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/10
 * Time: 13:33
 */

namespace app\common\validate;

use think\Validate;

class ArticleValidate extends Validate
{
    protected $rule = [
        'title' => 'require',
        'tags' => 'require',
        'cate_id' => 'require',
        'desc' => 'require',
        'content' => 'require'
    ];

    protected $scene = [
        'add' => ['title','tags','cate_id','desc','content'],
        'edit' => ['title','tags','is_top','cate_id','desc','content']
    ];
}