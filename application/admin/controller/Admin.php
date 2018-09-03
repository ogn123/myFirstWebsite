<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 16:56
 */
namespace app\admin\controller;

class Admin extends Base
{
    //管理员列表
    public function adminlist()
    {
        $admins = model('AdminModel')->order(['is_super'=>'asc','status' =>'asc'])->paginate(10);
        $viewData = [
            'admins' => $admins
        ];
        $this->assign($viewData);
        return view();
    }

    public function add()
    {
        if(request()->isAjax()){
            $data = input();
            $result = model('AdminModel')->add($data);
            if($result == 1){
                $this->success('管理员添加成功','admin/admin/adminlist');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    public function edit()
    {
        if(request()->isAjax())
        {
            $data = input();
            $result = model('AdminModel')->edit($data);
            if($result == 1){
                $this->success('管理员修改成功','admin/admin/adminlist');
            }else{
                $this->error($result);
            }
        }


        $adminInfo = model('AdminModel')->find(input('id'));
        $viewData = [
            'adminInfo' => $adminInfo
        ];
        $this->assign($viewData);
        return view();
    }

    public function del()
    {
        $adminInfo = model('AdminModel')->find(input('id'));
        $result = $adminInfo->delete();
        if($result){
            $this->success('删除成功','admin/admin/adminlist');
        }else{
            $this->error('删除失败');
        }
    }
}