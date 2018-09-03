<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 11:10
 */

namespace app\common\model;



use app\admin\controller\System;
use app\common\validate\SystemValidate;
use think\Model;
use traits\model\SoftDelete;

class SystemModel extends Model
{
    protected $table = 'tp_system';
    use SoftDelete;

    public function edit($data)
    {
        $validate = new SystemValidate();
        if(!$validate->scene('edit')->check($data))
        {
            return $validate->getError();
        }
        $webInfo = $this->find($data['id']);
        $webInfo->webname = $data['webname'];
        $webInfo->copyright = $data['copyright'];
        $result = $webInfo->save();

        if($result)
        {
            return 1;
        }
        else{
            return '更新失败';
        }
    }
}