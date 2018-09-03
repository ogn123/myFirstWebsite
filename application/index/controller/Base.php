<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 13:47
 */

namespace app\index\controller;

use think\Controller;
use app\common\model\ArticleModel;
use app\common\model\CateModel;
use app\common\model\SystemModel;

class Base extends Controller
{

    //使用共享视图
    public function _initialize()
    {
        $cates = model('CateModel')->select();

        $webInfo = model('SystemModel')->find();
        $topArticles = model('ArticleModel')->where('is_top',1)->select();

        $viewData = [
            'cates' => $cates,
            'webInfo' => $webInfo,
            'topArticles' => $topArticles
        ];
//        $this->assign($viewData);
        $this->view->share($viewData);
    }
}