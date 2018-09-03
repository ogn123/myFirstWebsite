<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



use think\Route;
//Route::rule('search','index/index/search','get');
//Route::rule('register','index/index/register','get|post');
//Route::rule('login','index/index/login','get');
//Route::rule('article-<id>','index/article/info','get');
//Route::rule('cate/:id','index/index/index','get|post');
//Route::rule('/','index/index/index','get');
Route::group('admin/index/index',function (){
    //前台路由

    Route::rule('/','admin/index/login','get|post');
});

/*Route::rule('register','admin/index/register','get|post');

Route::rule('forget','admin/index/forget','get|post');

Route::rule('index','admin/home/index','get');

Route::rule('loginout','admin/home/loginout','post');

Route::rule('catelist','admin/cate/catelist','get');
Route::rule('add','admin/cate/add','get|post');

Route::rule('catesort','admin/cate/sort','post');

Route::rule('cateedit/[:id]','admin/cate/edit','get|post');

Route::rule('cateedit','admin/cate/del','post');

Route::rule('articlelist','admin/article/articlelist','get');

Route::rule('articleadd','admin/article/add','get|post');

Route::rule('articleedit/[:id]','admin/article/edit','get|post');

Route::rule('articledel','admin/article/del','post');   //these route::rules are pointing to Controller->admin/article->.....

Route::rule('memberlist','admin/member/memberlist','get|post');

Route::rule('memberadd','admin/member/add','get|post');

Route::rule('memberedit/[:id]','admin/member/edit','get|post');

Route::rule('memberdel','admin/member/del','post');

Route::rule('adminlist','admin/admin/adminlist','get');

Route::rule('adminadd','admin/admin/add','get|post');*/

//Route::rule('adminedit/[:id]','admin/admin/edit','get|post');



//中括号里的 :id 意思是它是可选参数


return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
