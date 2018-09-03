<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 15:23
 */

namespace app\common\model;


use app\common\validate\CateValidate;
use think\Loader;
use think\Model;
use traits\model\SoftDelete;

class CateModel extends Model
{
    //软删除
    use SoftDelete;
    protected $table = 'tp_cate';

    //accocite with article
    public function del()
    {
        $articleInfo = model('ArticleModel')->find(input('id'));
        $result = $articleInfo->delete();
        if($result){
            $this->success('Delete Success','admin/article/articlelist');
        }else{
            $this->error('Failed to Delete');
        }
    }

    //栏目添加
    public function add($data)
    {

        $validate = new CateValidate();
        if(!$validate->scene('add')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result)
        {
            return 1;
        }
        else
        {
            return '栏目添加失败';
        }
    }

    //栏目编辑
    public function edit($data)
    {
       $validate = new CateValidate();
       if(!$validate->scene('edit')->check($data))
       {
           return $validate->getError();
       }
       $cateInfo = $this->find($data['id']);
       $cateInfo->catename = $data['catename'];
       $result = $cateInfo->save();

       if($result)
           return 1;
       else
           return "栏目编辑失败";
    }
}