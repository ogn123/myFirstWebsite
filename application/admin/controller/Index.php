<?php

namespace app\admin\controller;

use app\common\model\AdminModel;
use think\Controller;

class Index extends Controller
{
    //重复登录过滤
    public function _initialize()
    {
	
        if(session('?admin.id'))
        {
            $this->redirect('admin/home/index');
        }
    }

    //后台登录
    public function login()
    {
        if(request() -> isAjax())
        {
            $data = [
                'username' => input('username'),
                'password' => input('password')
            ];

            //校验用户名和密码
            $result =  model('AdminModel')->login($data);
            if($result == 1)
            {
                $this->success('登陆成功','admin/home/index');
            }
            else
            {
                $this->error($result);
            }
        }
        return view();
    }

    //注册
    public function register()
    {
        if(request() -> isAjax())
        {
            $data = [
                'username' => input('username'),
                'password' => input('password'),
                'nickname' => input('nickname'),
                'email' => input('email'),
            ];
            $result =  model('AdminModel')->register($data);
            if($result == 1)
            {
                $this->success('注册成功','admin/index/login');
            }
            else{
                $this->error($result);
            }
        }
        return view();
    }



}
