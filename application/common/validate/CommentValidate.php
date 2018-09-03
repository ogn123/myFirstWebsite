<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 9:55
 */

namespace app\common\validate;

use think\Validate;

class CommentValidate extends Validate
{
    protected $rule = [
        'content' => 'require',
    ];

    protected $scene = [
        'comm' => ['content'],
    ];
}