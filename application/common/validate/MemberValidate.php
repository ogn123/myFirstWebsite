<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 10:35
 */
namespace app\common\validate;
use think\Validate;

class MemberValidate extends Validate
{
    protected $rule = [
        'username|用户名' => 'require',
        'password' => 'require',
        'nickname' => 'require',
        'email' => 'require',
        'oldpass' => 'require',
        'newpass' => 'require',
        'conpass' => 'require|confirm:password',
        'verify' => 'require'
    ];

    protected $scene = [
        'add' => ['username','password'],
        'edit' => ['oldpass','newpass'],
        'register' => ['username','password','conpass','nickname'],
        'login' => ['username','password']
    ];
}