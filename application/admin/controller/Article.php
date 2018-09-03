<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/10
 * Time: 13:31
 */

namespace app\admin\controller;

use app\common\model\ArticleModel;
use think\Controller;

class Article extends Base
{
    //文章列表
    public function articlelist()
    {
        $articles = model('ArticleModel')->order(['is_top' => 'asc', 'create_time' => 'asc'])->paginate(10);
        $viewData = [
            'articles' => $articles
        ];
        $this->assign($viewData);
        return view();
    }

    //文章添加
    public function add()
    {
        if (request()->isAjax()) {
            $data = input();
            $result = model('ArticleModel')->add($data);
            if ($result == 1) {
                $this->success('文章添加成功', 'admin/article/articlelist');
            } else {
                $this->error($result);
            }


        }
        $cates = model('CateModel')->select();

        $viewData = [
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }

    //文章编辑
    public function edit()
    {
        if (request()->isAjax()) {
            $data = input();
            $result = model('ArticleModel')->edit($data);
            if ($result) {
                $this->success('文章编辑成功', 'admin/article/articlelist');
            } else {
                $this->error($result);
            }
        }
        $articleInfo = model('ArticleModel')->find(input('id'));    //查找特定的一条
        $cates = model('CateModel')->select();  //查询表中所有的记录 then list them

        //give the values to viewData and return  to edit.html
        $viewData = [
            'articleInfo' => $articleInfo,
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }

    //Article_Delete
    public function del()
    {
        $articleInfo = model('ArticleModel')->find(input('id'));
        $result = $articleInfo->delete();

        if($result)
        {
            $this->success('Delete Success','admin/article/articlelist');
        }
        else
        {
            $this->error('Failed to Delete');
        }
    }
}
