<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 14:43
 */

namespace app\admin\controller;


class Cate extends Base
{

    //栏目添加
    public function add()
    {
        if(request()->isAjax()){
            $data = [
                'catename' => input('catename'),
                'sort' => input('sort')
            ];
            $result = model('CateModel')->add($data);
            if($result == 1)
            {
                $this->success('栏目添加成功','admin/cate/catelist');
            }
            else
            {
                $this -> error($result);
            }
        }
        return view();
    }

    //栏目列表
    public function catelist()
    {
        $cates = model('CateModel')->order('sort','asc')->paginate(5);

        //定义一个模板数据变量
        $viewData = [
            'cates' => $cates
        ];
        $this->assign($viewData);
        return view();
    }



    //列表排序
//    public function sort()
//    {
//        $data = [
//            'id' => input('id'),
//            'sort' => input('sort')
//        ];
//        $result = model('Cate')->sort($data);
//        if($result == 1)
//        {
//            $this->success('排序成功','admin/cate/catelist');
//        }
//        else
//        {
//            $this->error($result);
//        }
//    }

    //栏目编辑
    public function edit()
    {
        if(request()->isAjax())
        {
            $data = input();
            $result = model('Cate')->edit($data);

            if($result == 1)
            {
                $this->success('栏目编辑成功','admin/cate/catelist');
            }
            else{
                $this->error($result);
            }
        }
        $cateInfo = model('CateModel')->find(input('id'));

        //模板变量
        $viewData = [
            'cateInfo' => $cateInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //栏目删除
    public function del()
    {
        $cateInfo = model('CateModel')->find(input('id'));
        $result = $cateInfo->delete();

        if($result){
            $this->success("栏目删除成功",'admin/cate/catelist');
        }
        else
        {
            $this->error("栏目删除失败");
        }
    }
}