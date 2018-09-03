<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 14:07
 */

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function initialize()
    {
        if(!session('?admin.id'))
        {
            $this->redirect('admin/index/login');
        }
    }
}