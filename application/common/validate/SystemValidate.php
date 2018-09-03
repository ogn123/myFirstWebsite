<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 11:31
 */

namespace app\common\validate;

use think\Validate;

class SystemValidate extends Validate
{
    protected $rule = [
        'webname' => 'require',
        'copyright' => 'require'
    ];

    protected $scene = [
        'edit' => ['webname','copyright']
    ];
}