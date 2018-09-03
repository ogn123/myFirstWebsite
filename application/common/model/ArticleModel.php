<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/10
 * Time: 13:31
 */

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class ArticleModel extends Model
{
    protected $table = 'tp_article';
    //软删除
    use SoftDelete;

    //添加文章
    public function add($data)
    {
        $validate = new \app\common\validate\ArticleValidate();
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
            return '文章添加失败';
        }
    }

    //关联栏目表
    public function cate()
    {
        return $this->belongsTo('CateModel','cate_id','id');
    }

    //文章编辑
    public function edit($data)
    {
        $validate = new \app\common\validate\ArticleValidate();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }

        $articleInfo = $this->find($data['id']);
        $articleInfo->title = $data['title'];
        $articleInfo->tags = $data['tags'];
        $articleInfo->is_top =$data['is_top'];
        $articleInfo->cate_id = $data['cate_id'];
        $articleInfo->content = $data['content'];

        $result = $articleInfo->save($data);
        if($result){
            return 1;
        }else{
            return '文章编辑失败';
        }

    }

    public function contribute($data)
    {
        $result = $this->allowField(true)->save($data);
        if($result)
        {
            return 1;
        }
        else{
            return '投稿失败';
        }
    }

}
