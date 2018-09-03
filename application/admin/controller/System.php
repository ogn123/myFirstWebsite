<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 11:10
 */

namespace app\admin\controller;


use think\Controller;

class System extends Controller
{
    //系统设置
    public function set()
    {
        if(request()->isAjax())
        {
            $data = input();
            $result = model('SystemModel')->edit($data);
            if($result)
            {
                $this->success('设置成功','admin/home/index');
            }
            else{
                $this->error($result);
            }
        }
        $webInfo = model('SystemModel')->find();
        $viewData = [
            'webInfo' => $webInfo
        ];
        $this->assign($viewData);
        return view();
    }
}