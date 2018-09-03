<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 9:53
 */

namespace app\admin\controller;

use think\Controller;

class Comment extends Controller
{
    public function commentlist()
    {
        $comments = model('CommentModel')->with('article,member')->paginate(10);
        $viewData = [
            'comments' => $comments
        ];
        $this->assign($viewData);
        return view();
    }

    public function del()
    {
        $commentInfo = model('CommentModel')->find(input('id'));
        $result = $commentInfo->delete();
        if($result)
        {
            $this->success('删除成功','admin/comment/commentlist');
        }else{
            $this->error('删除失败');
        }
    }
}