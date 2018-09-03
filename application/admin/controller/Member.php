<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 10:34
 */

namespace app\admin\controller;

use think\Loader;

class Member extends Base
{
    public function memberlist()
    {
        $members = model('MemberModel')->order('create_time','desc')->paginate(10);
        $viewData = [
            'members' => $members
        ];
        $this->assign($viewData);
        return view();
    }

    public function add()
    {
        if(request()->isAjax())
        {
            $data = input();

            $result = model('MemberModel')->add($data);

            if($result == 1)
            {
                $this->success('会员添加成功','admin/member/memberlist');
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
            $result = model('MemberModel')->edit($data);
            if($result == 1){
                $this->success('会员修改成功','admin/member/memberlist');
            }
            else{
                $this->error($result);
            }
        }
        $memberInfo = model('MemberModel')->find(input('id'));
        $viewData = [
            'memberInfo' => $memberInfo
        ];
        $this->assign($viewData);

        return view();
    }

    public function del()
    {

        $memberInfo = model('MemberModel')->with('comments')->find(input('id'));
        $result = $memberInfo->together('comments')->delete();
        if($result){
            $this->success('会员删除成功','admin/member/memberlist');
        }else{
            $this->error('会员删除失败');
        }
    }


}