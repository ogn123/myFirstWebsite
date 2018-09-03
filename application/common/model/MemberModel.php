<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/13
 * Time: 10:35
 */

namespace app\common\model;

use app\common\validate\MemberValidate;


use think\Model;
use \traits\model\SoftDelete;

class MemberModel extends Model
{
    protected $table = 'tp_member';

    //软删除
    use SoftDelete;

    public function add($data)
    {
        $validate = new \app\common\validate\MemberValidate();
        if(!$validate->scene('add')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result){
            return 1;
        }
        else{
            return "添加失败!";
        }

    }

    public function edit($data)
    {
        $validate = new MemberValidate();
        if(!$validate->scene('edit')->check($data))
        {
            return $validate->getError();
        }
        $memberInfo = $this->find($data['id']);
        if($data['oldpass'] != $memberInfo['password']){
            return '原密码不正确';
        }

        $memberInfo->password = $data['newpass'];
        $memberInfo->nickname = $data['nickname'];
        $result = $memberInfo->save();
        /*echo 'ddddd';
        var_dump($result);die;*/
        if($result){
            return 1;
        }else{
            return '会员修改失败';
        }
    }

    //关联评论
    public function comments()
    {
        return $this->hasMany('CommentModel','member_id','id');
    }

    //会员注册
    public function register($data)
    {
        $validate = new MemberValidate();
        if(!$validate->scene('register')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result){
            return 1;
        }
        else
        {
            return '注册失败';
        }
    }

    //会员登录
    public function login($data)
    {
        $validate = new MemberValidate();
        if(!$validate->scene('login')->check($data))
        {
            return $validate->getError();
        }
//        unset($data['verify']);
        $result = $this->where($data)->find();
        if($result)
        {
//            把信息保存到 session 中
            $sessionData = [
                'id' => $result['id'],
                'nickname' => $result['nickname'],

            ];
            session('index',$sessionData);
            return 1;
        }

        else{
            return "登陆失败";
        }
    }
}