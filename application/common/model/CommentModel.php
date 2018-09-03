<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 9:53
 */

namespace app\common\model;

use app\common\validate\CommentValidate;
use think\Model;
use traits\model\SoftDelete;

class CommentModel extends Model
{
    use SoftDelete;

    protected $table = 'tp_comment';
    //关联文章
    public function article()
    {

        return $this->belongsTo('ArticleModel','article_id','id');
    }

    //关联用户
    public function member()
    {

        return $this->belongsTo('MemberModel','member_id','id');
    }

    public function comm($data)
    {
        $validate = new CommentValidate();
        if(!$validate->scene('comm')->check($data))
        {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if($result)
        {
            return 1;
        }else{
            return '评论失败';
        }
    }
}