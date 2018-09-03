<?php
namespace app\index\controller;

//use app\common\model\ArticleModel;
//use app\common\model\MemberModel;


class Index extends Base
{

    //首页
    public function index()
    {

        $articles = model('ArticleModel')->order('create_time','asc')->paginate(5);
        $viewData = [
            'articles' => $articles
        ];
        $this->assign($viewData);
        return view();
    }

    //注册
    public function register()
    {
        if(request()->isAjax()){
            $data = input();
            $result = model('MemberModel')->register($data);
            if($result == 1)
            {
                $this->success('注册成功','index/index/login');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //登录
    public function login()
    {
        if(request()->isAjax())
        {

            $data = [
                'username' => input('username'),
                'password' => input('password'),

            ];
            $result = model('MemberModel')->login($data);
            if($result == 1)
            {
                $this->success('登录成功','index/index/index');
            }
            else{
                $this->error($result);
            }
        }
        return view();
    }

    //退出
    public function loginout()
    {
        session(null);
        if(session('?index.id'))
        {
            $this->error('退出失败！');
        }else{
            $this->success('退出成功','index/index/index');
        }
    }

    public function search()
    {
        $where['title'] = array('like','%' . input('keyword') . '%');
        $catename = input('keyword');
        $articles = model('ArticleModel')->where($where)->paginate(10);
        $viewData = [
            'articles' => $articles,
            'catename' => $catename
        ];

        $this->assign($viewData);
        return view('index');

    }
    public function contribute()
    {
        $data = input();
        $result = model('ArticleModel')->contribute($data);
	    if($result == 1)
        {
            $this->success('投稿成功','admin/home/index');
        }else{
	        $this->error($result);
        }
        return view();
    }	
	

}
