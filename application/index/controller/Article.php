<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 15:21
 */

namespace app\index\controller;

use app\common\model\ArticleModel;
use app\common\model\CommentModel;
class Article extends Base
{
    //文章详情页
    public function info()
    {

        $id = input('id');
	$commentInfo = model('CommentModel')->select();
        $articleInfo = model('ArticleModel')->find($id);
//        $articleInfo->setInc('click');
        $viewData = [
            'articleInfo' => $articleInfo,
            'commentInfo' => $commentInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //文章评论
    public function comm()
    {

        $data = input();
        $result = model('CommentModel')->comm($data);
        if($result == 1)
        {
            $this->success('评论成功');
        }
        else
        {
            $this->error($result);
        }


    }
}
