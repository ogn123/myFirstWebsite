<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 13:59
 */

namespace app\common\validate;

use think\Validate;

class AdminValidate extends Validate
{
    protected $rule = [
       'username' => 'require',
       'password' => 'require',
        'conpass' => 'require',
        'nickname' => 'require',
        'email' => 'requrie',
        'oldpass' => 'require',
        'newpass' => 'require'
    ];

    protected $scene = [
        'login' => ['username','password'],     //登录场景验证
        'register' => ['username','password','conpass','nickname','email'],
        'add' => ['username','password','conpass'],
        'edit' => ['nickname','oldpass','newpass'],
    ];

    /*//登录验证场景
    public function sceneLogin()
    {
        return $this->only();
    }

    //注册场景验证
    public function sceneRegister()
    {
        return $this->only(['username','password','conpass','nickname','email']);
    }*/
}