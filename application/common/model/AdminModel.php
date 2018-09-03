<?php

namespace app\common\model;

use app\common\validate\AdminValidate;
use think\Model;

use traits\model\SoftDelete;



class AdminModel extends Model
{
    //软删除
  /*  use SoftDelete;*/

    //只读字段
    protected $readonly = ['email'];

    protected $table = 'tp_admin';

    //登陆校验
    public function login($data)
    {

        $validate = new \app\common\validate\AdminValidate();
        //判断数据是否通过验证
        if(!$validate->scene('login')->check($data))
        {
            return $validate->getError();
        }

        $result = $this->where($data)->find();
        if($result)
        {
            //判断是否可用
            if($result['status'] != 1){
                return '账户被禁用';
            }


            //表示有这个用户，也就是用户名和密码正确了
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],
                'is_super' => $result['is_super']
            ];
            session('admin',$sessionData);  //将 sessionData 保存到 session 类型的 名为 'admin' 的变量中
        }
        else
            return '登陆失败';
        return 1;
    }

    //注册账户
    public function register($data)
    {
        $validate = new \app\common\validate\AdminValidate();
        if(!$validate->scene('register')->check($data))
        {
            return $validate->getError();
        }

        //数据库中有的字段，才允许插入
        $result = $this->allowField(true)->save($data);
        if($result)
        {
            return 1;
        }
        else
        {
            return '注册失败';
        }
    }

    public function add($data)
    {
        $validate = new AdminValidate();
        if(!$validate->scene('add')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result){
            return 1;
        }
        else
        {
            return '管理员添加失败';
        }
    }

    public function edit($data)
    {
        $validate = new AdminValidate();
        if(!$validate->scene('edit')->check($data))
        {
            return $validate->getError();
        }

        $adminInfo = $this->find($data['id']);
        $adminInfo->password = $data['newpass'];
        $result = $this->allowField(true)->save();
        if($result)
        {
            return 1;
        }
        else
        {
            return "管理员编辑失败";
        }
    }
}
