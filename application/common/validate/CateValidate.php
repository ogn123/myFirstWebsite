<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 15:28
 */
namespace app\common\validate;

use think\Validate;

class CateValidate extends Validate
{
    protected $rule = [
        'catename|栏目名称' => 'require',
        'sort|排序' => 'require',
    ];

    protected $scene = [
        'add' => ['catename','sort'],
        'edit' => ['catename']
    ];

}
